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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/profile.css') }}" rel="stylesheet">
    <style>
      .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .btn-group {
        margin: 20px 0;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn-group .btn {
        flex: 1;
        padding: 10px 20px;
        border-radius: 50px;
        background-color: #aa9166;
        color: #1c1f23;
        font-weight: bold;
        border: 2px solid transparent;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-group .btn i {
        margin-right: 8px;
        font-size: 16px;
    }

    .btn-group .btn:hover {
        background-color: #7d684a;
        color: #fff;
    }

    .btn-group .btn.active {
        background-color: #1c1f23;
        color: #aa9166;
        border: 2px solid #aa9166; /* حدود ذهبية للزر النشط */
    }

    .btn-group .btn:focus {
        outline: none;
        box-shadow: none; /* إزالة التأثير الأزرق */
    }

        h2.section-title {
            text-align: center !important;
            color: #aa9166 !important;
            font-weight: bold !important;
        }

        .table th, .table td {
            color: #aa9166 !important;
        }
        .btn-gold {
        background-color: #aa9166;
        color: #1c1f23;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-gold:hover {
        background-color: #7d684a;
        color: #fff;
    }
    .info-grid {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px; 
    margin-top: 20px; 
}

.info-item {
    flex: 1;
    text-align: center; 
    border-left: 2px solid #aa9166; 
    padding-left: 15px; 
}

.info-item:first-child {
    border-left: none; 
}

</style>

    </style>
</head>
<body>
    @include('layouts.User-Header')
    <div class="container">
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
        <div class="btn-group">
            <button class="btn btn-primary" id="profile-button">
                <i class="far fa-user"></i> Profile
            </button>
            <button class="btn btn-primary" id="appointments-button">
                <i class="far fa-calendar-alt"></i> Booked Appointments
            </button>
            <button class="btn btn-primary" id="consultations-button">
                <i class="far fa-comments"></i> Consultations
            </button>
        </div>

        <!-- Profilev Section-->
        <div id="profile-section" class="content-section active">
            <div class="profile-card">
                <div class="header-banner"></div>
                <div class="profile-content">
                    <div class="profile-picture">
                        <img src="{{ $user->profile_picture ? asset($user->profile_picture) : asset('default-profile-picture.jpg') }}" alt="Profile Picture">
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
                                <div class="info-value">{{ \Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d') }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="actions">
                        @if(auth()->id() === $user->id)
                            <a href="{{ route('user.profile.edit') }}" class="btn">
                                <i class="fas fa-edit"></i> Edit Profile
                            </a>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
                  <!-- appointments section-->
       <div id="appointments-section" class="content-section">
            <h2 class="section-title">Booked Appointments</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lawyer</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->lawyer->full_name }}</td> 
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
                  <!-- consultations section-->
        <div id="consultations-section" class="content-section">
            <h2 class="section-title">Consultations</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultations as $consultation)
                    <tr>
                        <td>{{ $consultation->id }}</td>
                        <td>{{ $consultation->category->name }}</td>
                        <td>{{ $consultation->title }}</td>
                        <td>{{ $consultation->content }}</td>
                        <td>
                            <a href="{{ route('user.consultations.show', $consultation->id) }}" class="btn btn-gold">
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
    <script>
        // تبديل الأقسام
        document.getElementById('profile-button').addEventListener('click', function () {
            switchSection('profile-section');
        });

        document.getElementById('appointments-button').addEventListener('click', function () {
            switchSection('appointments-section');
        });

        document.getElementById('consultations-button').addEventListener('click', function () {
            switchSection('consultations-section');
        });

        function switchSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(function (section) {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
        }
        const buttons = document.querySelectorAll('.btn-group .btn');
    const sections = document.querySelectorAll('.content-section');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const sectionId = button.id.replace('-button', '-section');
            sections.forEach(section => section.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');
        });
    });
    </script>
</body>
</html>
