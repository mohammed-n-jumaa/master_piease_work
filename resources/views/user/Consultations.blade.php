<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Consultations</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Law Firm Website Template" name="keywords">
    <meta content="Law Firm Website Template" name="description">
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
            --primary-color: #aa9166;
            --secondary-color: #1b1b1b;
            --hover-color: #c29d2d;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        /* Header Section - Keeping as per image */
        .page-header {
            background-color: #aa9166;
            padding: 100px 0;
            text-align: center;
            position: relative;
        }

        .page-header h2 {
            font-family: 'EB Garamond', serif;
            font-size: 48px;
            font-style: italic;
            color: #1b1b1b;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .page-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background-color: #1b1b1b;
        }

        .breadcrumb-links {
            margin-top: 20px;
        }

        .breadcrumb-links a {
            color: #1b1b1b;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .breadcrumb-links a:hover {
            color: #ffffff;
        }

        .breadcrumb-links a:not(:last-child):after {
            content: '/';
            margin: 0 10px;
            color: #1b1b1b;
        }

        /* Filter Section */
        .filter-section {
            margin: -50px auto 40px;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            max-width: 1100px;
        }

        .filter-section .form-control {
            border: 2px solid var(--primary-color);
            border-radius: 10px;
            padding: 12px 20px;
            color: var(--secondary-color);
            background: #ffffff;
            font-size: 16px;
        }

        /* Card Design */
        .consultation-card {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(170, 145, 102, 0.1);
        }

        .consultation-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(170, 145, 102, 0.2);
        }

        .card-image-wrapper {
            position: relative;
            padding: 30px;
            background: linear-gradient(145deg, #aa9166 0%, #c29d2d 100%);
        }

        .consultation-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            margin: 0 auto;
            display: block;
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .category-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #ffffff;
            color: var(--primary-color);
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 500;
            font-size: 14px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .card-content {
            padding: 30px;
            text-align: center;
        }

        .card-title {
            color: var(--secondary-color);
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
            font-family: 'EB Garamond', serif;
        }

        .card-text {
            color: #666666;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .btn-gold {
            background: linear-gradient(145deg, #aa9166 0%, #c29d2d 100%);
            color: #ffffff;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(170, 145, 102, 0.3);
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(170, 145, 102, 0.4);
            color: #ffffff;
        }

        /* Pagination */
        .pagination {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .pagination .page-link {
            border: none;
            padding: 12px 20px;
            margin: 0 5px;
            color: var(--secondary-color);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(145deg, #aa9166 0%, #c29d2d 100%);
            color: #ffffff;
            box-shadow: 0 5px 15px rgba(170, 145, 102, 0.3);
        }

        .pagination .page-link:hover {
            background: linear-gradient(145deg, #aa9166 0%, #c29d2d 100%);
            color: #ffffff;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 60px 0;
            }

            .page-header h2 {
                font-size: 36px;
            }

            .filter-section {
                margin-top: -30px;
                padding: 20px;
            }

            .consultation-card {
                margin-bottom: 30px;
            }
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
                <h2>Consultations</h2>
                <div class="breadcrumb-links">
                    <a href="{{ route('user.home') }}">Home</a>
                    <a href="{{ route('user.consultations.index') }}">Consultations</a>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Main Content Start -->
        <div class="container">
            <div class="filter-section">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <form action="{{ route('user.consultations.index') }}" method="GET" class="mb-0">
                        <select class="form-control" name="category" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                    <a href="{{ route('user.consultations.create') }}" class="btn btn-gold">
                        <i class="fas fa-plus-circle"></i> Add Consultation
                    </a>
                </div>
            </div>

            <!-- Consultations Grid -->
            <div class="row">
                @foreach($consultations as $consultation)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="consultation-card">
                        <div class="card-image-wrapper">
                            <span class="category-badge">{{ $consultation->category->name ?? 'Uncategorized' }}</span>
                            <img src="{{ asset('user_profiles/' . ($user->profile_picture ?? 'default-profile-picture.jpg')) }}"
                            onerror="this.onerror=null; this.src='https://www.w3schools.com/w3images/avatar2.png';"
                            alt="User profile picture">
                       
                       
                       
                        </div>
                        
                        <div class="card-content">
                            <h3 class="card-title">{{ $consultation->user->name ?? 'Client' }}</h3>
                            <p class="card-text">{{ Str::limit($consultation->content, 50, '...') }}</p>
                            <a href="{{ route('user.consultations.show', $consultation->id) }}" class="btn btn-gold">
                                See More
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $consultations->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <!-- Main Content End -->

        <!-- Footer Start -->
        @include('layouts.User-Footer')
        <!-- Footer End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>