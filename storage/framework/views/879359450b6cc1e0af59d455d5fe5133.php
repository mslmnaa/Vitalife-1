<div 
    id="chatbot-container" 
    class="hidden fixed bottom-4 right-4 z-50" 
    role="dialog" 
    aria-labelledby="chatbot-title"
    aria-hidden="true"
>
    <div class="bg-white rounded-xl shadow-xl overflow-hidden w-80 md:w-96 flex flex-col border border-gray-200" style="max-height: 80vh;">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-white p-1.5 rounded-full shadow-md">
                        <i class="fas fa-heartbeat text-indigo-600 text-lg" aria-hidden="true"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 id="chatbot-title" class="text-white font-semibold">Health Assist</h3>
                </div>
                <div class="flex space-x-2">
                    <button 
                        id="restart-chat" 
                        class="text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-white rounded p-1 transition-all duration-200" 
                        aria-label="Restart chat"
                        title="Restart chat"
                    >
                        <i class="fas fa-redo-alt" aria-hidden="true"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                    <button 
                        id="minimize-chat" 
                        class="text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-white rounded p-1 transition-all duration-200" 
                        aria-label="Minimize chat"
                        title="Minimize chat"
                    >
                        <i class="fas fa-minus" aria-hidden="true"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                        </svg>
                    </button>
                    <button 
                        id="close-chat" 
                        class="text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-white rounded p-1 transition-all duration-200" 
                        aria-label="Close chat"
                        title="Close chat"
                    >
                        <i class="fas fa-times" aria-hidden="true"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Messages area -->
        <div 
            id="chat-messages" 
            class="flex-grow p-4 overflow-y-auto bg-gray-50" 
            style="min-height: 18rem; max-height: calc(80vh - 8.5rem);"
            aria-live="polite"
            aria-relevant="additions"
        >
            <!-- Welcome message will be added dynamically -->
        </div>
        
        <!-- Input area -->
        <div class="border-t border-gray-200 p-3 bg-white">
            <form id="chat-form" class="flex items-center">
                <div class="flex-grow relative">
                    <input 
                        type="text" 
                        id="user-input" 
                        class="w-full px-4 py-2.5 bg-gray-100 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm pr-10 placeholder-gray-500"
                        placeholder="Type your message..." 
                        aria-label="Type your message"
                        required
                    />
                    <button 
                        type="button"
                        id="clear-input" 
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-full p-1 transition-all duration-200"
                        aria-label="Clear input"
                        style="display: none;"
                    >
                        <i class="fas fa-times text-xs" aria-hidden="true"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <button 
                    type="submit"
                    id="send-message" 
                    class="bg-blue-600 hover:bg-blue-700 transition-colors duration-300 text-white px-4 py-2.5 rounded-r-lg flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-blue-800 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm"
                    aria-label="Send message"
                >
                    <i class="fas fa-paper-plane" aria-hidden="true"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Chat button with pulse animation -->
<button 
    id="chat-button" 
    class="fixed bottom-4 right-4 bg-gradient-to-r from-blue-600 to-indigo-700 w-16 h-16 rounded-full shadow-xl flex items-center justify-center z-50 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105"
    aria-label="Open chat assistant"
    aria-expanded="false"
>
    <span class="animate-pulse absolute h-3 w-3 top-2 right-2">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
    </span>
    <i class="fas fa-heartbeat text-white text-2xl" aria-hidden="true"></i>
    <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
    </svg>
