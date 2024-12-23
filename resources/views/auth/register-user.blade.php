<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mustashark - User Registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('user/css/userReg.css') }}" rel="stylesheet">
</head>
<body>
    <div class="registration-container">
        <div class="left-panel">
            <div class="logo-section">
                <div class="logo">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <style>
                            @keyframes scaleBalance {
                                0%, 100% { transform: scale(1) rotate(0deg); }
                                50% { transform: scale(1.05) rotate(2deg); }
                            }
                            .scale { animation: scaleBalance 3s ease-in-out infinite; }
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
                        
                    </svg>
                </div>
                <h2 style="color: white;">Join Mustashark</h2>
                <p style="color: rgba(255,255,255,0.8); font-size: 1.1rem;">Get access to professional legal consultation</p>
            </div>
        </div>
        
        <div class="right-panel">
            <h2>Create Account</h2>
            <p class="subtitle">Register as a new user</p>

            <form action="{{ route('register.user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="input-group">
                        <input type="text" name="name" placeholder="Full Name" required>
                        <i class="fas fa-user"></i>
                    </div>
                    
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email Address" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                    
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="phone_number" 
                            id="phone_number" 
                            placeholder="962XXXXXXXXX" 
                            value="962" 
                            maxlength="12" 
                            required 
                            oninput="validatePhoneNumber(this)"
                        >
                        <i class="fas fa-phone"></i>
                        <div id="phone_error" class="error-message" style="display: none;">Phone number must start with 962 and contain exactly 9 digits</div>
                    </div>
                    
                    
                    <div class="input-group full-width">
                        <input type="date" name="date_of_birth" required>
                        <i class="fas fa-calendar"></i>
                    </div>
                    
                 
                </div>
                
                <button type="submit" class="btn">
                    Create Account
                </button>
            </form>

            <div class="login-link">
                <a href="{{ route('user.lawyer.login.form') }}">Already have an account? Sign in</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('user/js/userreg.js') }}"></script>
</body>
</html>