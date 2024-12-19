<!DOCTYPE html>
<html lang="ar">

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

<style>
    i.fa {
    font-size: 24px;
    color: #000; /* تأكد من أن الأيقونات مرئية بلون مناسب */
}
.btn-gold {
        background-color: #d4af37;
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
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
    }

    .modal-content {
        background-color: #333;
        color: #d4af37;
        padding: 20px;
        margin: 10% auto;
        width: 50%;
        border-radius: 5px;
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
        color: #d4af37;
    }

    .modal-content .btn {
        width: 100%;
        padding: 10px;
    }

    .close {
        color: #d4af37;
        float: right;
        font-size: 28px;
        cursor: pointer;
    }

    .close:hover {
        color: #fff;
    }
    </style>
</head>

<body>
    <div class="wrapper">

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
            <img src="{{ asset('user/img/carousel-1.jpg') }}" class="d-block w-100" alt="Carousel Image">
            <div class="carousel-caption d-flex justify-content-center align-items-center" style="z-index: 10;">
                <div class="text-center" style="position: relative;">
                    <h1 class="animated fadeInLeft">Empowering Your Legal Rights</h1>
                    <p class="animated fadeInRight">We provide free and professional legal consultations across all fields of law.</p>
                    <a class="btn btn-primary animated fadeInUp" href="{{ route('consultations.create') }}" 
                       style="z-index: 11; position: relative; display: inline-block;"
                       onmouseover="this.style.backgroundColor='#a99065'" 
                       onmouseout="this.style.backgroundColor='#121518'">
                        Get Your Free Consultation
                    </a>
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
                    <a class="btn btn-primary animated fadeInUp" href="{{ route('consultations.create') }}" 
                       style="z-index: 11; position: relative; display: inline-block;"
                       onmouseover="this.style.backgroundColor='#a99065'" 
                       onmouseout="this.style.backgroundColor='#121518'">
                        Start Your Consultation
                    </a>
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
                    <a class="btn btn-primary animated fadeInUp" href="{{ route('consultations.create') }}" 
                       style="z-index: 11; position: relative; display: inline-block;"
                       onmouseover="this.style.backgroundColor='#a99065'" 
                       onmouseout="this.style.backgroundColor='#121518'">
                        Connect with a Lawyer
                    </a>
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
                            <a class="btn" href="{{ route('about') }}">Learn More</a>
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
                        <!-- عرض أيقونة مناسبة أو افتراضية حسب اسم التصنيف -->
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
                    <!-- اسم التصنيف -->
                    <h3>{{ $category->name }}</h3>
                    <!-- وصف التصنيف -->
                    <p>{{ $category->description ?? 'Explore this category for more details.' }}</p>
                    <!-- زر يوجه إلى صفحة إضافة الاستشارة مع تمرير category_id -->
                    <a class="btn" href="{{ route('consultations.create', ['category_id' => $category->id]) }}">Add Consultation</a>
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
                        @foreach($faqs as $faq)
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{ $faq->id }}" aria-expanded="true">
                                        <span>{{ $loop->iteration }}</span> {{ $faq->question }}
                                    </a>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="btn" href="{{ route('faq') }}">Ask More Questions</a>
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
                            <!-- Image -->
                            <div class="col-3">
                                <img src="{{ asset('user/img/testimonial-' . $testimonial->id . '.jpg') }}" alt="Client Image">
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
            <div class="text-center mt-4">
                <button class="btn btn-gold" onclick="openReviewModal()">Add Your Review</button>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    
    <!-- Modal for Adding Testimonial -->
    <div id="reviewModal" class="modal" style="display: none;">
        <div class="modal-content">
            <!-- Close Button -->
            <span class="close" onclick="closeReviewModal()">&times;</span>
            <h2>Add Your Review</h2>
    
            <!-- Form for Submitting Review -->
            <form method="POST" action="{{ route('testimonials.store') }}">
                @csrf
                <!-- Name -->
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" maxlength="40" required>
    
                <!-- Profession -->
                <label for="profession">Profession</label>
                <input type="text" id="profession" name="profession" placeholder="Your Profession" maxlength="40" required>
    
                <!-- Message -->
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write your review..." maxlength="200" required></textarea>
    
                <!-- Submit Button -->
                <button type="submit" class="btn btn-gold">Submit Review</button>
            </form>
        </div>
    </div>
    
    <!-- Testimonial End -->


    <!-- Footer Start -->
    @include('layouts.User-Footer')
    <!-- Footer End -->


    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
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
<!-- Count Up Script -->
<script>
   
    function startCounting(element, targetNumber, duration) {
        let count = 0; 
        let step = targetNumber / (duration /5); 
    
        let interval = setInterval(function() {
            count += step;
            if (count >= targetNumber) { 
                count = targetNumber;
                clearInterval(interval);
            }
            element.innerText = Math.floor(count); 
        }, 10);
    }
    
    function updateCounters() {

        fetch('/get-updated-counts')
            .then(response => response.json())
            .then(data => {
                startCounting(document.querySelector(".consultations-count"), data.consultationsCount, 1000);
                startCounting(document.querySelector(".clients-count"), data.clientsCount, 1000);
                startCounting(document.querySelector(".comments-count"), data.commentsCount, 1000);
                startCounting(document.querySelector(".lawyers-count"), data.lawyersCount, 1000);
            })
            .catch(error => console.error('Error:', error));
    }

    setInterval(updateCounters, 10000); 
    
    window.onload = function() {
        updateCounters();
    }
</script>
<script>
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
