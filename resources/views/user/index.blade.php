<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>مستشارك</title>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<style>
    i.fa {
    font-size: 24px;
    color: #000; /* تأكد من أن الأيقونات مرئية بلون مناسب */
}
.btn-gold {
        background-color: #aa9166;
        color: #1b1b1b;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 4px;
    }

    .btn-gold:hover {
        background-color: #c29d2d;
        color: #fff;
    }

    .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: flex-start; /* لضبط المحاذاة إلى الأعلى */
    padding-top: 100px; /* المسافة من الأعلى */
}


.modal-content {
    background-color: #333;
    color: #aa9166;
    padding: 20px;
    width: 90%; /* عرض مناسب للشاشات الصغيرة */
    max-width: 500px; /* أقصى عرض للمودال */
    border-radius: 10px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
}

    .modal-content label {
        color: #fff;
        margin-top: 10px;
        display: block;
    }

    .modal-content input,
    .modal-content textarea {
        width: 100%;
        padding: 8px;
        margin: 5px 0 15px;
        border: 1px solid #555;
        background-color: #222;
        color: #aa9166;
    }

    .modal-content .btn {
        width: 100%;
        padding: 10px;
    }

    .close {
        color: #aa9166;
        float: right;
        font-size: 28px;
        cursor: pointer;
    }

    .close:hover {
        color: #fff;
    }
    /* خلفية قسم "Feature" */
.feature {
    background-color: #ffffff;
}

/* خلفية قسم "FAQs" */
.faqs {
    background-color: #ffffff;
}

/* خلفية قسم "Testimonial" */
.testimonial-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 350px;  /* يمكنك ضبط الارتفاع حسب الحجم المطلوب */
    padding: 20px;
    background: #f4f4f4;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.testimonial-item img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px;
}

.testimonial-item h2 {
    font-size: 18px;
    margin-bottom: 5px;
}

.testimonial-item p {
    font-size: 14px;
    color: #666;
}

.testimonial-item .col-12 {
    margin-top: auto;
}


.modal-content {
    max-width: 500px;
    margin: auto;
    padding: 20px;
    background: #1a1a1a;
    border: 1px solid #aa8f61;
    border-radius: 10px;
}

.modal-content label {
    color: #aa8f61;
    margin-bottom: 5px;
    display: block;
}

.modal-content input[type="text"],
.modal-content textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    background: rgba(255,255,255,0.05);
    border: 1px solid #aa8f61;
    border-radius: 5px;
    color: white;
}

.btn-gold {
    background-color: #aa8f61;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-gold:hover {
    background-color: #917649;
}

.close {
    color: #aa8f61;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #917649;
}
    </style>
</head>

<body>
    <div class="wrapper">
        @if (session('success'))
        <div class="custom-alert alert-success" role="alert">
            <i class="fas fa-check-circle alert-icon"></i>
            <p class="alert-message">{{ session('success') }}</p>
            <button type="button" class="alert-close" onclick="dismissAlert(this.parentElement)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
    
    @if(session('error'))
        <div class="custom-alert alert-danger" role="alert">
            <i class="fas fa-exclamation-circle alert-icon"></i>
            <p class="alert-message">{{ session('error') }}</p>
            <button type="button" class="alert-close" onclick="dismissAlert(this.parentElement)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
        <!-- Nav Bar Start -->
        @include('layouts.User-Header')
        <!-- Nav Bar End -->
