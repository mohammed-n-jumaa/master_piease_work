<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Justice For All - About Us</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Justice For All - Legal Consultation and Services" name="keywords">
    <meta content="Learn about Justice For All - A trusted provider of legal consultation and services." name="description">

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
                        <h2>About Us</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('about') }}">About Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">
                            <img src="{{ asset('user/img/aboutus.jpg') }}" alt="Justice For All Office">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="section-header">
                            <h2>Learn About Us</h2>
                        </div>
                        <div class="about-text">
                            <p>
                                Justice For All is a trusted legal firm with a mission to provide high-quality legal services and consultation to individuals, families, and businesses. With years of experience across various fields, we are dedicated to protecting your rights and offering you the guidance you need.
                            </p>
                            <p>
                                Our team of experienced attorneys specializes in criminal law, family law, business law, and civil rights, ensuring you receive expert advice and representation tailored to your unique circumstances. We believe in equal access to justice and are committed to serving our community with integrity and professionalism.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Timeline Start -->
        <div class="timeline">
            <div class="container">
                <div class="section-header">
                    <h2>Our Journey</h2>
                </div>
                <div class="timeline-start">
                    <div class="timeline-container left">
                        <div class="timeline-content">
                            <h2><span>2020</span>Established Justice For All</h2>
                            <p>
                                Founded with the vision of accessible legal aid, Justice For All was established to support those in need of expert legal consultation and defense.
                            </p>
                        </div>
                    </div>
                    <div class="timeline-container right">
                        <div class="timeline-content">
                            <h2><span>2021</span>Expanded Our Team</h2>
                            <p>
                                As demand grew, we brought on additional skilled attorneys in various fields, including business law and civil rights, to broaden our service offering.
                            </p>
                        </div>
                    </div>
                    <div class="timeline-container left">
                        <div class="timeline-content">
                            <h2><span>2022</span>Launched Community Outreach Program</h2>
                            <p>
                                We launched a community program to offer free legal workshops and pro bono consultations to underserved communities.
                            </p>
                        </div>
                    </div>
                    <div class="timeline-container right">
                        <div class="timeline-content">
                            <h2><span>2023</span>Recognized for Excellence</h2>
                            <p>
                                Justice For All was honored with the "Best Community Legal Services" award, recognizing our commitment to quality and accessibility in legal aid.
                            </p>
                        </div>
                    </div>
                    <div class="timeline-container left">
                        <div class="timeline-content">
                            <h2><span>2024</span>Opened New Branches</h2>
                            <p>
                                With our growing client base, we expanded to new locations to ensure more people have access to our trusted legal services.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Timeline End -->

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
