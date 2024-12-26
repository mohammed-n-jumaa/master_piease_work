<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Law Firm Consultation" name="keywords">
    <meta content="Legal Consultation Form" name="description">
    <title>Add New Consultation</title>
    
    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <!-- Favicon -->
  <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">
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
        :root {
            --gold: #aa8f61;
            --dark-gold: #8a7141;
            --light-gold: #d4c4a8;
            --dark: #1a1a1a;
            --light: #ffffff;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #0a0a0a;
            color: var(--light);
            line-height: 1.6;
            position: relative;
            overflow-x: hidden;
        }

        /* Header Section - Keeping as in image but with requested color */
        .section-header {
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAEklEQVQImWNgYGD4z0AswK4SAFXuAf8EPy+xAAAAAElFTkSuQmCC') repeat;
            padding: 4rem 0;
            position: relative;
            margin-bottom: 3rem;
        }

        .section-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, var(--gold) 50%, transparent 100%);
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, var(--gold) 50%, transparent 100%);
        }

        .section-header h2 {
            color: var(--gold);
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .section-header p {
            color: var(--gold);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Luxurious Form Design */
        .consultation-wrapper {
            max-width: 900px;
            margin: -2rem auto 4rem;
            padding: 0 1.5rem;
            position: relative;
            z-index: 1;
        }

        .form-container {
            background: linear-gradient(145deg, #1c1c1c, #252525);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            border: 1px solid rgba(170, 143, 97, 0.1);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(170, 143, 97, 0.1) 0%, transparent 60%);
            animation: lightShift 15s linear infinite;
        }

        @keyframes lightShift {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .form-group label {
            color: var(--gold);
            font-weight: 500;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
            display: block;
        }

        .form-control {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(170, 143, 97, 0.2);
            border-radius: 8px;
            padding: 0.8rem 1rem;
            color: var(--light);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.08);
            border-color: var(--gold);
            box-shadow: 0 0 15px rgba(170, 143, 97, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.3);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23aa8f61' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1rem;
            padding-right: 3rem;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: linear-gradient(45deg, var(--dark-gold), var(--gold));
            color: var(--light);
            border: none;
            border-radius: 8px;
            padding: 1rem 2.5rem;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(170, 143, 97, 0.3);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .decorative-line {
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 2rem 0;
            opacity: 0.3;
        }

        @media (max-width: 768px) {
            .section-header h2 {
                font-size: 2rem;
            }
            
            .form-container {
                padding: 2rem;
            }
            
            .submit-btn {
                width: 100%;
            }
        }

        /* Animated background effect */
        .bg-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            opacity: 0.03;
            background-image: 
                linear-gradient(45deg, var(--gold) 25%, transparent 25%),
                linear-gradient(-45deg, var(--gold) 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, var(--gold) 75%),
                linear-gradient(-45deg, transparent 75%, var(--gold) 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
            animation: bgMove 20s linear infinite;
        }

        @keyframes bgMove {
            0% { background-position: 0 0, 0 10px, 10px -10px, -10px 0px; }
            100% { background-position: 20px 20px, 20px 30px, 30px 10px, 10px 20px; }
        }
    </style>
</head>

<body>
    <!-- Background Pattern -->
    <div class="bg-pattern"></div>

    <!-- Navbar -->
    @include('layouts.User-Header')

    <!-- Header Section (preserved from image) -->
    <div class="section-header text-center">
        <h2>Add New Consultation</h2>
        <p class="lead">Submit your consultation and select the appropriate category.</p>
    </div>

    <!-- Form Section -->
    <div class="consultation-wrapper">
        <div class="form-container">
            <form action="{{ route('user.consultations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">
                        <i class="bi bi-pencil-square me-2"></i>Consultation Title
                    </label>
                    <input type="text" 
                           class="form-control" 
                           id="title" 
                           name="title" 
                           placeholder="Enter the title of your consultation request"
                           required>
                </div>

                <div class="decorative-line"></div>

                <div class="form-group">
                    <label for="category">
                        <i class="bi bi-folder me-2"></i>Legal Category
                    </label>
                    <select name="category_id" 
                            id="category" 
                            class="form-control"
                            required>
                        <option value="" disabled selected>Select the appropriate legal category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="decorative-line"></div>

                <div class="form-group">
                    <label for="content">
                        <i class="bi bi-file-text me-2"></i>Case Details
                    </label>
                    <textarea class="form-control" 
                              id="content" 
                              name="content" 
                              placeholder="Please provide detailed information about your case..."
                              required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="submit-btn">
                        Submit Consultation
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.User-Footer')

 <!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script>
</body>
</html>