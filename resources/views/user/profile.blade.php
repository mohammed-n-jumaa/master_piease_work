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
     /* Base styles */
body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
}

.container {
    padding: 15px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Button group responsive styles */
.btn-group {
    margin: 20px 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    padding: 0 15px;
}

.btn-group .btn {
    flex: 1;
    min-width: 150px;
    padding: 12px 20px;
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
    border: 2px solid #aa9166;
}

/* Profile card responsive styles */
.profile-card {
    background: #1c1f23;
    border-radius: 15px;
    overflow: hidden;
    margin: 20px auto;
    max-width: 100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.header-banner {
    height: 150px;
    background: linear-gradient(135deg, #aa9166 0%, #7d684a 100%);
}

.profile-content {
    padding: 20px;
    position: relative;
    text-align: center;
}

.profile-picture {
    position: relative;
    margin: -75px auto 20px;
    width: 150px;
    height: 150px;
}

.profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #aa9166;
}

.profile-name {
    color: #aa9166;
    font-size: 24px;
    margin-bottom: 20px;
}

/* Info grid responsive styles */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 20px 0;
}

.info-item {
    padding: 15px;
    border: none;
    border-bottom: 2px solid #aa9166;
    text-align: center;
}

.info-label {
    color: #aa9166;
    font-weight: bold;
    margin-bottom: 8px;
}

.info-value {
    color: #ffffff;
}

/* Table responsive styles */
.table-responsive {
    overflow-x: auto;
    margin: 20px 0;
}

.table {
    width: 100%;
    min-width: 600px;
}

.table th, 
.table td {
    color: #aa9166;
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid rgba(170, 145, 102, 0.2);
}

.table thead th {
    background-color: rgba(170, 145, 102, 0.1);
    font-weight: bold;
}

.btn-gold {
    background-color: #aa9166;
    color: #1c1f23;
    padding: 6px 12px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
    display: inline-block;
}

.btn-gold:hover {
    background-color: #7d684a;
    color: #fff;
}

/* Alert styles */
.alert {
    margin: 20px 0;
    padding: 12px 20px;
    border-radius: 8px;
}

/* Responsive breakpoints */
@media (max-width: 991px) {
    .btn-group {
        flex-direction: column;
    }

    .btn-group .btn {
        width: 100%;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }

    .info-item {
        border-left: none;
        border-bottom: 1px solid #aa9166;
    }
}

@media (max-width: 768px) {
    .profile-picture {
        width: 120px;
        height: 120px;
        margin: -60px auto 15px;
    }

    .profile-name {
        font-size: 20px;
    }

    .header-banner {
        height: 120px;
    }

    .table {
        font-size: 14px;
    }
}

@media (max-width: 576px) {
    .container {
        padding: 10px;
    }

    .profile-content {
        padding: 15px;
    }

    .btn-group .btn {
        font-size: 14px;
        padding: 10px 15px;
    }

    .info-label {
        font-size: 14px;
    }

    .info-value {
        font-size: 13px;
    }

    .table th,
    .table td {
        padding: 8px;
    }
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
            <!-- زر الحجز يظهر فقط إذا كان المستخدم الحالي هو صاحب الصفحة -->
            @if(auth('web')->id() === $user->id)
            <button class="btn btn-primary" id="appointments-button">
                <i class="far fa-calendar-alt"></i> Booked Appointments
            </button>
        @endif
            <button class="btn btn-primary" id="consultations-button">
                <i class="far fa-comments"></i> Consultations
            </button>
        </div>

        <!-- Profile Section-->
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
        
          <!-- Appointments Section يظهر فقط لصاحب الصفحة -->
          @if(auth('web')->id() === $user->id)
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
          @endif
        
        
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
        // Function to switch sections
        function switchSection(sectionId) {
            // Remove 'active' class from all sections
            document.querySelectorAll('.content-section').forEach(function (section) {
                section.classList.remove('active');
            });
    
            // Add 'active' class to the targeted section
            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.classList.add('active');
            }
        }
    
        // Add event listeners to buttons if they exist
        const profileButton = document.getElementById('profile-button');
        if (profileButton) {
            profileButton.addEventListener('click', function () {
                switchSection('profile-section');
            });
        }
    
        const appointmentsButton = document.getElementById('appointments-button');
        if (appointmentsButton) {
            appointmentsButton.addEventListener('click', function () {
                switchSection('appointments-section');
            });
        }
    
        const consultationsButton = document.getElementById('consultations-button');
        if (consultationsButton) {
            consultationsButton.addEventListener('click', function () {
                switchSection('consultations-section');
            });
        }
    
        // Highlight the active button and switch sections accordingly
        const buttons = document.querySelectorAll('.btn-group .btn');
        const sections = document.querySelectorAll('.content-section');
    
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove 'active' class from all buttons
                buttons.forEach(btn => btn.classList.remove('active'));
    
                // Add 'active' class to the clicked button
                button.classList.add('active');
    
                // Switch to the corresponding section
                const sectionId = button.id.replace('-button', '-section');
                sections.forEach(section => section.classList.remove('active'));
                const targetSection = document.getElementById(sectionId);
                if (targetSection) {
                    targetSection.classList.add('active');
                }
            });
        });
    </script>
    
</body>
</html>
