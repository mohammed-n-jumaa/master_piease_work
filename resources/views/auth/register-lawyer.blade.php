<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mustashark - Lawyer Registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('user/css/lawreg.css') }}" rel="stylesheet">

</head>
<body>
    <div class="registration-container">
        <div class="left-panel">
            <div class="logo-section">
                <div class="logo">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">  
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
                <h2 style="color: white;">Join as a Lawyer</h2>
                <p style="color: rgba(255,255,255,0.8); font-size: 1.1rem;">Provide legal expertise on our platform</p>
            </div>

            <div class="requirements-list">
                <h3>Requirements</h3>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Valid Lawyer Certificate</li>
                    <li><i class="fas fa-check-circle"></i> Syndicate Card</li>
                    <li><i class="fas fa-check-circle"></i> Legal Specialization</li>
                </ul>
            </div>
        </div>
        
        <div class="right-panel">
            <h2>Lawyer Registration</h2>
            <p class="subtitle">Create your professional account</p>

            <form action="{{ route('register.lawyer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="input-group">
                        <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                        <i class="fas fa-user"></i>
                        @error('first_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="input-group">
                        <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                        <i class="fas fa-user"></i>
                        @error('last_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                        <i class="fas fa-envelope"></i>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fas fa-lock"></i>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="phone_number" 
                            id="phone_number" 
                            placeholder="Phone Number" 
                            value="962" 
                            maxlength="12" 
                            pattern="962[0-9]{9}" 
                            required 
                            oninput="enforceJordanPhoneNumber(this)"
                        >
                        <i class="fas fa-phone"></i>
                        @error('phone_number')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="input-group">
                        <select name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        <i class="fas fa-venus-mars"></i>
                        @error('gender')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <div class="input-group full-width">
                        <select name="specialization" required>
                            <option value="">Select Legal Specialization</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('specialization') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fas fa-briefcase"></i>
                        @error('specialization')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                    <div class="input-group full-width">
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        <i class="fas fa-calendar"></i>
                        @error('date_of_birth')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="file-input-group">
                        <label for="syndicate_card" class="file-input-label">
                            <i class="fas fa-id-card"></i>
                            <span id="syndicate_card_label">Syndicate Card Uploaded</span>
                        </label>
                        <input 
                            type="file" 
                            id="syndicate_card" 
                            name="syndicate_card" 
                            accept="image/*" 
                            required 
                            onchange="highlightField(this, 'syndicate_card_label')"
                        >
                        @error('syndicate_card')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="file-input-group">
                        <label for="lawyer_certificate" class="file-input-label">
                            <i class="fas fa-certificate"></i>
                            <span id="lawyer_certificate_label">Lawyer Certificate Uploaded</span>
                        </label>
                        <input 
                            type="file" 
                            id="lawyer_certificate" 
                            name="lawyer_certificate" 
                            accept="image/*" 
                            required 
                            onchange="highlightField(this, 'lawyer_certificate_label')"
                        >
                        @error('lawyer_certificate')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
                
                <button type="submit" class="btn">
                    Register as Lawyer
                </button>
            </form>
            

            <div class="login-link">
                <a href="{{ route('user.lawyer.login.form') }}">Already have an account? Sign in</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('user/js/lawreg.js') }}"></script>
</body>
</html>