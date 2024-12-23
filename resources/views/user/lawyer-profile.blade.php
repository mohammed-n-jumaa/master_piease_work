<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Profile</title>
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
<link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('user/css/index.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #121518;
            color: #fff;
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .profile-card {
            background: rgba(170, 145, 102, 0.05);
            border: 1px solid #aa9166;
            border-radius: 15px;
            overflow: hidden;
            backdrop-filter: blur(10px);
            position: relative;
        }

        .header-banner {
            height: 200px;
            background: linear-gradient(45deg, #121518, #aa9166);
            position: relative;
            overflow: hidden;
        }

        .header-banner::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/api/placeholder/1000/200') center/cover;
            opacity: 0.3;
        }

        .profile-content {
            margin-top: -75px;
            padding: 0 30px;
            position: relative;
            z-index: 1;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #aa9166;
            background: #121518;
            margin: 0 auto;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-info {
            text-align: center;
            padding: 20px 0;
        }

        .profile-name {
            font-size: 2rem;
            color: #aa9166;
            margin: 15px 0;
            font-weight: 600;
        }

        .lawyer-title {
            color: #aa9166;
            font-size: 1.2rem;
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
            padding: 20px;
            background: rgba(170, 145, 102, 0.1);
            border-radius: 10px;
        }

        .info-item {
            padding: 15px;
            border-left: 3px solid #aa9166;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: rgba(170, 145, 102, 0.2);
            transform: translateX(5px);
        }

        .info-label {
            font-size: 0.9rem;
            color: #aa9166;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 1.1rem;
            color: #fff;
        }

        .document-section {
            margin: 30px 0;
            padding: 20px;
            background: rgba(170, 145, 102, 0.1);
            border-radius: 10px;
        }

        .document-title {
            color: #aa9166;
            font-size: 1.2rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .document-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .document-item {
            text-align: center;
            padding: 20px;
            background: rgba(170, 145, 102, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .document-item:hover {
            background: rgba(170, 145, 102, 0.2);
            transform: translateY(-5px);
        }

        .document-icon {
            font-size: 2rem;
            color: #aa9166;
            margin-bottom: 10px;
        }

        .document-link {
            color: #fff;
            text-decoration: none;
            display: inline-block;
            padding: 8px 15px;
            border: 1px solid #aa9166;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .document-link:hover {
            background: #aa9166;
            color: #121518;
        }

        .actions {
            text-align: center;
            padding: 30px 0;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #aa9166;
            color: #121518;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: 2px solid #aa9166;
        }

        .btn:hover {
            background: transparent;
            color: #aa9166;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(170, 145, 102, 0.3);
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
                margin: 20px auto;
            }
            
            .profile-content {
                padding: 0 15px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .document-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
@include('layouts.User-Header')
    <div class="container">
        <div class="profile-card">
            <div class="header-banner"></div>
            <div class="profile-content">
                <div class="profile-picture">
                    <img src="{{ asset('storage/' . $lawyer->profile_picture) }}" alt="Profile Picture">
                </div>
                <div class="profile-info">
                    <h1 class="profile-name">{{ $lawyer->first_name . ' ' . $lawyer->last_name }}</h1>
                    <div class="lawyer-title">
                        <i class="fas fa-balance-scale"></i> Professional Lawyer
                    </div>
                    
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-envelope"></i> Email
                            </div>
                            <div class="info-value">{{ $lawyer->email }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-phone"></i> Phone
                            </div>
                            <div class="info-value">{{ $lawyer->phone_number }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-gavel"></i> Specialization
                            </div>
                            <div class="info-value">{{ $lawyer->category->name ?? 'Not Specified' }}</div>
                        </div>
                        

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar"></i> Date of Birth
                            </div>
                            <div class="info-value">{{ $lawyer->date_of_birth }}</div>
                        </div>
                    </div>

                    <div class="document-section">
                        <h2 class="document-title">Professional Documents</h2>
                        <div class="document-grid">
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <h3 class="info-label">Lawyer Certificate</h3>
                                <a href="{{ asset('storage/' . $lawyer->lawyer_certificate) }}" class="document-link" target="_blank">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </div>

                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-id-card"></i>
                                </div>
                                <h3 class="info-label">Syndicate Card</h3>
                                <a href="{{ asset('storage/' . $lawyer->syndicate_card) }}" class="document-link" target="_blank">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="actions">
                    <a href="{{ route('lawyer.profile.edit') }}" class="btn">
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