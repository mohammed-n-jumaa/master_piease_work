<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lawyer Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/index.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/profile.css') }}" rel="stylesheet">

    <style>
        .tab-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            justify-content: center;
        }
        .tab-button {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            background-color: #f0f0f0;
            cursor: pointer;
            transition: all 0.3s;
            min-width: 200px;
        }
        .tab-button.active {
            background-color: #aa9166;
            color: #1a1b1c;
        }
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
        .actions {
            margin-top: 2rem;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            margin-right: 1rem;
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        .full-width {
            grid-column: span 2;
        }
        .dropdown-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }
    </style>
</head>
<body>
    @include('layouts.User-Header')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="container">
        <div class="edit-card">
            <div class="header">
                <h1>Edit Profile</h1>
            </div>

            <div class="tab-buttons">
                <button type="button" class="tab-button active" onclick="showSection('personal-info-form')">
                    <i class="fas fa-user"></i> Personal Information
                </button>
                <button type="button" class="tab-button" onclick="showSection('password-form')">
                    <i class="fas fa-lock"></i> Change Password
                </button>
            </div>
            
            <!-- Personal Information Form -->
            <form id="personal-info-form" action="{{ route('lawyer.profile.update') }}" method="POST" enctype="multipart/form-data" class="form-section active">
                @csrf
                <h2 class="section-title">
                    <i class="fas fa-user"></i> Personal Information
                </h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="first_name">
                            <i class="fas fa-user"></i> First Name
                        </label>
                        <input type="text" id="first_name" name="first_name" value="{{ $lawyer->first_name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">
                            <i class="fas fa-user"></i> Last Name
                        </label>
                        <input type="text" id="last_name" name="last_name" value="{{ $lawyer->last_name }}" required>
                    </div>

<!-- رقم الهاتف -->
<div class="form-group">
    <label for="phone_number">
        <i class="fas fa-phone"></i> Phone Number
    </label>
    <input type="text" id="phone_number" name="phone_number" value="{{ $lawyer->phone_number }}" maxlength="12" oninput="validatePhoneNumber()">
    <div id="phone-error" class="text-danger" style="display:none;"></div>
</div>

                    <div class="form-group">
                        <label for="date_of_birth">
                            <i class="fas fa-calendar"></i> Date of Birth
                        </label>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $lawyer->date_of_birth }}">
                    </div>
                </div>

                <h2 class="section-title">
                    <i class="fas fa-balance-scale"></i> Professional Information
                </h2>
                <div class="form-grid">
                    <div class="form-group full-width" style="position: relative;">
                        <label for="specialization">
                            <i class="fas fa-gavel"></i> Specialization
                        </label>
                        <select id="specialization" name="specialization" class="form-control">
                            @if($lawyer->category)
                                <option value="{{ $lawyer->category->id }}" selected>
                                    {{ $lawyer->category->name }}
                                </option>
                            @else
                                <option value="" disabled selected>No specialization selected</option>
                            @endif
                            @foreach($categories as $category)
                                @if(!$lawyer->category || $category->id !== $lawyer->category->id)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <i class="fas fa-caret-down dropdown-icon"></i>
                    </div>
                </div>

                <h2 class="section-title">
                    <i class="fas fa-file-upload"></i> Documents
                </h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="profile_picture">
                            <i class="fas fa-camera"></i> Profile Picture
                        </label>
                        <input type="file" id="profile_picture" name="profile_picture">
                    </div>

                    <div class="form-group">
                        <label for="lawyer_certificate">
                            <i class="fas fa-certificate"></i> Lawyer Certificate
                        </label>
                        <input type="file" id="lawyer_certificate" name="lawyer_certificate">
                    </div>

                    <div class="form-group full-width">
                        <label for="syndicate_card">
                            <i class="fas fa-id-card"></i> Syndicate Card
                        </label>
                        <input type="file" id="syndicate_card" name="syndicate_card">
                    </div>
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a href="{{ route('lawyer.profile') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
            
            <!-- Password Change Form -->
            <form id="password-form" action="{{ route('lawyer.profile.change-password') }}" method="POST" class="form-section">
                @csrf
                <div class="form-group">
                    <label for="current_password">
                        <i class="fas fa-key"></i> Current Password
                    </label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                </div>

               <!-- كلمة السر -->
<div class="form-group">
    <label for="new_password">
        <i class="fas fa-lock"></i> New Password
    </label>
    <input type="password" name="new_password" id="new_password" class="form-control" required>
    <div id="password-error" class="text-danger" style="display:none;"></div>
</div>

<!-- تأكيد كلمة السر -->
<div class="form-group">
    <label for="new_password_confirmation">
        <i class="fas fa-check-circle"></i> Confirm New Password
    </label>
    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
    <div id="confirm-password-error" class="text-danger" style="display:none;"></div>
