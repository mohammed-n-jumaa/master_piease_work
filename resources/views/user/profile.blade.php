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
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
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
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Profile Card Styles */
.profile-card {
    border-radius: 15px;
    overflow: hidden;
    margin: 20px 0;
}

.header-banner {
    height: 150px;
}

.profile-content {
    padding: 30px;
    position: relative;
}

/* Profile Picture Styles */
.profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 5px solid #fff;
    overflow: hidden;
    margin: -75px auto 20px;
}

.profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Profile Info Styles */
.profile-info {
    text-align: center;
    margin-bottom: 30px;
}

.profile-name {
    font-size: 2em;
    margin-bottom: 20px;
}

.info-grid {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    max-width: 800px;
    margin: 0 auto;
}

.info-item {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 15px;
    border-radius: 10px;
}

.info-label {
    font-weight: bold;
    margin-bottom: 8px;
}

.info-value {
    font-size: 1.1em;
}

/* Button Styles */
.btn-group {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
}

.btn {
    padding: 12px 24px;
    border-radius: 25px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

/* Table Styles */
.table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    border-radius: 10px;
    overflow: hidden;
}

.table th,
.table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/* Alert Styles */
.custom-alert {
    padding: 15px;
    border-radius: 8px;
    margin: 15px 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Responsive Styles */
@media (max-width: 991px) {
    .container {
        padding: 15px;
    }
    
    .info-grid {
        flex-direction: column;
        gap: 15px;
    }
    
    .info-item {
        width: 100%;
    }
    
    .btn-group {
        flex-direction: column;
        width: 100%;
    }
    
    .btn {
        width: 100%;
    }
}

@media (max-width: 768px) {
    .profile-picture {
        width: 120px;
        height: 120px;
        margin: -60px auto 15px;
    }
    
    .profile-name {
        font-size: 1.5em;
    }
    
    .table {
        display: block;
        overflow-x: auto;
    }
    
    .table thead th {
        min-width: 120px;
    }
    
    .header-banner {
        height: 120px;
    }
}

@media (max-width: 480px) {
    .profile-picture {
        width: 100px;
        height: 100px;
        margin: -50px auto 15px;
    }
    
    .info-value {
        font-size: 0.9em;
    }
    
    .table td,
    .table th {
        padding: 8px;
        font-size: 0.9em;
    }
    
    .btn {
        padding: 8px 15px;
        font-size: 0.9em;
    }
    
    .custom-alert {
        padding: 10px;
        font-size: 0.9em;
    }
    
    .header-banner {
        height: 100px;
    }
}
    </style>
</head>

<body>
    @include('layouts.User-Header')
    <div class="container">
        @if (session('success'))
            <div class="custom-alert alert-success" role="alert">
                <i class="fas fa-check-circle alert-icon"></i>
                <p class="alert-message">{{ session('success') }}</p>
                <button type="button" class="alert-close" onclick="dismissAlert(this.parentElement)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="custom-alert alert-danger" role="alert">
                <i class="fas fa-exclamation-circle alert-icon"></i>
                <p class="alert-message">{{ session('error') }}</p>
                <button type="button" class="alert-close" onclick="dismissAlert(this.parentElement)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        <div class="container">
            <div class="btn-group">
                <button class="btn btn-primary" id="profile-button">
                    <i class="far fa-user"></i>
                    <span>Profile</span>
                </button>
                
                @if (auth('web')->id() === $user->id)
                    <button class="btn btn-primary" id="appointments-button">
                        <i class="far fa-calendar-alt"></i>
                        <span>Booked Appointments</span>
                    </button>
                @endif
                
                <button class="btn btn-primary" id="consultations-button">
                    <i class="far fa-comments"></i>
                    <span>Consultations</span>
                </button>
            </div>

            <!-- Profile Section-->
            <div id="profile-section" class="content-section active">
                <div class="profile-card">
                    <div class="header-banner"></div>
                    <div class="profile-content">
                        <div class="profile-picture">
                            <img src="{{ $user->profile_picture ? asset($user->profile_picture) : asset('default-profile-picture.jpg') }}"
                                alt="Profile Picture">
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

                                @if (Auth::check() && Auth::user()->id == $user->id && $user->date_of_birth)
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-calendar"></i> Date of Birth
                                        </div>
                                        <div class="info-value">
                                            {{ \Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d') }}</div>
                                    </div>
                                @endif


                            </div>
                        </div>

                        <div class="actions">
                            @if (auth()->id() === $user->id)
                                <a href="{{ route('user.profile.edit') }}" class="btn">
                                    <i class="fas fa-edit"></i> Edit Profile
                                </a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <!-- Appointments Section يظهر فقط لصاحب الصفحة -->
            @if (auth('web')->id() === $user->id)
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
                                    <a href="{{ route('user.consultations.show', $consultation->id) }}"
                                        class="btn btn-gold">
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
            <script src="{{ asset('user/js/userprof.js') }}"></script>
</body>

</html>
