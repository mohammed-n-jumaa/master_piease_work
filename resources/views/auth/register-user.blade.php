<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mustashark - User Registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(-45deg, #121518, #1a1e23, #2c2418, #aa9166);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .registration-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            box-shadow: 0 25px 45px rgba(0,0,0,0.3);
            overflow: hidden;
            width: 100%;
            max-width: 1200px;
            min-height: 700px;
            display: flex;
            animation: fadeIn 0.8s ease-out;
            backdrop-filter: blur(10px);
        }

        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #121518 0%, #aa9166 100%);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path d="M 0,100 C 20,120 50,120 100,100 C 150,80 180,80 200,100 L 200,200 L 0,200" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: cover;
            animation: float 5s ease-in-out infinite;
        }

        .logo-section {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .logo {
            width: 150px;
            height: 150px;
            margin: 0 auto 2rem;
            animation: float 6s ease-in-out infinite;
        }

        .right-panel {
            flex: 1.2;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            color: #121518;
            margin-bottom: 0.5rem;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .subtitle {
            color: #666;
            font-size: 1.2rem;
            margin-bottom: 3rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .input-group {
            position: relative;
            animation: slideIn 0.8s ease-out;
        }

        .input-group.full-width {
            grid-column: 1 / -1;
        }

        .input-group i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #aa9166;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        input:not([type="file"]) {
            width: 100%;
            padding: 18px 55px;
            border: 2px solid rgba(170, 145, 102, 0.3);
            border-radius: 15px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        input[type="date"] {
            padding-right: 15px;
        }

        .file-input-group {
            position: relative;
            grid-column: 1 / -1;
            margin: 1rem 0;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 18px;
            border: 2px dashed #aa9166;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            background: rgba(170, 145, 102, 0.1);
        }

        input[type="file"] {
            display: none;
        }

        input:focus {
            border-color: #aa9166;
            outline: none;
            box-shadow: 0 0 20px rgba(170, 145, 102, 0.2);
        }

        input:focus + i {
            color: #121518;
            transform: translateY(-50%) scale(1.1);
        }

        .btn {
            padding: 18px;
            border: none;
            border-radius: 15px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-top: 2rem;
            width: 100%;
            background-color: #aa9166;
            color: white;
        }

        .btn:hover {
            background-color: #121518;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(170, 145, 102, 0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 2rem;
        }

        .login-link a {
            color: #aa9166;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #121518;
            text-decoration: underline;
        }

        @media (max-width: 1024px) {
            .registration-container {
                flex-direction: column;
                max-width: 600px;
            }
            
            .left-panel {
                padding: 2rem;
            }
            
            .right-panel {
                padding: 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
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
                        <input type="text" name="phone_number" placeholder="Phone Number" required>
                        <i class="fas fa-phone"></i>
                    </div>
                    
                    <div class="input-group full-width">
                        <input type="date" name="date_of_birth" required>
                        <i class="fas fa-calendar"></i>
                    </div>
                    
                    <div class="file-input-group">
                        <label for="profile_picture" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Upload Profile Picture</span>
                        </label>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
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
</body>
</html>