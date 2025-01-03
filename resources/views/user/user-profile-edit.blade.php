<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            <form id="personal-info-form" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="form-section active">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <i class="fas fa-user"></i> Full Name
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="phone_number">
                        <i class="fas fa-phone"></i> Phone Number
                    </label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" 
                           oninput="validatePhoneNumber()" pattern="^962[0-9]{9}$" maxlength="12" required>
                    <div id="phone-error" class="text-danger" style="display:none;"></div> <!-- هنا تظهر رسائل الخطأ -->
                </div>
                
                
                
                <div class="form-group">
                    <label for="profile_picture">
                        <i class="fas fa-camera"></i> Profile Picture
                    </label>
                    <input type="file" id="profile_picture" name="profile_picture">
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a href="{{ route('user.profile') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
            
            <!-- Password Change Form -->
<form id="password-form" action="{{ route('user.profile.update') }}" method="POST" class="form-section">
    @csrf
    <div class="form-group">
        <label for="current_password">
            <i class="fas fa-key"></i> Current Password
        </label>
        <input type="password" name="current_password" id="current_password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="new_password">
            <i class="fas fa-lock"></i> New Password
        </label>
        <input type="password" name="new_password" id="new_password" class="form-control" required>
        <div id="password-error" class="text-danger" style="display:none;"></div>
    </div>
    
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
        <a href="{{ route('user.profile') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Cancel
        </a>
    </div>
</form>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
    <script src="{{ asset('user/js/userprof.js') }}"></script>
</body>
</html>