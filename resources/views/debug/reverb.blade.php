<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reverb Debug</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">🔧 Laravel Reverb Debug</h1>
        
        <!-- Status Panel -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">📊 Connection Status</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-50 p-4 rounded">
                    <h3 class="font-semibold">Reverb Server</h3>
                    <p id="reverb-status" class="text-gray-600">Checking...</p>
                </div>
                <div class="bg-gray-50 p-4 rounded">
                    <h3 class="font-semibold">Echo Status</h3>
                    <p id="echo-status" class="text-gray-600">Checking...</p>
                </div>
                <div class="bg-gray-50 p-4 rounded">
                    <h3 class="font-semibold">WebSocket</h3>
                    <p id="websocket-status" class="text-gray-600">Checking...</p>
                </div>
            </div>
        </div>

        <!-- Configuration Panel -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">⚙️ Configuration</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <strong>Broadcast Driver:</strong> {{ config('broadcasting.default') }}<br>
                    <strong>Reverb Host:</strong> {{ config('broadcasting.connections.reverb.options.host') }}<br>
                    <strong>Reverb Port:</strong> {{ config('broadcasting.connections.reverb.options.port') }}<br>
                    <strong>Reverb Scheme:</strong> {{ config('broadcasting.connections.reverb.options.scheme') }}
                </div>
                <div>
                    <strong>App ID:</strong> {{ config('broadcasting.connections.reverb.app_id') }}<br>
                    <strong>App Key:</strong> {{ config('broadcasting.connections.reverb.key') }}<br>
                    <strong>WebSocket URL:</strong> ws://127.0.0.1:8080<br>
                    <strong>Auth Endpoint:</strong> /broadcasting/auth
                </div>
            </div>
        </div>

        <!-- Test Panel -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">🧪 Tests</h2>
            <div class="space-y-4">
                <button id="test-reverb" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Test Reverb Server
                </button>
                <button id="test-echo" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Test Echo Connection
                </button>
                <button id="test-broadcast" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
                    Test Broadcasting
                </button>
                <button id="start-reverb-guide" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Show Start Guide
                </button>
            </div>
        </div>

        <!-- Log Panel -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">📝 Debug Log</h2>
            <div id="debug-log" class="bg-gray-900 text-green-400 p-4 rounded font-mono text-sm h-64 overflow-y-auto">
                <div>🚀 Debug session started...</div>
            </div>
        </div>

        <!-- Start Guide Modal -->
        <div id="start-guide-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white rounded-lg p-6 max-w-2xl mx-4">
                <h3 class="text-xl font-semibold mb-4">🚀 How to Start Reverb Server</h3>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-semibold">Method 1: Command Line</h4>
                        <code class="bg-gray-100 p-2 rounded block">php artisan reverb:start --host=127.0.0.1 --port=8080 --debug</code>
                    </div>
                    <div>
                        <h4 class="font-semibold">Method 2: Background Process</h4>
                        <code class="bg-gray-100 p-2 rounded block">nohup php artisan reverb:start --host=127.0.0.1 --port=8080 &</code>
                    </div>
                    <div>
                        <h4 class="font-semibold">Method 3: Using Script</h4>
                        <p>Run the start-reverb.sh (Linux/Mac) or start-reverb.bat (Windows) script</p>
                    </div>
                    <div class="bg-yellow-50 p-4 rounded">
                        <p class="text-yellow-800"><strong>Important:</strong> Make sure port 8080 is not used by other applications!</p>
                    </div>
                </div>
                <button id="close-modal" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded">Close</button>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const debugLog = document.getElementById('debug-log');
            const reverbStatus = document.getElementById('reverb-status');
            const echoStatus = document.getElementById('echo-status');
            const websocketStatus = document.getElementById('websocket-status');

            function log(message, type = 'info') {
                const timestamp = new Date().toLocaleTimeString();
                const colors = {
                    info: 'text-green-400',
                    error: 'text-red-400',
                    warning: 'text-yellow-400',
                    success: 'text-blue-400'
                };
                const div = document.createElement('div');
                div.className = colors[type] || 'text-green-400';
                div.textContent = `${timestamp}: ${message}`;
                debugLog.appendChild(div);
                debugLog.scrollTop = debugLog.scrollHeight;
            }

            function updateStatus(element, status, type = 'info') {
                const colors = {
                    success: 'text-green-600',
                    error: 'text-red-600',
                    warning: 'text-yellow-600',
                    info: 'text-blue-600'
                };
                element.textContent = status;
                element.className = colors[type] || 'text-gray-600';
            }

         // Test dengan cara yang sama seperti Echo
