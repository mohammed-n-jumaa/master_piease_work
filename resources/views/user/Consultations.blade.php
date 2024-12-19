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
  
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .filter-section {
            margin: 30px 0;
        }

        /* تصميم البطاقة */
        .card {
            background-color: #1b1b1b;
            color: #d4af37;
            border-radius: 8px;
            text-align: center;
            padding: 20px;
            position: relative;
            height: 100%;
            border: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* صورة المستخدم */
        .card img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            margin-bottom: 10px;
            object-fit: cover;
        }

        /* الكاتيجوري في الزاوية */
        .badge-category {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #d4af37;
            color: #1b1b1b;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 12px;
        }

        /* اسم المستخدم */
        .card-title {
            font-size: 18px;
            font-style: italic;
            font-weight: bold;
            color: #d4af37;
            margin-bottom: 5px;
        }

        /* الزر */
        .btn-gold {
            background-color: #d4af37;
            color: #1b1b1b;
            font-weight: bold;
            border: none;
            padding: 8px 20px;
            font-size: 14px;
        }

        .btn-gold:hover {
            background-color: #c29d2d;
            color: #ffffff;
        }
        .pagination .page-link {
            background-color: #1b1b1b;
            color: #d4af37;
            border: 1px solid #333;
        }

        .pagination .page-item.active .page-link {
            background-color: #d4af37;
            color: #1b1b1b;
            border-color: #d4af37;
        }

        .pagination .page-link:hover {
            background-color: #c29d2d;
            color: #fff;
        }
        .filter-section {
        margin-bottom: 40px; /* مسافة واضحة بين الفلتر والبطاقات */
    }

    .filter-section .form-control {
        max-width: 250px;
        border: 2px solid #d4af37;
        border-radius: 5px;
    }

    .btn-gold {
        background-color: #d4af37;
        color: #1b1b1b;
        font-weight: bold;
        padding: 8px 20px;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-gold:hover {
        background-color: #c29d2d;
        color: #ffffff;
    }

    /* تحسين المسافة بين القسم العلوي والبطاقات */
    .mt-4 {
        margin-top: 20px !important;
    }

    /* مسافة بين البطاقة والعناصر المحيطة */
    .mb-4 {
        margin-bottom: 20px;
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
                        <h2>Consultations</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('home') }}">Home</a> 
                        <a href="{{ route('consultations.index') }}">Consultations</a> 
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

 <!-- Filter and Button Section Start -->
<div class="container mb-4">
    <div class="d-flex justify-content-between align-items-start">
        <!-- الفلتر على اليسار -->
        <form action="{{ route('consultations.index') }}" method="GET" class="mb-0">
            <select class="form-control" name="category" onchange="this.form.submit()" style="border: 2px solid #d4af37; border-radius: 5px; max-width: 250px;">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>

        <!-- زر Add Consultations على اليمين -->
        <a href="{{ route('consultations.create') }}" class="btn btn-gold" style="padding: 8px 20px;">
            <i class="fas fa-plus-circle"></i> Add Consultations
        </a>
    </div>
</div>
<!-- Filter and Button Section End -->



<!-- Consultations List Start -->
<div class="container">
    <div class="row mt-4">
        @foreach($consultations as $consultation)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <!-- الكاتيجوري -->
                <span class="badge-category">{{ $consultation->category->name ?? 'Uncategorized' }}</span>

                <!-- صورة المستخدم -->
                <img src="{{ asset($consultation->user->image ?? 'user/img/default-user.jpg') }}" 
                     onerror="this.onerror=null; this.src='https://www.w3schools.com/w3images/avatar2.png';" 
                     alt="User profile picture">

                <!-- اسم المستخدم -->
                <h5 class="card-title">
                    {{ $consultation->user->name ?? 'Client' }}
                </h5>

                <!-- محتوى مختصر -->
                <p class="card-text">{{ Str::limit($consultation->content, 50, '...') }}</p>

                <!-- زر رؤية المزيد -->
                <a href="{{ route('consultations.show', $consultation->id) }}" class="btn btn-gold">
                    See More
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $consultations->links('pagination::bootstrap-4') }}
    </div>
</div>
<!-- Consultations List End -->

        <!-- Footer Start -->
        @include('layouts.User-Footer')
        <!-- Footer End -->
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
