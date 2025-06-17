<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TripayService
{
    private $apiKey;
    private $privateKey;
    private $merchantCode;
    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('tripay.api_key');
        $this->privateKey = config('tripay.private_key');
        $this->merchantCode = config('tripay.merchant_code');
        $this->baseUrl = config('tripay.base_url');
    }

    public function getPaymentChannels()
    {
        try {
            // Validasi konfigurasi
            if (empty($this->apiKey)) {
                Log::error('Tripay API Key is not configured');
                return [
                    'success' => false,
                    'message' => 'Tripay API Key is not configured'
                ];
            }

            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Accept' => 'application/json',
                ])
                ->get($this->baseUrl . '/merchant/payment-channel');

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['success']) && $data['success']) {
                    return $data;
                } else {
                    Log::error('Tripay API returned unsuccessful response', ['response' => $data]);
                    return [
                        'success' => false,
                        'message' => $data['message'] ?? 'Unknown error from Tripay API'
                    ];
                }
            }

            Log::error('Tripay API Error', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            
            return [
                'success' => false,
                'message' => 'HTTP ' . $response->status() . ': ' . $response->body()
            ];

        } catch (\Exception $e) {
            Log::error('Tripay Service Exception: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Connection error: ' . $e->getMessage()
            ];
        }
    }

    public function createTransaction($data)
    {
        try {
            // Validasi input data
            $requiredFields = ['method', 'merchant_ref', 'amount', 'customer_name', 'customer_email', 'customer_phone', 'order_items'];
            foreach ($requiredFields as $field) {
                if (!isset($data[$field]) || empty($data[$field])) {
                    Log::error("TripayService: Missing required field: {$field}");
                    return [
                        'success' => false,
                        'message' => "Missing required field: {$field}"
                    ];
                }
            }

            // Validasi konfigurasi
            if (empty($this->apiKey) || empty($this->privateKey) || empty($this->merchantCode)) {
                Log::error('TripayService: Incomplete Tripay configuration');
                return [
                    'success' => false,
                    'message' => 'Incomplete Tripay configuration'
                ];
            }

            $payload = [
                'method' => $data['method'],
                'merchant_ref' => $data['merchant_ref'],
                'amount' => (int) $data['amount'],
                'customer_name' => $data['customer_name'],
                'customer_email' => $data['customer_email'],
                'customer_phone' => $data['customer_phone'],
                'order_items' => $data['order_items'],
                'callback_url' => config('tripay.callback_url'),
                'return_url' => config('tripay.return_url'),
                'expired_time' => (time() + (24 * 60 * 60)), // 24 hours
            ];

            // Generate signature
            $signature = $this->generateSignature($payload);
            $payload['signature'] = $signature;

            Log::info('TripayService: Creating transaction', [
                'payload' => $payload,
                'url' => $this->baseUrl . '/transaction/create'
            ]);

            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ])
                ->post($this->baseUrl . '/transaction/create', $payload);

            Log::info('TripayService: Transaction response', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            if ($response->successful()) {
                $responseData = $response->json();
                
                if (isset($responseData['success']) && $responseData['success']) {
                    return $responseData;
                } else {
                    Log::error('TripayService: Transaction API returned unsuccessful response', ['response' => $responseData]);
                    return [
                        'success' => false,
                        'message' => $responseData['message'] ?? 'Transaction creation failed'
                    ];
                }
            }

            $errorBody = $response->body();
            Log::error('TripayService: Transaction HTTP error', [
                'status' => $response->status(),
                'body' => $errorBody
            ]);

            // Try to parse error response
            $errorData = json_decode($errorBody, true);
            $errorMessage = 'HTTP ' . $response->status();
            
            if ($errorData && isset($errorData['message'])) {
                $errorMessage .= ': ' . $errorData['message'];
            }

            return [
                'success' => false,
                'message' => $errorMessage
            ];

        } catch (\Exception $e) {
            Log::error('TripayService: Transaction exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return [
                'success' => false,
                'message' => 'Connection error: ' . $e->getMessage()
            ];
        }
    }

    public function getTransactionDetail($reference)
    {
        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ])
                ->get($this->baseUrl . '/transaction/detail', [
                    'reference' => $reference
                ]);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Tripay Get Transaction Error: ' . $e->getMessage());
            return null;
        }
    }

    private function generateSignature($payload)
    {
        $signatureString = $this->merchantCode . $payload['merchant_ref'] . $payload['amount'];
        $signature = hash_hmac('sha256', $signatureString, $this->privateKey);
        
        Log::info('TripayService: Generated signature', [
            'signature_string' => $signatureString,
            'signature' => $signature
        ]);
        
        return $signature;
    }

    public function validateCallback($data)
    {
        $signature = hash_hmac('sha256', 
            $data['merchant_ref'] . $data['status'] . $data['amount'], 
            $this->privateKey
        );
        
        return $signature === $data['signature'];
    }

    // Method untuk testing koneksi
    public function testConnection()
    {
        try {
            $response = Http::timeout(10)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ])
                ->get($this->baseUrl . '/merchant/payment-channel');

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'message' => $response->successful() ? 'Connection successful' : 'Connection failed',
                'response' => $response->json()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
