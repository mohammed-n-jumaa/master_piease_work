<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Law Firm Website Template" name="keywords">
    <meta content="Law Firm Website Template" name="description">
    <title>Add New Consultation</title>
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

    <style>
        .btn-gold {
            background-color: #d4af37;
            color: #1b1b1b;
            border: none;
        }

        .btn-gold:hover {
            background-color: #c29d2d;
            color: #ffffff;
        }

        .section-header h2 {
            color: #000000;
        }

        .card {
            border-radius: 10px;
        }

        .form-group label {
            color: #d4af37;
            font-weight: bold;
        }

        body {
            background-color: #ffffff;
            color: #ffffff;
        }
    </style>
</head>

<body>

<!-- Navbar -->
@include('layouts.User-Header')
<div class="container mt-5">
    <!-- Page Header -->
    <div class="section-header text-center mb-4">
        <h2>Add New Consultation</h2>
        <p class="lead">Submit your consultation and select the appropriate category.</p>
    </div>

    <!-- Form Section -->
    <div class="card bg-dark text-white shadow">
        <div class="card-body">
            <form action="{{ route('user.consultations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter consultation title" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Details</label>
                    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Describe your issue..." required></textarea>
                </div>

                <button type="submit" class="btn btn-gold mt-3">Submit Consultation</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
@include('layouts.User-Footer')


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>
