<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .success-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .message {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #555;
        }
        .login-details {
            background-color: #f8f9fa;
            border-left: 4px solid #28a745;
            padding: 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .login-details h3 {
            margin-top: 0;
            color: #2c3e50;
            font-size: 16px;
        }
        .detail-item {
            margin: 10px 0;
            display: flex;
            align-items: center;
        }
        .detail-label {
            font-weight: 600;
            color: #2c3e50;
            width: 120px;
            flex-shrink: 0;
        }
        .detail-value {
            color: #555;
            word-break: break-word;
        }
        .security-notice {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 4px;
            padding: 15px;
            margin: 20px 0;
        }
        .security-notice h4 {
            margin-top: 0;
            color: #856404;
            font-size: 14px;
        }
        .security-notice p {
            margin-bottom: 0;
            color: #856404;
            font-size: 13px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
            color: #6c757d;
        }
        .app-name {
            font-weight: 600;
            color: #667eea;
        }
        @media (max-width: 600px) {
            .container {
                width: 100%;
                box-shadow: none;
            }
            .header, .content, .footer {
                padding: 20px;
            }
            .detail-item {
                flex-direction: column;
                align-items: flex-start;
            }
            .detail-label {
                width: auto;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="success-icon">✅</div>
            <h1>Login Berhasil</h1>
        </div>
        
        <div class="content">
            <div class="greeting">
                Halo, {{ $user->name }}!
            </div>
            
            <div class="message">
                Kami ingin memberitahukan bahwa akun Anda telah berhasil login ke <span class="app-name">{{ config('app.name') }}</span>.
            </div>
            
            <div class="login-details">
                <h3>📋 Detail Login</h3>
                <div class="detail-item">
                    <span class="detail-label">Waktu Login:</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($loginTime)->format('d M Y, H:i:s') }} WIB</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Alamat IP:</span>
                    <span class="detail-value">{{ $ipAddress }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $user->email }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Browser:</span>
                    <span class="detail-value">{{ $userAgent }}</span>
                </div>
            </div>
            
            <div class="security-notice">
                <h4>🔒 Keamanan Akun</h4>
                <p>Jika Anda tidak melakukan login ini, segera hubungi tim support kami dan ubah password Anda. Pastikan untuk selalu menggunakan password yang kuat dan unik.</p>
            </div>
        </div>
        
        <div class="footer">
            <p>Email ini dikirim secara otomatis oleh sistem <span class="app-name">{{ config('app.name') }}</span></p>
            <p>Jika Anda memiliki pertanyaan, silakan hubungi tim support kami.</p>
        </div>
    </div>
</body>
</html>