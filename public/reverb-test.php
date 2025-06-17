<?php
// This is a simple diagnostic script to test if your server can handle JSON responses
header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'message' => 'JSON response is working correctly',
    'time' => date('Y-m-d H:i:s'),
    'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'
]);
