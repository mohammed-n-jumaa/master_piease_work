<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Favicon -->
<link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

<!-- CSS Libraries -->
<link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('user/css/index.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

</head>
<body>
    @include('layouts.User-Header')
    <div class="container">
        <div class="profile-card">
            <div class="header-banner"></div>
            <div class="profile-content">
                <div class="profile-picture">
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
                </div>
                <div class="profile-info">
                    <h1 class="profile-name">{{ $user->name }}</h1>
                    
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-envelope"></i> Email
                            </div>
                            <div class="info-value">{{ $user->email }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-phone"></i> Phone
                            </div>
                            <div class="info-value">{{ $user->phone_number }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar"></i> Date of Birth
                            </div>
                            <div class="info-value">{{ $user->date_of_birth }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="actions">
                    <a href="{{ route('user.profile.edit') }}" class="btn">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
        <!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script>

</body>
</html>