<!-- Carousel Start -->
<div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="{{ asset('user/img/carousel-1.webp') }}" class="d-block w-100" alt="Carousel Image">
            <div class="carousel-caption d-flex justify-content-center align-items-center" style="z-index: 10;">
                <div class="text-center" style="position: relative;">
                    <h1 class="animated fadeInLeft">Empowering Your Legal Rights</h1>
                    <p class="animated fadeInRight">We provide free and professional legal consultations across all fields of law.</p>
                    @auth('lawyer')
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('user.consultations.index') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Provide Your Consultation to Users
                        </a>
                    @endauth
                    @auth('web')
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('user.consultations.create') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Get Your Free Consultation
                        </a>
                    @endauth
                    @guest
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('user.lawyer.login.form') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Login to Get Started
                        </a>
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('register.user') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Register Now
                        </a>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="{{ asset('user/img/carousel-2.jpg') }}" class="d-block w-100" alt="Carousel Image">
            <div class="carousel-caption d-flex justify-content-center align-items-center" style="z-index: 10;">
                <div class="text-center" style="position: relative;">
                    <h1 class="animated fadeInLeft">Expert Advice, Anytime, Anywhere</h1>
                    <p class="animated fadeInRight">Our platform connects you with top lawyers for reliable legal guidance.</p>
                    @auth('lawyer')
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('lawyer.profile') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Add Your Available Appointments
                        </a>
                    @endauth
                    @auth('web')
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('user.consultations.create') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Start Your Consultation
                        </a>
                    @endauth
                    @guest
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('user.lawyer.login.form') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Login to Access
                        </a>
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('register.user') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Register Now
                        </a>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="{{ asset('user/img/carousel-3.jpg') }}" class="d-block w-100" alt="Carousel Image">
            <div class="carousel-caption d-flex justify-content-center align-items-center" style="z-index: 10;">
                <div class="text-center" style="position: relative;">
                    <h1 class="animated fadeInLeft">Your Trusted Legal Companion</h1>
                    <p class="animated fadeInRight">Access our network of experienced attorneys to protect your rights.</p>
                    @auth('lawyer')
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('user.legal-library') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Search the Jordanian Constitution
                        </a>
                    @endauth
                    @auth('web')
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('user.consultations.create') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Connect with a Lawyer
                        </a>
                    @endauth
                    @guest
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('user.lawyer.login.form') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Login to Explore More
                        </a>
                        <a class="btn btn-primary animated fadeInUp" href="{{ route('register.user') }}"
                           style="z-index: 11; position: relative; display: inline-block;"
                           onmouseover="this.style.backgroundColor='#a99065'" 
                           onmouseout="this.style.backgroundColor='#121518'">
                            Join Us Now
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Previous Button -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <!-- Next Button -->
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Carousel End -->




   <!-- Statistics Section Start -->
   <div class="statistics-section">
    <div class="container">
        <!-- Total Consultations -->
        <div class="stat-item">
            <div class="stat-icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <h3>
                <span class="counter consultations-count">0</span>
            </h3>
            <p>Total Consultations</p>
        </div>

        <!-- Total Clients -->
        <div class="stat-item">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <h3><span class="clients-count">0</span></h3>
            <p>Total Clients</p>
        </div>

        <!-- Total Comments on Consultations -->
        <div class="stat-item">
            <div class="stat-icon">
                <i class="fas fa-balance-scale"></i>
            </div>
            <h3><span class="comments-count">0</span></h3>
            <p>Total Comments on Consultations</p>
        </div>

        <!-- Total Lawyers -->
        <div class="stat-item">
            <div class="stat-icon">
                <i class="fas fa-gavel"></i>
            </div>
            <h3><span class="lawyers-count">0</span></h3>
            <p>Total Lawyers</p>
        </div>
    </div>
</div>
<!-- Statistics Section End -->

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">
                            <img src="{{ asset('user/img/about1.jpg') }}" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="section-header">
                            <h2>Learn About Us</h2>
                        </div>
                        <div class="about-text">
                            <p>
                                This platform is a free legal consultation service across various legal specialties,
                                featuring some of the strongest and most skilled attorneys. Anyone can easily obtain a
                                free legal consultation at any time.
                            </p>
                            <p>
                                Additionally, the platform allows attorneys to register and join as experts, offering
                                their consultations and sharing their expertise with others.
                            </p>
                            <a class="btn" href="{{ route('user.about') }}">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


  <!-- Service Start -->
