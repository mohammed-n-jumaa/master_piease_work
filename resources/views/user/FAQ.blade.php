<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Frequently Asked Questions</title>
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
        /* FAQ Section */
        .faq-section {
            padding: 60px 0;
            background-color: #1b1b1b;
            color: #aa9166;
            text-align: center;
        }

        .faq-section .section-header h2 {
            color: #fff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .faq-section .section-header p {
            color: #bfbfbf;
        }

        .faq-list {
            background-color: #1b1b1b;
            padding: 20px;
            border-radius: 8px;
        }

        .faq-item {
            background-color: #333;
            color: #aa9166;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .faq-item h3.question {
            font-size: 18px;
            font-weight: bold;
            color: #aa9166;
        }

        .faq-item p.answer {
            font-size: 14px;
            color: #fff;
            margin-top: 5px;
        }

        /* New Question Button */
        .btn-gold {
            background-color: #aa9166;
            color: #1b1b1b;
            padding: 10px 20px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 4px;
            margin-top: 20px;
        }

        .btn-gold:hover {
            background-color: #c29d2d;
            color: #fff;
        }
        .faq-section {
    background: linear-gradient(145deg, #1b1b1b 0%, #2a2a2a 100%);
    padding: 80px 0;
}

.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-header h2 {
    color: #aa9166;
    font-size: 2.5rem;
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
}

.section-header h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: #aa9166;
}

.section-header p {
    color: #bfbfbf;
    font-size: 1.1rem;
}

.faq-list {
    background: transparent;
}

.faq-item {
    background: rgba(51, 51, 51, 0.7);
    border: 1px solid rgba(170, 145, 102, 0.2);
    border-radius: 15px;
    padding: 25px;
    height: 100%;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.faq-item:hover {
    transform: translateY(-5px);
    background: rgba(51, 51, 51, 0.9);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.faq-item .icon {
    color: #aa9166;
    font-size: 24px;
    margin-bottom: 15px;
    display: block;
}

.faq-item h3.question {
    color: #aa9166;
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 15px;
    line-height: 1.4;
}

.faq-item p.answer {
    color: #e0e0e0;
    font-size: 1rem;
    line-height: 1.6;
    margin: 0;
}

.faq-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 0;
    background: #aa9166;
    transition: height 0.3s ease;
}

.faq-item:hover::before {
    height: 100%;
}

@media (max-width: 768px) {
    .section-header h2 {
        font-size: 2rem;
    }
    
    .faq-item {
        margin-bottom: 20px;
    }
}
    </style>
</head>
<body>

    <!-- Include Navbar -->
    @include('layouts.User-Header')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>FAQ</h2>
                </div>
                <div class="col-12">
                    <a href="{{ route('user.home') }}">Home</a> / <a href="{{ route('user.faq') }}">FAQ</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

   <!-- FAQ Section Start -->
<div class="faq-section">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions </p>
        </div>
        
        <!-- FAQ List -->
        <div class="faq-list">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-user-plus"></i></span>
                        <h3 class="question">How do I create an account?</h3>
                        <p class="answer">Click on the "Sign Up" button on the top-right corner and fill in the required details.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                        <h3 class="question">What are the subscription options?</h3>
                        <p class="answer">You can subscribe for 3 months, 6 months, or 1 year.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-ban"></i></span>
                        <h3 class="question">Can I cancel my subscription?</h3>
                        <p class="answer">Yes, you can cancel your subscription at any time, but no refunds are provided.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-comments"></i></span>
                        <h3 class="question">How do lawyers respond to questions?</h3>
                        <p class="answer">Lawyers can respond through the comments section of each consultation.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-coins"></i></span>
                        <h3 class="question">Are consultations free?</h3>
                        <p class="answer">The first consultation is free; subsequent ones may require payment.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-key"></i></span>
                        <h3 class="question">How do I reset my password?</h3>
                        <p class="answer">Click on "Forgot Password" and follow the instructions.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-user-secret"></i></span>
                        <h3 class="question">Can I post anonymous consultations?</h3>
                        <p class="answer">Yes, anonymous consultations are supported for privacy.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-headset"></i></span>
                        <h3 class="question">How do I contact support?</h3>
                        <p class="answer">You can contact support via the <a href="{{ route('user.contact') }}" style="color: #aa9166; text-decoration: underline; text-decoration-color: #aa9166;">Contact Us</a> page.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-shield-alt"></i></span>
                        <h3 class="question">Is my data secure?</h3>
                        <p class="answer">Yes, we use encryption to secure all user data.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-edit"></i></span>
                        <h3 class="question">Can I edit my posted consultation?</h3>
                        <p class="answer">Yes, you can edit your consultation </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                        <h3 class="question">How do lawyers register?</h3>
                        <p class="answer">Lawyers can register by subscribing to a plan and completing the registration form.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <h3 class="question">Can I rate a lawyer's response?</h3>
                        <p class="answer">Yes, you can rate responses to improve service quality.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-credit-card"></i></span>
                        <h3 class="question">What payment methods are accepted?</h3>
                        <p class="answer">We accept credit cards, PayPal, and bank transfers.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-eye"></i></span>
                        <h3 class="question">Can I view consultations posted by others?</h3>
                        <p class="answer">Yes, consultations can be viewed by all users.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="faq-item">
                        <span class="icon"><i class="fas fa-user-tie"></i></span>
                        <h3 class="question">How do I subscribe as a lawyer?</h3>
                        <p class="answer">Choose a plan, complete the payment, and register your profile.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ Section End -->


    <!-- Include Footer -->
    @include('layouts.User-Footer')

</body>
</html>