document.getElementById('test-reverb').addEventListener('click', function() {
    log('Testing Reverb with Pusher protocol...');
    updateStatus(reverbStatus, 'Testing...', 'warning');
    
    if (window.Echo && window.Echo.connector && window.Echo.connector.pusher) {
        const pusher = window.Echo.connector.pusher;
        const currentState = pusher.connection.state;
        
        log(`Current Pusher connection state: ${currentState}`, 'info');
        
        if (currentState === 'connected') {
            log('✅ Reverb server is running (via Pusher protocol)!', 'success');
            updateStatus(reverbStatus, 'Running', 'success');
        } else {
            log(`❌ Pusher connection state: ${currentState}`, 'error');
            updateStatus(reverbStatus, 'Not Connected', 'error');
        }
        
        // Test dengan create test connection
        pusher.connection.bind('connected', function() {
            log('🔄 Pusher connected event fired', 'success');
            updateStatus(reverbStatus, 'Running', 'success');
        });
        
        pusher.connection.bind('error', function(error) {
            log('❌ Pusher connection error: ' + JSON.stringify(error), 'error');
            updateStatus(reverbStatus, 'Error', 'error');
        });
        
    } else {
        log('❌ Echo/Pusher not available for testing', 'error');
        updateStatus(reverbStatus, 'Echo Not Available', 'error');
    }
});

            // Test Echo Connection
            document.getElementById('test-echo').addEventListener('click', function() {
                log('Testing Echo connection...');
                updateStatus(echoStatus, 'Testing...', 'warning');
                
                if (typeof window.Echo === 'undefined') {
                    log('❌ Echo is not available', 'error');
                    updateStatus(echoStatus, 'Not Available', 'error');
                    return;
                }
                // Tambahkan di bagian test Echo
if (window.Echo && window.Echo.connector && window.Echo.connector.pusher) {
    const pusher = window.Echo.connector.pusher;
    const config = pusher.config;
    
    log('Echo config - Host: ' + config.wsHost, 'info');
    log('Echo config - Port: ' + config.wsPort, 'info');
    log('Echo config - Scheme: ' + (config.encrypted ? 'wss' : 'ws'), 'info');
    log('Echo config - Cluster: ' + config.cluster, 'info');
    
    // Coba connect dengan konfigurasi yang sama seperti Echo
    const echoWsUrl = `${config.encrypted ? 'wss' : 'ws'}://${config.wsHost}:${config.wsPort}`;
    log('Trying Echo WebSocket URL: ' + echoWsUrl, 'info');
}

                log('✅ Echo is available', 'success');
                updateStatus(echoStatus, 'Available', 'success');

                // Test WebSocket connection
                if (window.Echo.connector && window.Echo.connector.pusher) {
                    const pusher = window.Echo.connector.pusher;
                    const state = pusher.connection.state;
                    
                    log(`WebSocket state: ${state}`, 'info');
                    updateStatus(websocketStatus, state, state === 'connected' ? 'success' : 'warning');

                    pusher.connection.bind('connected', function() {
                        log('✅ WebSocket connected!', 'success');
                        updateStatus(websocketStatus, 'Connected', 'success');
                    });

                    pusher.connection.bind('disconnected', function() {
                        log('❌ WebSocket disconnected', 'error');
                        updateStatus(websocketStatus, 'Disconnected', 'error');
                    });

                    pusher.connection.bind('error', function(error) {
                        log('❌ WebSocket error: ' + JSON.stringify(error), 'error');
                        updateStatus(websocketStatus, 'Error', 'error');
                    });
                }
            });

            // Test Broadcasting
            document.getElementById('test-broadcast').addEventListener('click', function() {
                log('Testing broadcasting...');
                
                const testData = {
                    payment_id: 1,
                    receiver_id: 3,
                    message: `Test message from debug page at ${new Date().toLocaleTimeString()}`
                };

                fetch('/chat/send', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(testData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        log('✅ Message sent successfully!', 'success');
                        log('Testing direct broadcast...', 'info');
                        
                        // Test direct broadcast
                        return fetch('/debug/test-broadcast', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ payment_id: 1 })
                        });
                    } else {
                        throw new Error(data.message || 'Unknown error');
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        log('✅ Direct broadcast sent successfully!', 'success');
                    } else {
                        log('❌ Direct broadcast failed: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    log('❌ Broadcasting test failed: ' + error.message, 'error');
                });
            });

            // Show start guide
            document.getElementById('start-reverb-guide').addEventListener('click', function() {
                document.getElementById('start-guide-modal').classList.remove('hidden');
                document.getElementById('start-guide-modal').classList.add('flex');
            });

            document.getElementById('close-modal').addEventListener('click', function() {
                document.getElementById('start-guide-modal').classList.add('hidden');
                document.getElementById('start-guide-modal').classList.remove('flex');
            });

            // Auto-run initial tests
            setTimeout(() => {
                document.getElementById('test-reverb').click();
            }, 1000);

            setTimeout(() => {
                document.getElementById('test-echo').click();
            }, 2000);

            // Setup Echo listeners for testing
            if (typeof window.Echo !== 'undefined') {
                log('Echo available, testing channels...', 'info');
                
                // Test payment channel
                log('Testing payment channel: chat.1', 'info');
                window.Echo.private('chat.1')
                    .listen('.NewChatMessage', (e) => {
                        log('📨 Received message on payment channel: ' + JSON.stringify(e), 'success');
                    })
                    .error((error) => {
                        log('❌ Payment channel error: ' + JSON.stringify(error), 'error');
                    });
                log('Payment channel listeners set up', 'info');

                // Test user channel
                log('Testing user channel: user.{{ auth()->id() }}', 'info');
                window.Echo.private('user.{{ auth()->id() }}')
                    .listen('.NewChatMessage', (e) => {
                        log('📨 Received message on user channel: ' + JSON.stringify(e), 'success');
                    })
                    .error((error) => {
                        log('❌ User channel error: ' + JSON.stringify(error), 'error');
                    });
                log('User channel listeners set up', 'info');
            }

            // Check Reverb server periodically
            setInterval(() => {
                log('Checking Reverb server...', 'info');
                fetch('http://localhost:8080')
                    .then(() => {
                        updateStatus(reverbStatus, 'Running', 'success');
                    })
                    .catch(() => {
                        updateStatus(reverbStatus, 'Not Running', 'error');
                    });
            }, 10000);
        });
    </script>
</body>
</html>