</div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a href="{{ route('lawyer.profile') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
    
    <script>
        function showSection(sectionId) {
            // Hide all forms
            document.querySelectorAll('.form-section').forEach(form => {
                form.classList.remove('active');
            });
            
            // Remove active class rom all buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });
            
            // Show selected form
            document.getElementById(sectionId).classList.add('active');
            
            // Add active class to clicked button
            event.target.classList.add('active');
        }
    </script>
    <script>
    // عند تحميل الصفحة، نثبت "962" في بداية الحقل إذا لم تكن موجودة
    window.onload = function() {
        var phoneInput = document.getElementById('phone_number');
        
        // إذا لم يبدأ الرقم بـ "962"، نضيفه
        if (!phoneInput.value.startsWith("962")) {
            phoneInput.value = "962"; // التأكد من أن الرقم يبدأ بـ "962"
        }
    };

    // التحقق من رقم الهاتف
    document.getElementById('phone_number').addEventListener('input', function() {
        validatePhoneNumber();
    });

    function validatePhoneNumber() {
        var phoneInput = document.getElementById('phone_number');
        var phoneError = document.getElementById('phone-error');
        var currentValue = phoneInput.value;

        // إذا كان الرقم يبدأ بـ "962"، نسمح فقط بـ 9 أرقام بعدها
        if (currentValue.startsWith("962")) {
            // إذا كان الرقم يتكون من أكثر من 12 حرفًا، نقتصر على 12
            if (currentValue.length > 12) {
                phoneInput.value = currentValue.slice(0, 12);
            }
        } else {
            // إذا تم مسح "962" أو تعديلها، نعيد القيمة إلى "962"
            phoneInput.value = "962";
        }

        var phoneValid = true;
        var errorMessages = [];

        // التحقق من أن رقم الهاتف يبدأ بـ "962"
        if (!phoneInput.value.startsWith("962")) {
            errorMessages.push("Phone number must start with 962.");
            phoneValid = false;
        }

        // التحقق من أن رقم الهاتف يحتوي على 12 رقمًا (962 + 9 أرقام)
        if (phoneInput.value.length !== 12) {
            errorMessages.push("Phone number must be exactly 12 digits.");
            phoneValid = false;
        }

        // إظهار رسائل الخطأ إذا كانت البيانات غير صحيحة
        if (!phoneValid) {
            phoneError.style.display = 'block';
            phoneError.innerHTML = errorMessages.join('<br>');
            phoneInput.classList.remove('is-valid');
            phoneInput.classList.add('is-invalid');
        } else {
            phoneError.style.display = 'none';
            phoneInput.classList.remove('is-invalid');
            phoneInput.classList.add('is-valid');
        }
    }

    // التحقق من كلمة السر
    document.getElementById('new_password').addEventListener('input', function() {
        validateNewPassword();
    });

    document.getElementById('new_password_confirmation').addEventListener('input', function() {
        validatePasswordConfirmation();
    });

    // دالة للتحقق من كلمة السر
    function validateNewPassword() {
        var password = document.getElementById('new_password').value;
        var passwordError = document.getElementById('password-error');
        var passwordValid = true;
        var errorMessages = [];

        // تحقق من وجود حرف صغير
        if (!/[a-z]/.test(password)) {
            errorMessages.push("Password must contain at least one lowercase letter.");
            passwordValid = false;
        }

        // تحقق من وجود حرف كبير
        if (!/[A-Z]/.test(password)) {
            errorMessages.push("Password must contain at least one uppercase letter.");
            passwordValid = false;
        }

        // تحقق من وجود رقم
        if (!/[0-9]/.test(password)) {
            errorMessages.push("Password must contain at least one number.");
            passwordValid = false;
        }

        // تحقق من وجود حرف خاص
        if (!/[@$!%*?&]/.test(password)) {
            errorMessages.push("Password must contain at least one special character (@$!%*?&).");
            passwordValid = false;
        }

        // تحقق من طول كلمة السر
        if (password.length < 6) {
            errorMessages.push("Password must be at least 6 characters long.");
            passwordValid = false;
        }

        // إظهار الرسائل إذا كانت كلمة السر غير صالحة
        if (!passwordValid) {
            passwordError.style.display = 'block';
            passwordError.innerHTML = errorMessages.join('<br>');
            document.getElementById('new_password').classList.remove('is-valid');
            document.getElementById('new_password').classList.add('is-invalid');
        } else {
            passwordError.style.display = 'none';
            document.getElementById('new_password').classList.remove('is-invalid');
            document.getElementById('new_password').classList.add('is-valid');
        }
    }

    // دالة للتحقق من تطابق كلمة السر المؤكدة
    function validatePasswordConfirmation() {
        var password = document.getElementById('new_password').value;
        var confirmPassword = document.getElementById('new_password_confirmation').value;
        var confirmPasswordError = document.getElementById('confirm-password-error');

        if (confirmPassword === password) {
            confirmPasswordError.style.display = 'none';
            document.getElementById('new_password_confirmation').classList.remove('is-invalid');
            document.getElementById('new_password_confirmation').classList.add('is-valid');
        } else {
            confirmPasswordError.style.display = 'block';
            confirmPasswordError.innerText = 'Passwords do not match.';
            document.getElementById('new_password_confirmation').classList.remove('is-valid');
            document.getElementById('new_password_confirmation').classList.add('is-invalid');
        }
    }
</script>

    
</body>
</html>