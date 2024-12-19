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
            color: #d4af37;
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
            color: #d4af37;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .faq-item h3.question {
            font-size: 18px;
            font-weight: bold;
            color: #d4af37;
        }

        .faq-item p.answer {
            font-size: 14px;
            color: #fff;
            margin-top: 5px;
        }

        /* New Question Button */
        .btn-gold {
            background-color: #d4af37;
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

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
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

        .modal-content h2 {
            color: #d4af37;
            font-weight: bold;
        }

        .modal-content label {
            display: block;
            font-weight: bold;
            margin: 15px 0 5px;
            color: #fff;
        }

        .modal-content input,
        .modal-content textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 20px;
            background-color: #222;
            color: #d4af37;
            border: 1px solid #444;
            border-radius: 4px;
        }

        .modal-content input:focus,
        .modal-content textarea:focus {
            outline: none;
            border-color: #d4af37;
        }

        .modal-content .btn {
            width: 100%;
        }

        .close {
            color: #d4af37;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #fff;
            cursor: pointer;
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
                    <a href="{{ route('home') }}">Home</a> / <a href="{{ route('faq') }}">FAQ</a>
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
                <p>Find answers to common questions or submit your own.</p>
            </div>

        <!-- FAQ List -->
<div class="faq-list">
    <div class="row">
        @foreach ($faqs as $faq)
            <div class="col-md-4 mb-4"> <!-- تقسيم الصفحة إلى 3 أعمدة -->
                <div class="faq-item">
                    <h3 class="question">{{ $faq->question }}</h3>
                    <p class="answer">{{ $faq->answer }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>


            <!-- Add New Question Button -->
            <button class="btn btn-gold" onclick="openModal()">Add a New Question</button>
        </div>
    </div>
    <!-- FAQ Section End -->

    <!-- New Question Modal -->
    <div id="questionModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Add a New Question</h2>
            <form method="POST" action="{{ route('faq.store') }}">
                @csrf
                <label for="questionTitle">Question Title</label>
                <input type="text" id="questionTitle" name="question" placeholder="Enter your question title" maxlength="40" required>
                
                <label for="questionContent">Content</label>
                <textarea id="questionContent" name="answer" placeholder="Enter your question details" maxlength="40" required></textarea>
                
                <button type="submit" class="btn btn-gold">Submit Question</button>
            </form>
            
            
        </div>
    </div>

    <!-- Include Footer -->
    @include('layouts.User-Footer')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        // Modal functionality
        function openModal() {
            document.getElementById('questionModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('questionModal').style.display = 'none';
        }
    </script>

</body>
</html>