</button>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    /* Improved typing animation */
    .typing-indicator {
        display: flex;
        align-items: center;
        padding: 8px 12px;
    }
    
    .typing-indicator span {
        height: 8px;
        width: 8px;
        margin: 0 2px;
        background-color: #6366f1;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.4;
    }
    
    .typing-indicator span:nth-of-type(1) {
        animation: pulse 1s infinite ease-in-out;
    }
    
    .typing-indicator span:nth-of-type(2) {
        animation: pulse 1s infinite ease-in-out 0.2s;
    }
    
    .typing-indicator span:nth-of-type(3) {
        animation: pulse 1s infinite ease-in-out 0.4s;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.4; }
        50% { transform: scale(1.3); opacity: 1; }
        100% { transform: scale(1); opacity: 0.4; }
    }
    
    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        .theme-auto .bg-white {
            background-color: #1f2937;
        }
        
        .theme-auto .bg-gray-50 {
            background-color: #111827;
        }
        
        .theme-auto .text-gray-800 {
            color: #f3f4f6;
        }
        
        .theme-auto .border-gray-200 {
            border-color: #374151;
        }
        
        .theme-auto .bg-gray-100 {
            background-color: #374151;
        }
        
        .theme-auto .text-gray-400 {
            color: #9ca3af;
        }
        
        .theme-auto .bg-indigo-100 {
            background-color: rgba(99, 102, 241, 0.2);
        }
        
        .theme-auto .placeholder-gray-500::placeholder {
            color: #9ca3af;
        }
    }
    
    /* Improved fade-in animation for messages */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .message-fade-in {
        animation: fadeIn 0.3s ease-out forwards;
    }
    
    /* Custom scrollbar */
    #chat-messages::-webkit-scrollbar {
        width: 6px;
    }
    
    #chat-messages::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    #chat-messages::-webkit-scrollbar-thumb {
        background: #c7d2fe; 
        border-radius: 3px;
    }
    
    #chat-messages::-webkit-scrollbar-thumb:hover {
        background: #6366f1;
    }
    
    /* Code block styling */
    .chatbot-content pre {
        background: #282c34;
        color: #abb2bf;
        border-radius: 6px;
        padding: 12px;
        overflow-x: auto;
        margin: 8px 0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .chatbot-content code {
        font-family: 'Menlo', 'Monaco', 'Courier New', monospace;
        font-size: 0.85em;
    }
    
    .chatbot-content p {
        margin-bottom: 0.75rem;
    }
    
    .chatbot-content ul, .chatbot-content ol {
        margin-left: 1.25rem;
        margin-bottom: 0.75rem;
    }
    
    .chatbot-content a {
        color: #4f46e5;
        text-decoration: underline;
    }
    
    /* Message bubbles enhancement */
    .message-bubble {
        border-radius: 1rem;
        padding: 0.75rem 1rem;
        max-width: 80%;
        box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        position: relative;
    }
    
    .user-bubble {
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        color: white;
        border-bottom-right-radius: 0.25rem;
    }
    
    .bot-bubble {
        background-color: #f3f4f6;
        border: 1px solid #e5e7eb;
        border-bottom-left-radius: 0.25rem;
    }
    
    /* Avatar styling */
    .avatar {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        flex-shrink: 0;
    }
    
    .user-avatar {
        background-color: #e0e7ff;
        color: #4f46e5;
    }
    
    .bot-avatar {
        background-color: #e0e7ff;
        color: #4f46e5;
    }
    
    /* Restart confirmation modal */
    <!-- In the <style> section, find the .modal class and update it to: -->
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 60;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.modal.show {
    opacity: 1;
    visibility: visible;
}
    
    .modal-content {
        background: white;
        padding: 1.5rem;
        border-radius: 0.5rem;
        width: 90%;
        max-width: 400px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transform: translateY(-20px);
        transition: all 0.3s ease;
    }
    
    .modal.show .modal-content {
        transform: translateY(0);
    }
    
    .modal-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        margin-top: 1.5rem;
    }
    
    /* Dark mode for modal */
    @media (prefers-color-scheme: dark) {
        .theme-auto .modal-content {
            background-color: #1f2937;
            color: #f3f4f6;
        }
    }
    
</style>
<?php $__env->stopPush(); ?>

