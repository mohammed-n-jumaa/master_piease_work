<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact-US</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Law Firm Website Template" name="keywords">
    <meta content="Law Firm Website Template" name="description">

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
       /* Form container styling */
.contact-form {
    background-color: #1b1b1b;
    padding: 25px;
    border-radius: 8px;
    border: 1px solid #aa9166;
}

/* Input fields styling */
.contact-form .form-group {
    margin-bottom: 20px;
}

.contact-form .form-control {
    background-color: #232323;
    border: 1px solid #aa9166;
    color: #ffffff;
    padding: 12px 15px;
    border-radius: 5px;
    font-size: 16px;
}

.contact-form .form-control:focus {
    background-color: #333333;
    border-color: #d4b78c;
    box-shadow: 0 0 5px rgba(170, 145, 102, 0.5);
}

/* Readonly fields styling */
.contact-form .form-control[readonly] {
    background-color: #252525;
    border-color: #887346;
    opacity: 0.8;
}

/* Textarea specific styling */
.contact-form textarea.form-control {
    min-height: 150px;
    resize: vertical;
}

/* Submit button styling */
.contact-form .btn-primary {
    background-color: #aa9166;
    border-color: #aa9166;
    color: #1b1b1b;
    padding: 12px 30px;
    font-weight: bold;
    transition: all 0.3s ease;
}

.contact-form .btn-primary:hover {
    background-color: #d4b78c;
    border-color: #d4b78c;
}

/* Form labels */
.contact-form .form-group label {
    color: #aa9166;
    margin-bottom: 8px;
    font-weight: 500;
}

/* Placeholder text */
.contact-form .form-control::placeholder {
    color: #888888;
    opacity: 0.7;
}
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Nav Bar Start -->
        @include('layouts.User-Header')
        <!-- Nav Bar End -->

        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('user.home') }}">Home</a>
                        <a href="{{ route('user.contact') }}">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header">
                    <h2>Contact Us</h2>
                </div>

                <!-- رسالة نجاح -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-info">
                            <!-- Legal Expertise Section -->
                            <div class="contact-item d-flex align-items-center">
                                <div class="icon-box">
                                    <i class="fa fa-balance-scale"></i>
                                </div>
                                <div class="contact-text">
                                    <h2>Legal Expertise</h2>
                                    <p>Criminal Law</p>
                                    <p>Family Law</p>
                                    <p>Business Law</p>
                                    <p>Civil Rights</p>
                                </div>
                            </div>
                    
                            <!-- Special Services Section -->
                            <div class="contact-item d-flex align-items-center">
                                <div class="icon-box">
                                    <i class="fa fa-handshake"></i>
                                </div>
                                <div class="contact-text">
                                    <h2>Special Services</h2>
                                    <p>Urgent Case Support</p>
                                    <p>Personalized Consultations</p>
                                    <p>Detailed Legal Reports</p>
                                </div>
                            </div>
                    
                            <!-- Client Satisfaction Section -->
                            <div class="contact-item d-flex align-items-center">
                                <div class="icon-box">
                                    <i class="fa fa-smile"></i>
                                </div>
                                <div class="contact-text">
                                    <h2>Client Satisfaction</h2>
                                    <p>95% Client Satisfaction</p>
                                    <p>Over 100 Cases Solved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <form action="{{ route('user.notifications.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    @if(Auth::guard('lawyer')->check())
                                        <input type="text" class="form-control" name="name" 
                                               value="{{ Auth::guard('lawyer')->user()->first_name . ' ' . Auth::guard('lawyer')->user()->last_name }}" readonly />
                                    @else
                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name ?? '' }}" readonly />
                                    @endif
                                </div>
                                <div class="form-group">
                                    @if(Auth::guard('lawyer')->check())
                                        <input type="email" class="form-control" name="email" value="{{ Auth::guard('lawyer')->user()->email }}" readonly />
                                    @else
                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email ?? '' }}" readonly />
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" name="subject" required />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message" name="message" required></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- Footer Start -->
        @include('layouts.User-Footer')
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
