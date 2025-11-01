<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login' }} - ePresensi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .bg-left {
            position: absolute;
            left: 0;
            top: 0;
            width: 50%;
            height: 100%;
            background: url('{{ asset('assets/img/gedung.png') }}') center/cover;
            clip-path: polygon(0 0, 100% 0, 0 100%);
        }
        
        .bg-right {
            position: absolute;
            right: 0;
            top: 0;
            width: 50%;
            height: 100%;
            background: url('{{ asset('assets/img/logo.jpg') }}') center;
            clip-path: polygon(100% 0, 100% 100%, 0 100%);
        }
        
        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(70, 167, 154, 0.85);
        }
        
        .diagonal-line {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, 
                transparent calc(50% - 0.5px),
                rgba(255, 255, 255, 0.5) calc(50% - 0.5px),
                rgba(255, 255, 255, 0.5) calc(50% + 0.5px),
                transparent calc(50% + 0.5px)
            );
            z-index: 1;
        }
        
        .bg-right {
            background-size: 55% auto !important;
            background-position: 85% 80% !important;
            background-repeat: no-repeat !important;
        }
        
        .login-form {
            background: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 2;
            margin: 1rem;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="bg-left">
            <div class="overlay"></div>
        </div>
        <div class="bg-right">
            <div class="overlay"></div>
        </div>
        <div class="diagonal-line"></div>
        
        <div class="login-form">
            <h1 class="text-2xl font-semibold text-center mb-6 text-mint-600">ePresensi</h1>
            @yield('content')
        </div>
    </div>
</body>
</html>
