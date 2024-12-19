<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Profile</title>

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

    <style>
        body {
            background: url('{{ asset('img/background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .navbar, .footer {
            background-color: #111;
        }

        .navbar .navbar-brand, .navbar .nav-link {
            color: #d4af37 !important;
        }

        .footer {
            padding: 20px 0;
            color: #bfbfbf;
            text-align: center;
        }

        .profile-container {
            max-width: 1000px;
            margin: 50px auto;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #d4af37;
            margin-bottom: 20px;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info h2 {
            font-size: 28px;
            color: #d4af37;
            margin: 0;
        }

        .reviews-section h3 {
            color: #d4af37;
            border-bottom: 1px solid #d4af37;
            padding-bottom: 10px;
            margin-bottom: 15px;
            text-align: center;
        }

        .review {
            background-color: #333;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            color: #bfbfbf;
        }

        .review img {
            display: block;
            margin: 0 auto;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .review strong {
            color: #d4af37;
            font-size: 18px;
        }

        .owl-dots .owl-dot span {
            background-color: #d4af37;
        }

        .owl-dots .owl-dot.active span {
            background-color: #a18f66;
        }

        /* Popup Style */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .popup-content h3 {
            color: #d4af37;
        }

        .popup-content .form-control {
            background-color: #555;
            border: none;
            color: #fff;
            margin-bottom: 10px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            color: #fff;
            cursor: pointer;
        }

        .btn-gold {
            background-color: #d4af37;
            color: #1b1b1b;
            font-weight: bold;
            width: 100%;
            border: none;
            cursor: pointer;
        }

        .btn-gold:hover {
            background-color: #c29d2d;
            color: #fff;
        }

        .appointment-section h3 {
            color: #d4af37;
            border-bottom: 1px solid #d4af37;
            padding-bottom: 10px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Header -->
@include('layouts.User-Header')

<div class="container profile-container">
    <!-- Header Profile Section -->
    <div class="profile-header">
        <img src="{{ asset('img/prof.jpg') }}" alt="Lawyer's photo">
        <div class="profile-info">
            <h2>{{ $lawyerName ?? 'Lawyer Name' }}</h2>
            <p>Specialization: {{ $specialization ?? 'Criminal Law' }}</p>
            <p>Experience: {{ $experience ?? '15 Years' }}</p>
            <p>Email: {{ $email ?? 'mohammed.alqadome@gmail.com' }}</p>
            <p>Phone: {{ $phone ?? '0787665773' }}</p>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="reviews-section">
        <h3>Client Reviews</h3>
        <div class="owl-carousel owl-theme">
            @foreach($reviews as $review)
                <div class="review">
                    <img src="{{ asset('img/testimonial-1.jpg') }}" alt="{{ $review->client_name }}" class="img-fluid rounded-circle mb-2" style="width: 60px;">
                    <strong>{{ $review->client_name }}</strong>
                    <p>{{ $review->content }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Appointment Booking Section -->
    <div class="appointment-section">
        <h3>Book an Appointment</h3>
        <button class="btn btn-gold" onclick="showPopup()">Book Appointment</button>
    </div>
</div>

<!-- Appointment Popup -->
<div class="popup-overlay" id="appointmentPopup">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <h3>Book an Appointment</h3>
        <form action="{{ route('appointments.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="appointment-date">Choose Date</label>
                <input type="date" class="form-control" id="appointment-date" name="appointment_date" required>
            </div>
            <div class="form-group">
                <label for="appointment-time">Choose Time</label>
                <input type="time" class="form-control" id="appointment-time" name="appointment_time" required>
            </div>
            <div class="form-group">
                <label for="appointment-reason">Reason for Appointment</label>
                <textarea class="form-control" id="appointment-reason" name="appointment_reason" rows="3" placeholder="Describe your reason..." required></textarea>
            </div>
            <button type="submit" class="btn btn-gold">Confirm Appointment</button>
        </form>
    </div>
</div>

<!-- Footer -->
@include('layouts.User-Footer')

<!-- JavaScript for Popup -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:true,
            items:3,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 }
            }
        });
    });

    function showPopup() {
        document.getElementById("appointmentPopup").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("appointmentPopup").style.display = "none";
    }
</script>

</body>
</html>
