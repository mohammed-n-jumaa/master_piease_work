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
        /* Tablet styles */
@media screen and (max-width: 768px) {
    .edit-card {
        padding: 1.5rem;
        margin: 1rem;
    }

    .tab-buttons {
        flex-direction: column;
        gap: 0.5rem;
    }

    .tab-button {
        min-width: 100%;
        padding: 0.5rem 1rem;
    }

    .header h1 {
        font-size: 1.75rem;
    }

    .actions {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .actions .btn {
        width: 100%;
        margin-right: 0;
    }
}

/* Mobile styles */
@media screen and (max-width: 480px) {
    .container {
        padding: 10px;
    }

    .edit-card {
        padding: 1rem;
        margin: 0.5rem;
    }

    .header h1 {
        font-size: 1.5rem;
    }

    .form-group label {
        font-size: 0.9rem;
    }

    .form-group input {
        padding: 0.5rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }

    /* Improve form spacing on mobile */
    .form-section {
        margin-top: 1rem;
    }

    /* Make alerts more compact on mobile */
    .alert {
        padding: 0.75rem;
        margin: 0.5rem;
        font-size: 0.9rem;
    }
}

/* Utility classes for better spacing */
.mt-2 {
    margin-top: 2rem;
}

.mb-2 {
    margin-bottom: 2rem;
}

/* Improve input accessibility on mobile */
input[type="file"] {
    font-size: 0.9rem;
    padding: 0.5rem;
}

/* Improve button touch targets on mobile */
button, 
.btn {
    min-height: 44px;
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
                    <input type="text" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
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
    </div>

    <div class="form-group">
        <label for="new_password_confirmation">
            <i class="fas fa-check-circle"></i> Confirm New Password
        </label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
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
    
    <script>
        function showSection(sectionId) {
            // Hide all forms
            document.querySelectorAll('.form-section').forEach(form => {
                form.classList.remove('active');
            });
            
            // Remove active class from all buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });
            
            // Show selected form
            document.getElementById(sectionId).classList.add('active');
            
            // Add active class to clicked button
            event.target.classList.add('active');
        }
    </script>
</body>
</html>