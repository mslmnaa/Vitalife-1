<x-app-layout>
    <div class="py-8 mt-16">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-4 bg-white border-b border-gray-200">
                    <div class="flex items-center">
                        <a href="{{ route('chat.index') }}" class="text-gray-600 hover:text-indigo-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        
                        @if($payment->specialist->image)
                            <img 
                                src="{{ asset($payment->specialist->image) }}" 
                                alt="{{ $payment->specialist->nama }}" 
                                class="w-10 h-10 rounded-full object-cover mr-3"
                            >
                        @else
                            <div class="w-10 h-10 rounded-full bg-gray-300 mr-3 flex items-center justify-center">
                                <span class="text-gray-600">{{ substr($payment->specialist->nama, 0, 1) }}</span>
                            </div>
                        @endif
                        
                        <div>
                            <h3 class="font-semibold">{{ $isSpecialist ? $payment->full_name : $payment->specialist->nama }}</h3>
                            <p class="text-sm text-gray-600">
                                {{ $isSpecialist ? 'Patient' : $payment->specialist->spesialisasi }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-[calc(100vh-300px)] flex flex-col">
                <div id="chat-messages" class="p-4 flex-1 overflow-y-auto">
                    @if($messages->isEmpty())
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <p class="mt-4 text-gray-500">No messages yet. Start the conversation!</p>
                        </div>
                    @else
                        @foreach($messages as $message)
                            @php 
                                $isCurrentUserSender = $message->sender_id === auth()->id();
                            @endphp
                            <div class="flex mb-4 {{ $isCurrentUserSender ? 'justify-end' : 'justify-start' }}">
                                <div class="max-w-[70%] {{ $isCurrentUserSender ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-800' }} rounded-lg py-2 px-4">
                                    <p>{{ $message->message }}</p>
                                    <p class="text-xs {{ $isCurrentUserSender ? 'text-indigo-200' : 'text-gray-500' }} mt-1">
                                        {{ $message->created_at->format('H:i') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                
                <div class="p-4 border-t">
                    <form id="message-form" class="flex space-x-2">
                        @csrf
                        <input type="hidden" name="payment_id" id="payment-id" value="{{ $payment->id }}">
                        <input type="hidden" name="receiver_id" id="receiver-id" value="{{ $isSpecialist ? $payment->user_id : $payment->specialist->user_id }}">
                        <input 
                            type="text" 
                            name="message" 
                            id="message-input"
                            placeholder="Type your message..." 
                            class="flex-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            autocomplete="off"
                            required
                        >
                        <button 
                            type="submit" 
                            class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded transition"
                        >
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatMessages = document.getElementById('chat-messages');
            const messageForm = document.getElementById('message-form');
            const messageInput = document.getElementById('message-input');
            const paymentId = document.getElementById('payment-id').value;
            const receiverId = document.getElementById('receiver-id').value;
            
            // Scroll to bottom of chat on load
            scrollToBottom();
            
            // Handle form submission
            messageForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Disable button during processing
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                submitButton.disabled = true;
                submitButton.textContent = 'Sending...';
                
                // Get message text
                const messageText = messageInput.value.trim();
                if (!messageText) {
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                    return;
                }

                // Create form data manually to ensure all fields are included
                const formData = new FormData();
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                formData.append('payment_id', paymentId);
                formData.append('receiver_id', receiverId);
                formData.append('message', messageText);
                
                // Debug - log the form data
                console.log('Sending data:', {
                    payment_id: paymentId,
                    receiver_id: receiverId,
                    message: messageText
                });
                
                // Method 1: Using JSON approach
                const jsonData = {
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    payment_id: paymentId,
                    receiver_id: receiverId,
                    message: messageText
                };
                
                fetch('{{ route("chat.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(jsonData)
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw new Error(JSON.stringify(err));
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        appendMessage(data.message);
                        messageInput.value = '';
                        scrollToBottom();
                    } else {
                        console.error('Error:', data.message || 'Unknown error');
                        alert('Failed to send message. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to send message: ' + error.message);
                })
                .finally(() => {
                    // Re-enable button
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                });
            });
            
            // Function to append a new message to the chat
            function appendMessage(message) {
                const isCurrentUserSender = message.sender_id === {{ auth()->id() }};
                
                const messageDiv = document.createElement('div');
                messageDiv.className = `flex mb-4 ${isCurrentUserSender ? 'justify-end' : 'justify-start'}`;
                
                const messageBubble = document.createElement('div');
                messageBubble.className = `max-w-[70%] ${isCurrentUserSender ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-800'} rounded-lg py-2 px-4`;
                
                const messageText = document.createElement('p');
                messageText.textContent = message.message;
                
                const messageTime = document.createElement('p');
                messageTime.className = `text-xs ${isCurrentUserSender ? 'text-indigo-200' : 'text-gray-500'} mt-1`;
                
                // Format the time (assumes the message timestamp is in the response)
                const date = new Date(message.created_at);
                messageTime.textContent = date.getHours().toString().padStart(2, '0') + ':' + 
                                         date.getMinutes().toString().padStart(2, '0');
                
                messageBubble.appendChild(messageText);
                messageBubble.appendChild(messageTime);
                messageDiv.appendChild(messageBubble);
                
                chatMessages.appendChild(messageDiv);
            }
            
            // Function to scroll to bottom of chat
            function scrollToBottom() {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
            
            // Listen for new messages with Laravel Echo (if configured)
            if (window.Echo) {
                window.Echo.private('chat.' + paymentId)
                    .listen('NewChatMessage', (e) => {
                        appendMessage(e.chat);
                        scrollToBottom();
                    });
            }
        });
    
if (window.Echo) {
    console.log('Setting up Echo listener for channel: chat.' + paymentId);
    
    window.Echo.private('chat.' + paymentId)
        .listen('NewChatMessage', (e) => {
            console.log('Received message via Echo:', e);
            if (e.chat) {
                appendMessage(e.chat);
                scrollToBottom();
            } else {
                console.error('Received message event but no chat data:', e);
            }
        });
        
    // Also listen on the personal channel
    window.Echo.private('user.{{ auth()->id() }}')
        .listen('NewChatMessage', (e) => {
            console.log('Received personal message via Echo:', e);
            if (e.chat) {
                appendMessage(e.chat);
                scrollToBottom();
            }
        });
} else {
    console.error('Echo is not available! Real-time messaging will not work.');
}
    </script>
</x-app-layout>