<!-- Restart confirmation modal -->
<div id="restart-modal" class="modal theme-auto" aria-hidden="true" role="dialog" aria-labelledby="restart-modal-title">
    <div class="modal-content">
        
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.5/purify.min.js"></script>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Enable theme support
    document.getElementById('chatbot-container').classList.add('theme-auto');
    document.getElementById('chat-button').classList.add('theme-auto');
    document.getElementById('restart-modal').classList.add('theme-auto');
    
    // Configure Marked for better security and code highlighting
    marked.setOptions({
        breaks: true,
        gfm: true,
        headerIds: false,
        highlight: function(code, language) {
            if (language && hljs.getLanguage(language)) {
                try {
                    return hljs.highlight(code, { language }).value;
                } catch (err) {}
            }
            return hljs.highlightAuto(code).value;
        }
    });
    
    // Check if Font Awesome is loaded properly
    const checkFontAwesome = () => {
        const span = document.createElement('span');
        span.className = 'fas';
        span.style.display = 'none';
        document.body.insertBefore(span, document.body.firstChild);
        
        const computedStyle = window.getComputedStyle(span, null);
        const isFontAwesomeLoaded = 
            computedStyle && 
            (computedStyle.fontFamily.includes('FontAwesome') || 
             computedStyle.fontFamily.includes('Font Awesome'));
            
        document.body.removeChild(span);
        
        if (!isFontAwesomeLoaded) {
            console.warn('Font Awesome not loaded! Using fallback icons.');
            document.querySelectorAll('.fas').forEach(el => {
                el.style.display = 'none';
                el.parentNode.querySelector('svg.hidden')?.classList.remove('hidden');
            });
        }
    };
    
    // Run check after a slight delay to ensure styles are applied
    setTimeout(checkFontAwesome, 500);
    
    // DOM elements
    const chatButton = document.getElementById('chat-button');
    const chatContainer = document.getElementById('chatbot-container');
    const minimizeButton = document.getElementById('minimize-chat');
    const closeButton = document.getElementById('close-chat');
    const restartButton = document.getElementById('restart-chat');
    const chatForm = document.getElementById('chat-form');
    const sendButton = document.getElementById('send-message');
    const userInput = document.getElementById('user-input');
    const clearInputButton = document.getElementById('clear-input');
    const messagesContainer = document.getElementById('chat-messages');
    
    // Restart modal elements
    const restartModal = document.getElementById('restart-modal');
    const confirmRestartButton = document.getElementById('confirm-restart');
    const cancelRestartButton = document.getElementById('cancel-restart');
    
    // Chat state
    const chatState = {
        conversation: [],
        isOpen: false,
        isLoading: false,
        retryCount: 0,
        maxRetries: 3,
        initialized: false
    };
    
    // Load conversation from localStorage if available
    function loadChatHistory() {
        try {
            const savedChat = localStorage.getItem('healthAssistChat');
            if (savedChat) {
                const parsedChat = JSON.parse(savedChat);
                if (Array.isArray(parsedChat) && parsedChat.length > 0) {
                    chatState.conversation = parsedChat;
                    // Display previous messages
                    messagesContainer.innerHTML = ''; // Clear existing messages first
                    parsedChat.forEach(msg => {
                        addMessage(msg.content, msg.isUser, false);
                    });
                    return true;
                }
            }
        } catch (e) {
            console.error('Failed to load chat history:', e);
        }
        return false;
    }
    
    // Save conversation to localStorage
    function saveChatHistory() {
        try {
            localStorage.setItem('healthAssistChat', JSON.stringify(chatState.conversation));
        } catch (e) {
            console.error('Failed to save chat history:', e);
        }
    }
    
    // Initialize chat with welcome message if needed
    function initializeChat() {
        if (chatState.initialized) return;
        
        const historyLoaded = loadChatHistory();
        
        if (!historyLoaded) {
            const welcomeMessage = "Hello! I'm your health assistant. How can I help you today?";
            addMessage(welcomeMessage, false);
            chatState.conversation.push({
                role: 'assistant',
                content: welcomeMessage,
                isUser: false,
                timestamp: new Date().toISOString()
            });
            saveChatHistory();
        }
        
        chatState.initialized = true;
    }
    
    // Toggle chat window
    function toggleChat() {
        chatState.isOpen = !chatState.isOpen;
        chatContainer.classList.toggle('hidden', !chatState.isOpen);
        chatButton.classList.toggle('hidden', chatState.isOpen);
        chatButton.setAttribute('aria-expanded', chatState.isOpen);
        chatContainer.setAttribute('aria-hidden', !chatState.isOpen);
        
        if (chatState.isOpen) {
            initializeChat();
            userInput.focus();
            // Scroll to bottom of chat
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
    }
    
    // Toggle clear input button visibility
    function toggleClearButton() {
        clearInputButton.style.display = userInput.value.trim() ? 'block' : 'none';
    }
    
    // Function to add message to chat
    function addMessage(content, isUser, animate = true) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex items-start mb-4 ${isUser ? 'justify-end' : ''}`;
        if (animate) {
            messageDiv.classList.add('message-fade-in');
        }
        
        if (isUser) {
            // User message with enhanced styling
            messageDiv.innerHTML = `
                <div class="message-bubble user-bubble">
                    <p class="text-sm break-words">${DOMPurify.sanitize(content)}</p>
                </div>
                <div class="avatar user-avatar ml-2">
                    <i class="fas fa-user text-sm" aria-hidden="true"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </div>
            `;
        } else {
            // Bot message with enhanced styling
            // Process markdown and sanitize HTML
            const processedContent = DOMPurify.sanitize(marked.parse(content));
            
            messageDiv.innerHTML = `
                <div class="avatar bot-avatar mr-2">
                    <i class="fas fa-heartbeat text-sm" aria-hidden="true"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="message-bubble bot-bubble">
                    <div class="text-gray-800 text-sm chatbot-content">${processedContent}</div>
                </div>
            `;
        }
        
        messagesContainer.appendChild(messageDiv);
        
        // Apply syntax highlighting to code blocks
        messageDiv.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightElement(block);
        });
        
        // Scroll to bottom
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
    
    // Function to show loading indicator
    function showLoading() {
        const loadingId = 'loading-' + Date.now();
        const loadingDiv = document.createElement('div');
        loadingDiv.id = loadingId;
        loadingDiv.className = 'flex items-start mb-4 message-fade-in';
        loadingDiv.innerHTML = `
            <div class="avatar bot-avatar mr-2">
                <i class="fas fa-heartbeat text-sm" aria-hidden="true"></i>
                <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="message-bubble bot-bubble p-2">
                <div class="typing-indicator">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        `;
        
        messagesContainer.appendChild(loadingDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        
        return loadingId;
    }
    
    // Function to remove loading indicator
    function removeLoading(loadingId) {
        const loadingElement = document.getElementById(loadingId);
        if (loadingElement) {
            loadingElement.remove();
        }
    }
    
    // Function to fetch bot response
    async function fetchBotResponse(message, loadingId) {
        chatState.isLoading = true;
        sendButton.disabled = true;
        
        try {
            // Simplified API call directly to our controller
            const response = await fetch('/health-chat/response', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    message: message,
                    history: chatState.conversation
                }),
            });
            
            if (!response.ok) {
                throw new Error(`API error: ${response.status}`);
            }
            
            const data = await response.json();
            
            // Remove loading indicator
            removeLoading(loadingId);
            
            const botResponse = data.message || 'Sorry, I encountered an error.';
            
            // Add bot message to chat
            addMessage(botResponse, false);
            
            // Add to conversation history
            chatState.conversation.push({
                role: 'assistant',
                content: botResponse,
                isUser: false,
                timestamp: new Date().toISOString()
            });
            
            // Save conversation to localStorage
            saveChatHistory();
            
            // Reset retry count on success
            chatState.retryCount = 0;
            
        } catch (error) {
            console.error('Error fetching response:', error);
            
            // Handle retries
            if (chatState.retryCount < chatState.maxRetries) {
                chatState.retryCount++;
                
                // Remove loading indicator
                removeLoading(loadingId);
                
                // Show retry message
                const retryLoadingId = showLoading();
                addMessage(`I'm having trouble connecting. Retrying... (${chatState.retryCount}/${chatState.maxRetries})`, false);
                
                // Wait a bit before retrying
                setTimeout(() => {
                    fetchBotResponse(message, retryLoadingId);
                }, 2000);
            } else {
                // Remove loading indicator
                removeLoading(loadingId);
                
                // Show error message after retries exhausted
                addMessage("I'm sorry, but I'm having trouble connecting to the server right now. Please try again later.", false);
                
                // Add error to conversation
                chatState.conversation.push({
                    role: 'assistant',
                    content: "I'm sorry, but I'm having trouble connecting to the server right now. Please try again later.",
                    isUser: false,
                    timestamp: new Date().toISOString()
                });
                
                // Save conversation
                saveChatHistory();
            }
        } finally {
            chatState.isLoading = false;
            sendButton.disabled = false;
            userInput.focus();
        }
    }
    
    // Reset chat function
    function resetChat() {
        // Clear conversation history
        chatState.conversation = [];
        messagesContainer.innerHTML = '';
        
        // Remove from localStorage
        localStorage.removeItem('healthAssistChat');
        
        // Reset state
        chatState.initialized = false;
        chatState.retryCount = 0;
        
        // Initialize with welcome message
        initializeChat();
        
        // Hide modal
        // restartModal.classList.remove('show');
        
        console.log('Chat has been reset');
    }
    
    // Event listeners
    chatButton.addEventListener('click', toggleChat);
    minimizeButton.addEventListener('click', toggleChat);
    closeButton.addEventListener('click', toggleChat);
    
    // Handle input changes
    userInput.addEventListener('input', toggleClearButton);
    
    // Clear input button
    clearInputButton.addEventListener('click', function() {
        userInput.value = '';
        toggleClearButton();
        userInput.focus();
    });
    
    // Handle form submission
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const message = userInput.value.trim();
        if (!message || chatState.isLoading) return;
        
        // Add user message to chat
        addMessage(message, true);
        
        // Add to conversation history
        chatState.conversation.push({
            role: 'user',
            content: message,
            isUser: true,
            timestamp: new Date().toISOString()
        });
        
        // Save conversation to localStorage
        saveChatHistory();
        
        // Clear input
        userInput.value = '';
        toggleClearButton();
        
        // Show loading indicator and fetch response
        const loadingId = showLoading();
        fetchBotResponse(message, loadingId);
    });
    
    // Restart chat functionality - Fixed
    restartButton.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Restart button clicked');
        resetChat();
        // Show confirmation modal
        // restartModal.classList.add('show');
    });
    
    // Modal cancel button
    cancelRestartButton.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Cancel restart clicked');
        restartModal.classList.remove('show');
    });
    
    // Modal confirm button
    confirmRestartButton.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Confirm restart clicked');
        resetChat();
    });
    
    // Close modal when clicking outside
    restartModal.addEventListener('click', function(e) {
        if (e.target === restartModal) {
            restartModal.classList.remove('show');
        }
    });
    
    // Keyboard accessibility
    document.addEventListener('keydown', function(e) {
        // Close modal on Escape
        if (e.key === 'Escape' && restartModal.classList.contains('show')) {
            restartModal.classList.remove('show');
        }
        
        // Toggle chat on Ctrl+/
        if (e.key === '/' && e.ctrlKey) {
            e.preventDefault();
            toggleChat();
        }
    });
    
    // Focus trap for modal
    restartModal.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            if (e.shiftKey && document.activeElement === cancelRestartButton) {
                e.preventDefault();
                confirmRestartButton.focus();
            } else if (!e.shiftKey && document.activeElement === confirmRestartButton) {
                e.preventDefault();
                cancelRestartButton.focus();
            }
        }
    });
    
    // Handle window resize for responsive layout
    window.addEventListener('resize', function() {
        if (chatState.isOpen) {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
    });
    
    // Initialize chat if it's open by default
    if (!chatContainer.classList.contains('hidden')) {
        chatState.isOpen = true;
        initializeChat();
    }
    
    // Debug listener for modal visibility
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                console.log('Modal classes changed:', restartModal.className);
            }
        });
    });
    
    observer.observe(restartModal, {attributes: true});
});
</script>
<?php $__env->stopPush(); ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\components\ChatBot.blade.php ENDPATH**/ ?>