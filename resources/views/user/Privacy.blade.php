<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
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
        .page-header {
            background-color: #1b1b1b;
            padding: 50px 0;
            color: #d4af37;
            text-align: center;
        }

        .page-header h2 {
            font-size: 36px;
            color: #fff;
            font-weight: bold;
        }

        .page-header a {
            color: #d4af37;
            text-decoration: none;
        }

        .policy-content {
            padding: 40px;
            background-color: #1b1b1b;
            color: #d4af37;
            border: 1px solid #333;
            border-radius: 8px;
            margin-top: 20px;
        }

        .policy-content h3 {
            font-size: 24px;
            color: #d4af37;
            margin-bottom: 10px;
        }

        .policy-content p, .policy-content ul {
            font-size: 16px;
            color: #fff;
            line-height: 1.8;
        }

        .policy-content ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        .policy-content ul li {
            margin-bottom: 5px;
        }

        .policy-content a {
            color: #d4af37;
            text-decoration: underline;
        }

        .policy-content a:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.User-Header')
    
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Privacy Policy</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <span> / </span>
                    <a href="privacy_policy.php">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Policy Content -->
    <div class="container policy-content">
        <h3>Introduction</h3>
        <p>
            We are committed to protecting your privacy. This privacy policy outlines how we collect, use, and protect your personal information when you use our website.
        </p>

        <h3>Information We Collect</h3>
        <p>
            We may collect the following information when you use our services:
        </p>
        <ul>
            <li>Personal Identification Information (Name, Email, Phone Number, etc.)</li>
            <li>Usage Data (e.g., IP address, browser type, and browsing behavior)</li>
            <li>Cookies and Tracking Data</li>
        </ul>

        <h3>How We Use Your Information</h3>
        <p>
            We use your personal information for the following purposes:
        </p>
        <ul>
            <li>To provide and maintain our service</li>
            <li>To notify you about changes to our services</li>
            <li>To provide customer support</li>
            <li>To gather analysis and valuable information to improve our service</li>
        </ul>

        <h3>Security of Your Information</h3>
        <p>
            We value your trust in providing us with your personal information, thus we are committed to using commercially acceptable means of protecting it. However, remember that no method of transmission over the internet, or method of electronic storage is 100% secure.
        </p>

        <h3>Changes to This Privacy Policy</h3>
        <p>
            We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.
        </p>

        <h3>Contact Us</h3>
        <p>
            If you have any questions about this Privacy Policy, please contact us:
        </p>
        <ul>
            <li>By email: Mohammed.n.Jummaa@gmail.com</li>
            <li>By visiting this page on our website: <a href="{{ route('user.contact') }}">Contact Us</a>
            </li>
        </ul>
    </div>

    <!-- Footer -->
    @include('layouts.User-Footer')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
