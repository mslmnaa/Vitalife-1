<div id="unified-chat-container" class="fixed bottom-5 right-5 z-50">
    <!-- Chat button -->
    <button id="chat-toggle-btn" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full w-16 h-16 flex items-center justify-center shadow-lg transition-all duration-300">
        <i class="fas fa-comments text-2xl"></i>
    </button>

    <!-- Chat selection panel -->
    <div id="chat-selection-panel" class="hidden bg-white rounded-lg shadow-xl w-80 mb-2 transform transition-all duration-300 scale-95 opacity-0">
        <div class="p-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Chat Support</h3>
            <p class="text-sm text-gray-600">Choose who you want to chat with</p>
        </div>
        
        <div class="p-4 grid grid-cols-1 gap-3">
            <button id="chat-ai-btn" class="flex items-center justify-between bg-blue-50 hover:bg-blue-100 p-3 rounded-lg transition-all duration-200">
                <div class="flex items-center">
                    <div class="bg-blue-500 rounded-full p-2 mr-3">
                        <i class="fas fa-robot text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">AI Assistant</p>
                        <p class="text-xs text-gray-600">Get instant automated help</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </button>
            
            <button id="chat-admin-btn" class="flex items-center justify-between bg-green-50 hover:bg-green-100 p-3 rounded-lg transition-all duration-200">
                <div class="flex items-center">
                    <div class="bg-green-500 rounded-full p-2 mr-3">
                        <i class="fas fa-headset text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Chat with Admin</p>
                        <p class="text-xs text-gray-600">Talk to our support team</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const chatToggleBtn = document.getElementById('chat-toggle-btn');
    const chatSelectionPanel = document.getElementById('chat-selection-panel');
    const chatAiBtn = document.getElementById('chat-ai-btn');
    const chatAdminBtn = document.getElementById('chat-admin-btn');
    
    // Find the original chatbot components in the DOM
    let originalChatbotElements = [];
    
    // Look for common chatbot container classes/IDs
    const possibleChatbotSelectors = [
        '.chatbot-container',
        '#chatbot',
        '.chat-window',
        '.ai-chat-container',
        '[data-chatbot]',
        '.chatbot-wrapper'
    ];
    
    possibleChatbotSelectors.forEach(selector => {
        const elements = document.querySelectorAll(selector);
        if (elements.length > 0) {
            elements.forEach(el => originalChatbotElements.push(el));
        }
    });
    
    // Track state
    let isPanelOpen = false;
    let activeChat = null;
    
    // Initialize - hide any existing chatbot elements initially
    hideAIChat();
    
    // Toggle chat panel
    chatToggleBtn.addEventListener('click', function() {
        if (activeChat) {
            // If a chat is active, hide it and show selection panel
            if (activeChat === 'ai') {
                // Hide AI chat
                hideAIChat();
            } else if (activeChat === 'admin') {
                // Hide Tawk.to chat
                hideTawkToChat();
            }
            activeChat = null;
            showSelectionPanel();
        } else {
            // Toggle selection panel
            isPanelOpen = !isPanelOpen;
            
            if (isPanelOpen) {
                showSelectionPanel();
            } else {
                hideSelectionPanel();
            }
        }
    });
    
    // Show selection panel with animation
    function showSelectionPanel() {
        chatSelectionPanel.classList.remove('hidden');
        setTimeout(() => {
            chatSelectionPanel.classList.remove('scale-95', 'opacity-0');
            chatSelectionPanel.classList.add('scale-100', 'opacity-100');
        }, 10);
        isPanelOpen = true;
        
        // Change button icon to X when panel is open
        chatToggleBtn.innerHTML = '<i class="fas fa-times text-2xl"></i>';
    }
    
    // Hide selection panel with animation
    function hideSelectionPanel() {
        chatSelectionPanel.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            chatSelectionPanel.classList.add('hidden');
        }, 300);
        isPanelOpen = false;
        
        // Change button icon back to comments when panel is closed
        chatToggleBtn.innerHTML = '<i class="fas fa-comments text-2xl"></i>';
    }
    
    // AI Chat button click handler
    chatAiBtn.addEventListener('click', function() {
        hideSelectionPanel();
        activeChat = 'ai';
        
        // Show the original AI chatbot
        showAIChat();
        
        // Change button icon to indicate chat is active
        chatToggleBtn.innerHTML = '<i class="fas fa-times text-2xl"></i>';
    });
    
    // Admin Chat button click handler
    chatAdminBtn.addEventListener('click', function() {
        hideSelectionPanel();
        activeChat = 'admin';
        
        // Initialize Tawk.to chat
        initTawkToChat();
        
        // Change button icon to indicate chat is active
        chatToggleBtn.innerHTML = '<i class="fas fa-times text-2xl"></i>';
    });
    
    // Function to show the existing AI chatbot component
    function showAIChat() {
    const aiContainer = document.getElementById('chatbot-placeholder');
    if (aiContainer) {
        aiContainer.classList.remove('hidden');
    }
}

    
    // Function to hide the AI chatbot
    function hideAIChat() {
    const aiContainer = document.getElementById('chatbot-placeholder');
    if (aiContainer) {
        aiContainer.classList.add('hidden');
    }
}

    
    // Fallback method to load chatbot via AJAX if not found on page
    function loadChatbotViaAjax() {
        // Create a container for the chatbot
        const container = document.createElement('div');
        container.id = 'ajax-loaded-chatbot';
        container.className = 'fixed bottom-20 right-5 z-50';
        document.body.appendChild(container);
        
        // Fetch the chatbot component
        fetch('/components/chatbot')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to load chatbot component');
                }
                return response.text();
            })
            .then(html => {
                container.innerHTML = html;
                originalChatbotElements.push(container);
                
                // Initialize any scripts
                const scripts = container.querySelectorAll('script');
                scripts.forEach(script => {
                    const newScript = document.createElement('script');
                    newScript.textContent = script.textContent;
                    document.body.appendChild(newScript);
                });
            })
            .catch(error => {
                console.error('Error loading chatbot component:', error);
                container.innerHTML = '<div class="bg-white p-4 rounded-lg shadow-lg">Error loading AI chat. Please refresh and try again.</div>';
            });
    }
    
    // Initialize Tawk.to chat
    function initTawkToChat() {
        // Check if Tawk_API is available (script loaded)
        if (typeof Tawk_API !== 'undefined') {
            // Show the Tawk.to chat window
            try {
                Tawk_API.maximize();
                Tawk_API.toggle();
                Tawk_API.showWidget();
            } catch (e) {
                console.error('Error showing Tawk.to widget:', e);
            }
        } else {
            console.warn('Tawk.to API not available, attempting to load it');
            loadTawkToScript();
        }
    }
    
    // Hide Tawk.to chat
    function hideTawkToChat() {
        // Check if Tawk_API is available
        if (typeof Tawk_API !== 'undefined') {
            try {
                // Hide the Tawk.to chat window
                Tawk_API.hideWidget();
                Tawk_API.minimize();
            } catch (e) {
                console.error('Error hiding Tawk.to widget:', e);
            }
        }
    }
    
    // Load Tawk.to script if needed
    function loadTawkToScript() {
        // Only add if not already present
        if (!document.getElementById('tawk-script')) {
            var s1 = document.createElement("script");
            s1.id = "tawk-script";
            s1.async = true;
            s1.src = 'https://embed.tawk.to/681b1012c905ab190eadae80/1iqkrdivk';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            document.head.appendChild(s1);
            
            // Wait for script to load
            s1.onload = function() {
                // Initialize Tawk.to chat after script loads
                setTimeout(initTawkToChat, 1000);
            };
        }
    }
    
    // Close everything when clicking outside
    document.addEventListener('click', function(event) {
        const container = document.getElementById('unified-chat-container');
        const isTawkToElement = event.target.closest('[id^="tawkchat"]');
        const isChatbotElement = originalChatbotElements.some(el => el.contains(event.target));
        
        if (container && !container.contains(event.target) && !isTawkToElement && !isChatbotElement && isPanelOpen) {
            hideSelectionPanel();
        }
    });
});
</script><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\components\unified-chat.blade.php ENDPATH**/ ?>