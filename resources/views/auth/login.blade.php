<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mustashark - Legal Consultation Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @media (max-width: 1024px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .left-panel, .right-panel {
                padding: 2rem;
            }
            
            .logo {
                width: 150px !important;
                height: 150px !important;
            }
        }

        .scale { 
            animation: scaleBalance 3s ease-in-out infinite; 
        }
        
        .text-circle { 
            animation: float 3s ease-in-out infinite; 
        }

        @keyframes scaleBalance {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.05) rotate(2deg); }
        }
        
    </style>
</head>
<body class="h-full bg-gradient-to-r from-gray-900 via-gray-800 to-[#aa9166] bg-[length:400%_400%] animate-[gradientBG_15s_ease_infinite]">
    <div class="min-h-screen flex items-center justify-center">
        <div class="login-container bg-white/95 rounded-[30px] shadow-2xl overflow-hidden w-full max-w-[1200px] min-h-[600px] flex animate-[fadeIn_0.8s_ease-out] backdrop-blur-lg mx-4">
            <!-- Left Panel -->
            <div class="left-panel flex-1 bg-gradient-to-br from-[#121518] to-[#aa9166] p-12 flex flex-col justify-center items-center text-white relative overflow-hidden">
                <div class="text-center relative z-10">
                    <div class="logo">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <style>
                                @keyframes scaleBalance {
                                    0%, 100% { transform: scale(1) rotate(0deg); }
                                    50% { transform: scale(1.05) rotate(2deg); }
                                }
                                @keyframes float {
                                    0%, 100% { transform: translateY(0); }
                                    50% { transform: translateY(-5px); }
                                }
                                .scale { animation: scaleBalance 3s ease-in-out infinite; }
                                .text-circle { animation: float 3s ease-in-out infinite; }
                            </style>
                            
                            <circle cx="100" cy="100" r="95" fill="#121518"/>
                            <circle cx="100" cy="100" r="85" fill="#aa9166"/>
                            
                            <!-- Scale base -->
                            <rect x="70" y="140" width="60" height="4" fill="#121518" class="scale"/>
                            
                            <!-- Scale stand -->
                            <rect x="97" y="90" width="6" height="50" fill="#121518" class="scale"/>
                            
                            <!-- Scale arms -->
                            <path d="M60 90 L140 90" stroke="#121518" stroke-width="4" class="scale"/>
                            
                            <!-- Scale plates -->
                            <circle cx="70" cy="110" r="15" fill="#121518" class="scale"/>
                            <circle cx="130" cy="110" r="15" fill="#121518" class="scale"/>
                            
                            <!-- Circular text path -->
                            <path id="circlePath" d="M40,100 A60,60 0 1,1 160,100 A60,60 0 1,1 40,100" fill="none"/>
                            
                            <!-- Text on path -->
                            <text class="text-circle" fill="#121518" font-family="Arial" font-weight="bold" font-size="16">
                                <textPath href="#circlePath" startOffset="25%">MUSTASHARK </textPath>
                            </text>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold text-white mb-2">Welcome to Mustashark</h2>
                    <p class="text-lg text-white/80">Your Trusted Legal Consultation Platform</p>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="right-panel flex-1 p-12 flex flex-col justify-center">
                <h2 class="text-[#121518] text-4xl font-bold mb-2">Sign In</h2>
                <p class="text-gray-600 text-lg mb-12">Access your legal consultation portal</p>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-600 text-white p-4 rounded-lg text-center mb-6">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-8 relative animate-[slideIn_0.8s_ease-out]">
                        <input type="email" name="email" placeholder="Email Address" required
                               class="w-full py-[18px] px-14 border-2 border-[#aa9166]/30 rounded-[15px] text-lg transition-all focus:border-[#aa9166] focus:outline-none focus:shadow-lg bg-white/90" />
                        <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-[#aa9166] text-lg transition-all"></i>
                    </div>

                    <div class="mb-8 relative animate-[slideIn_0.8s_ease-out]">
                        <input type="password" name="password" placeholder="Password" required
                               class="w-full py-[18px] px-14 border-2 border-[#aa9166]/30 rounded-[15px] text-lg transition-all focus:border-[#aa9166] focus:outline-none focus:shadow-lg bg-white/90" />
                        <i class="fas fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-[#aa9166] text-lg transition-all"></i>
                    </div>

                    <div class="mb-8">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" 
                                   class="rounded border-gray-300 text-[#aa9166] shadow-sm focus:border-[#aa9166] focus:ring focus:ring-[#aa9166] focus:ring-opacity-50">
                            <span class="ml-2 text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <div class="grid gap-6 animate-[fadeIn_0.8s_ease-out]">
                        <button type="submit" 
                                class="py-4 px-4 bg-[#aa9166] text-white rounded-xl text-lg font-semibold tracking-wide transition-all hover:bg-[#121518] hover:-translate-y-1 hover:shadow-lg">
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="text-center mt-8">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-[#aa9166] hover:text-[#121518] hover:underline transition-all">
                            Forgot your password?
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>