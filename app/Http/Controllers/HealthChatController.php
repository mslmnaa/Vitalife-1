<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Reverb\Loggers\Log;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class HealthChatController extends Controller
{
    // The API key - in a real application, this should be in .env
    protected $apiKey = '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';
    
    // The model to use
    protected $model = 'deepseek/deepseek-r1:free';
    
    // Common non-health topics to filter out
    protected $nonHealthTopics = [
        'politik', 'politik', 'pemilu', 'presiden', 'partai', 'pemerintah', 'menteri',
        'ekonomi', 'saham', 'investasi', 'cryptocurrency', 'bitcoin', 'forex', 'trading',
        'teknologi', 'komputer', 'ponsel', 'laptop', 'programming', 'coding', 'software',
        'hiburan', 'film', 'musik', 'artis', 'selebriti', 'konser', 'festival',
        'game', 'gaming', 'playstation', 'xbox', 'nintendo',
        'olahraga', 'sepakbola', 'basket', 'pemain', 'pertandingan',
        'berita', 'gosip', 'skandal',
        
        // English equivalents
        'politics', 'election', 'president', 'party', 'government',
        'economy', 'stock', 'investment', 'cryptocurrency',
        'technology', 'computer', 'phone', 'programming', 'coding', 'software',
        'entertainment', 'movie', 'music', 'celebrity', 'concert',
        'game', 'gaming', 'playstation', 'xbox', 'nintendo',
        'sports', 'football', 'soccer', 'basketball', 'player', 'match',
        'news', 'gossip', 'scandal'
    ];

    /**
     * Check if a message is health-related
     * We're using a more lenient approach: assuming health-related unless clearly not
     */
    protected function isHealthRelated($message)
    {
        $message = strtolower($message);
        
        // Common health terms that should always pass (flu is one of them)
        $definitelyHealthTerms = [
            'flu', 'influenza', 'sakit', 'demam', 'batuk', 'pilek', 'hidung', 'tenggorokan',
            'perut', 'mual', 'pusing', 'migrain', 'nyeri', 'luka', 'darah', 'diet', 'makan',
            'vitamin', 'obat', 'dokter', 'rumah sakit', 'klinik', 'sehat', 'penyakit',
            'gejala', 'kesehatan', 'badan', 'kepala', 'gigi', 'mata', 'telinga', 'kulit',
            'alergi', 'vaksin', 'imunisasi', 'covid', 'virus', 'infeksi', 'bakteri'
        ];
        
        // Check for definite health terms first
        foreach ($definitelyHealthTerms as $term) {
            if (stripos($message, $term) !== false) {
                return true;
            }
        }
        
        // Check if contains obvious non-health topics
        foreach ($this->nonHealthTopics as $topic) {
            if (stripos($message, $topic) !== false) {
                // Contains a non-health topic keyword
                return false;
            }
        }
        
        // If message is very short (likely a follow-up question in a health conversation)
        if (str_word_count($message) <= 5) {
            return true;
        }
        
        // By default, assume it could be health-related and let the LLM judge
        // This is more user-friendly than rejecting legitimate health questions
        return true;
    }

    /**
     * Get AI response for the chat
     */
    public function getResponse(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'message' => 'required|string|max:1000',
                'history' => 'array',
            ]);
            
            // Apply rate limiting (15 requests per minute per IP)
            $ip = $request->ip();
            $cacheKey = "chat_limit_" . $ip;
            
            if (Cache::has($cacheKey) && Cache::get($cacheKey) >= 15) {
                return response()->json([
                    'error' => 'Too many requests. Please try again later.'
                ], 429);
            }
            
            // Increment request count
            $count = Cache::get($cacheKey, 0);
            Cache::put($cacheKey, $count + 1, now()->addMinute());
            
            // Basic check for health-related query
            $userMessage = $request->message;
            $isHealthRelated = $this->isHealthRelated($userMessage);
            
            // If definitely not health-related based on non-health topics detection
            if (!$isHealthRelated) {
                // Check recent history to see if we're in an ongoing health conversation
                $inHealthConversation = false;
                if (!empty($request->history)) {
                    // Check last 3 exchanges to determine if we're in a health conversation
                    $recentMessages = array_slice($request->history, -6); // Get last 3 exchanges (6 messages)
                    foreach ($recentMessages as $msg) {
                        if ($msg['isUser'] && $this->isHealthRelated($msg['content'])) {
                            $inHealthConversation = true;
                            break;
                        }
                    }
                }
                
                if (!$inHealthConversation) {
                    return response()->json([
                        'message' => "Maaf, saya hanya dapat menjawab pertanyaan yang berkaitan dengan kesehatan. Silakan ajukan pertanyaan tentang kesehatan, gaya hidup sehat, nutrisi, pengobatan, atau topik kesehatan lainnya."
                    ]);
                }
            }
            
            // Log for debugging (remove in production)
            Log::info("User message: {$userMessage}, Detected as health-related: " . ($isHealthRelated ? 'Yes' : 'No'));
            
            // Prepare messages for API
            $messages = [];
            
            // Add enhanced system message with stronger constraints
            $messages[] = [
                'role' => 'system',
                'content' => 'You are a friendly AI health assistant named Health Assist. Your ONLY purpose is to provide healthcare information, wellness tips, and general health guidance.

IMPORTANT RULES:
1. ONLY answer questions related to health, wellness, medical information, nutrition, fitness, mental health, or healthcare.
2. If a user asks a question that is NOT related to health, politely explain that you can only discuss health-related topics.
3. Do NOT answer questions about politics, entertainment, technology (unless health tech), finance, or other non-health domains.
4. Keep your responses concise but helpful.
5. Never diagnose specific conditions and always suggest consulting healthcare professionals for serious issues.
6. If a question seems ambiguous, interpret it in a health context if possible, otherwise decline to answer.
7. Always prioritize medical accuracy and safety in your responses.
8. Respond in the same language the user used to ask their question.
9. Questions about flu, cold, fever, cough, headache, stomachache, diet, nutrition, exercise, sleeping problems, and similar common health concerns are DEFINITELY within your scope.

Examples of health-related questions you SHOULD answer:
- "Cara mengatasi flu"
- "Apa obat untuk sakit kepala?"
- "Bagaimana cara menjaga kesehatan mata?"
- "Berapa banyak air yang harus diminum sehari?"
- "Makanan apa yang baik untuk jantung?"

Remember: You MUST REFUSE to engage with any topic that is not health-related, but be very careful not to reject legitimate health questions.'
            ];
            
            // Add chat history if present
            if (!empty($request->history)) {
                foreach ($request->history as $msg) {
                    $messages[] = [
                        'role' => $msg['isUser'] ? 'user' : 'assistant',
                        'content' => $msg['content']
                    ];
                }
            }
            
            // Add current message
            $messages[] = [
                'role' => 'user',
                'content' => $userMessage
            ];
            
            // Make API request to OpenRouter
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'HTTP-Referer' => $request->headers->get('referer', url('/')),
                'X-Title' => 'Health Assist Chatbot',
                'Content-Type' => 'application/json',
            ])->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => $this->model,
                'messages' => $messages,
                'temperature' => 0.7,
                'max_tokens' => 300,
                // Force rejection of non-health topics
                'system' => "Only respond to health-related queries. For non-health topics, politely decline to answer."
            ]);
            
            if (!$response->successful()) {
                return response()->json([
                    'error' => 'Failed to get response from AI service'
                ], 500);
            }
            
            $data = $response->json();
            $aiResponse = $data['choices'][0]['message']['content'] ?? 'Sorry, I couldn\'t generate a response.';
            
            // Post-processing to double check the response is on-topic
            // We'll simplify this since our detection is more reliable now
            
            // Only check responses to definitely non-health questions
            if (!$isHealthRelated) {
                $rejection_phrases = ['hanya dapat', 'can only', 'maaf', 'sorry', 'tidak bisa', 'cannot'];
                $containsRejection = false;
                
                foreach ($rejection_phrases as $phrase) {
                    if (stripos(strtolower($aiResponse), $phrase) !== false) {
                        $containsRejection = true;
                        break;
                    }
                }
                
                if (!$containsRejection) {
                    // The model answered a non-health question - override
                    $aiResponse = "Maaf, saya hanya dapat menjawab pertanyaan yang berkaitan dengan kesehatan. Silakan ajukan pertanyaan tentang kesehatan, gaya hidup sehat, nutrisi, pengobatan, atau topik kesehatan lainnya.";
                }
            }
            
            return response()->json([
                'message' => $aiResponse
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
}