<div class="service">
    <div class="container">
        <div class="section-header">
            <h2>Our Practice Areas</h2>
        </div>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        @php
                            $icons = [
                                'Civil Law' => 'fa fa-briefcase',
                                'Family Law' => 'fa fa-users',
                                'Business Law' => 'fa fa-chart-line',
                                'State Security Cases' => 'fa fa-shield-alt',
                                'Criminal Law' => 'fa fa-gavel',
                                'Cyber Law' => 'fa fa-laptop-code',
                            ];
                            $defaultIcon = 'fa fa-folder';
                        @endphp
                        <i class="{{ $icons[$category->name] ?? $defaultIcon }}"></i>
                    </div>
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->description ?? 'Explore this category for more details.' }}</p>
                    
                    @auth('lawyer') <!-- تحقق إذا كان المستخدم محامياً -->
                        <a class="btn" href="{{ route('user.consultations.index') }}">Answer the consultations</a>
                    @elseauth('web') <!-- تحقق إذا كان المستخدم مسجلاً كـ User -->
                        <a class="btn" href="{{ route('user.consultations.create', ['category_id' => $category->id]) }}">Add Consultation</a>
                    @endauth
                    @guest
                        <a class="btn" href="{{ route('user.lawyer.login.form') }}">Login to Access</a>
                    @endguest
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->

    </div>
    <!-- Feature Start -->
    <div class="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="section-header">
                        <h2>Why Choose Us</h2>
                    </div>
                    <div class="row align-items-center feature-item">
                        <div class="col-5">
                            <div class="feature-icon">
                                <i class="fa fa-gavel"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <h3>Experienced Legal Professionals</h3>
                            <p>
                                Our platform connects you with highly experienced and qualified lawyers across various fields of law. Whether you need civil, criminal, family, or business law advice, we have the expertise to guide you.
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center feature-item">
                        <div class="col-5">
                            <div class="feature-icon">
                                <i class="fa fa-balance-scale"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <h3>Trust and Confidentiality</h3>
                            <p>
                                We prioritize trust and confidentiality in all consultations. Your information and inquiries are handled with utmost discretion and privacy to ensure a safe legal experience.
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center feature-item">
                        <div class="col-5">
                            <div class="feature-icon">
                                <i class="far fa-smile"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <h3>Accessible and Affordable</h3>
                            <p>
                                Our platform provides free legal consultations, making high-quality legal advice accessible to everyone. Whether you have a simple question or need detailed guidance, you can connect with legal professionals at no cost.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="feature-img">
                        <img src="{{ asset('user/img/Justice.jpg') }}" alt="Feature">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- FAQs Start -->
<div class="faqs">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="faqs-img">
                    <img src="{{ asset('user/img/faqs.jpg') }}" alt="Image">
                </div>
            </div>
            <div class="col-md-7">
                <div class="section-header">
                    <h2>Have a Question?</h2>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse1" aria-expanded="true">
                                <span>1</span> How can I register as a lawyer on the platform?
                            </a>
                        </div>
                        <div id="collapse1" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Lawyers can register by subscribing to one of our plans (3 months, 6 months, or 1 year). Visit the registration page, fill in your details, and complete the payment process.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse2">
                                <span>2</span> What subscription plans are available for lawyers?
                            </a>
                        </div>
                        <div id="collapse2" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Lawyers can choose from three subscription plans: 3 months, 6 months, or 1 year. Each plan offers full access to user consultations and platform features.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse3">
                                <span>3</span> How can users post their legal consultations?
                            </a>
                        </div>
                        <div id="collapse3" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Users can post their consultations by creating an account, navigating to the “Post Consultation” section, and submitting their query along with any supporting details.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse4">
                                <span>4</span> How do lawyers respond to consultations?
                            </a>
                        </div>
                        <div id="collapse4" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Registered lawyers can view consultations posted by users and provide their legal advice directly through the comment section associated with each consultation.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse5">
                                <span>5</span> Can I renew my subscription plan as a lawyer?
                            </a>
                        </div>
                        <div id="collapse5" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Yes, you can renew your subscription plan before it expires by visiting the subscription section in your account and choosing a renewal plan.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse6">
                                <span>6</span> Is there a limit to how many consultations a lawyer can answer?
                            </a>
                        </div>
                        <div id="collapse6" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                No, there is no limit. Registered lawyers can respond to as many consultations as they wish within their subscription period.
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn" href="{{ route('user.faq') }}">See More Questions</a>
            </div>
        </div>
    </div>
</div>
<!-- FAQs End -->

 <!-- Testimonial Start -->
<div class="testimonial">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2>Client Reviews</h2>
        </div>
        
      <!-- Testimonials Carousel -->
