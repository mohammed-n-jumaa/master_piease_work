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
<link href="{{ asset('user/css/consultation.css') }}" rel="stylesheet">

   
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
                        <div class="position-relative" style="display: inline-block; width: 100%;">
                            <i class="fas fa-filter" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); font-size: 16px; color: #aa9166;"></i>
                            <select class="form-control" name="category" onchange="this.form.submit()" 
                                    style="padding-left: 35px; width: 100%;">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    @auth('web') {{-- تحقق إذا كان الجارد الحالي هو للمستخدم --}}
                    <a href="{{ route('user.consultations.create') }}" class="btn btn-gold">
                        <i class="fas fa-plus-circle"></i> Add Consultation
                    </a>
                    @endauth
                </div>
            </div>
            
            
</div>


            <!-- Consultations Grid -->
            <div class="row">
                @foreach($consultations as $consultation)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="consultation-card">
                        <div class="card-image-wrapper">
                            <span class="category-badge">{{ $consultation->category->name ?? 'Uncategorized' }}</span>
                            <img src="{{ $consultation->user && $consultation->user->profile_picture ? asset($consultation->user->profile_picture) : asset('default-profile-picture.jpg') }}"
                                 alt="User Profile"
                                 onerror="this.onerror=null; this.src='https://www.w3schools.com/w3images/avatar2.png';"
                                 class="rounded-circle border border-2 border-light">
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