<div class="owl-carousel testimonials-carousel">
    @foreach($testimonials as $testimonial)
        <div class="testimonial-item">
            <i class="fa fa-quote-right"></i>
            <div class="row align-items-center">
                <!-- Image with proper source based on user type -->
                <div class="col-3">
                    @php
                        $imagePath = null;
                        $name = $testimonial->name;
                        
                        if ($testimonial->user_type == 'lawyer' && $testimonial->lawyer && $testimonial->lawyer->profile_picture) {
                            $imagePath = 'lawyer_profiles/' . $testimonial->lawyer->profile_picture;
                        } elseif ($testimonial->user_type == 'user' && $testimonial->user && $testimonial->user->profile_picture) {
                            $imagePath = 'user_profiles/' . $testimonial->user->profile_picture;
                        }
                        
                        $defaultImage = 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=aa9166&color=fff';
                        $displayName = $testimonial->user_type == 'user' ? 'User' : 'Lawyer';
                    @endphp
                    
                    <img src="{{ $imagePath && file_exists(public_path($imagePath)) ? asset($imagePath) : $defaultImage }}"
                         alt="{{ $displayName }} - {{ $name }}"
                         class="rounded-circle"
                         width="80"
                         height="80"
                         style="border: 2px solid #aa8f61; object-fit: cover;"
                         onerror="this.src='{{ $defaultImage }}'">
                </div>

                <!-- Name and Profession -->
                <div class="col-9">
                    <h2>{{ $testimonial->name }}</h2>
                    <p>{{ $testimonial->profession }}</p>
                </div>
                <!-- Message -->
                <div class="col-12">
                    <p>{{ $testimonial->message }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Add Review Button -->
@if(Auth::guard('web')->check() || Auth::guard('lawyer')->check())
    <div class="text-center mt-4">
        <button class="btn btn-gold" onclick="openReviewModal()">Add Your Review</button>
    </div>
@else
    <p class="text-center mt-4">Login to add your review!</p>
    <div class="text-center">
        <a href="{{ route('user.lawyer.login.form') }}" 
        style="background-color: #aa9166; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block; font-size: 16px; font-weight: bold; border: none; transition: background-color 0.3s, transform 0.2s;" 
        onmouseover="this.style.backgroundColor='#967c59'; this.style.transform='scale(1.05)';" 
        onmouseout="this.style.backgroundColor='#aa9166'; this.style.transform='scale(1)';" 
        onmousedown="this.style.backgroundColor='#7e694e'; this.style.transform='scale(0.98)';" 
        onmouseup="this.style.backgroundColor='#967c59'; this.style.transform='scale(1.05)';">
        Login Now
     </a>
         </div>
@endif

<!-- Modal for Adding Testimonial -->
@if(Auth::guard('web')->check() || Auth::guard('lawyer')->check())
<div id="reviewModal" class="modal" style="display: none;">
    <div class="modal-content">
        <!-- Close Button -->
        <span class="close" onclick="closeReviewModal()">&times;</span>
        <h2>Add Your Review</h2>
        
        <!-- Form for Submitting Review -->
        <form method="POST" action="{{ route('user.testimonials.store') }}">
            @csrf
            <!-- Name -->
            <label for="name">Name</label>
            <input type="text" id="name" name="name"
                   value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->name : (Auth::guard('lawyer')->check() ? Auth::guard('lawyer')->user()->full_name : '') }}"
                   readonly>
            
            <!-- Profession -->
            <label for="profession">Profession</label>
            <input type="text" id="profession" name="profession"
                   value="{{ Auth::guard('web')->check() ? 'User' : 'Lawyer' }}"
                   readonly>
            
            <!-- Message -->
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write your review..." maxlength="200" required></textarea>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-gold">Submit Review</button>
        </form>
    </div>
</div>
@endif

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</div>
    @include('layouts.User-Footer')
    
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script>
<!-- Count Up Script -->
<script>
   
   function startCounting(element, targetNumber, duration) {
    let count = 0; 
    const step = targetNumber / (duration / 20); // تقليل الخطوة لجعل العد أبطأ

    const interval = setInterval(function() {
        count += step;
        if (count >= targetNumber) { 
            count = targetNumber; // ضمان الوصول إلى الرقم النهائي
            clearInterval(interval); // إيقاف العد عند الاكتمال
        }
        element.innerText = Math.floor(count); // تحديث الرقم في العنصر
    }, 50); // تحديث الرقم كل 50 مللي ثانية لجعل العد أبطأ
}

function updateCounters() {
    fetch('/get-updated-counts')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Data fetched:', data); // عرض القيم في الكونسول
            startCounting(document.querySelector(".consultations-count"), data.consultationsCount, 2000); // مدة أطول (2 ثانية)
            startCounting(document.querySelector(".clients-count"), data.clientsCount, 2000);
            startCounting(document.querySelector(".comments-count"), data.commentsCount, 2000);
            startCounting(document.querySelector(".lawyers-count"), data.lawyersCount, 2000);
        })
        .catch(error => console.error('Error fetching counts:', error));
}

setInterval(updateCounters, 10000); // تحديث كل 10 ثوانٍ

window.onload = function() {
    updateCounters();
}

  // Function to Open Modal
    function openReviewModal() {
        document.getElementById('reviewModal').style.display = 'block';
    }

    // Function to Close Modal
    function closeReviewModal() {
        document.getElementById('reviewModal').style.display = 'none';
    }
</script>


</body>
</html>
