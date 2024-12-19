<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المكتبة القانونية - الدستور الأردني</title>
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

</head>
<body>

<!-- Navbar Start -->
@include('layouts.User-Header')
<!-- Navbar End -->

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>legal-library</h2>
            </div>
            <div class="col-12">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('legal-library') }}">المكتبة القانونية</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Constitution Content Start -->
<div class="container my-5">
    <h3 class="text-center mb-4">الدستور الأردني لعام 2022</h3>

    <!-- Example of a chapter section -->
    <div class="section mb-4">
        <h4>الفصل الأول: الدولة ونظام الحكم فيها</h4>
        <p>
            <strong>المادة 1:</strong> المملكة الأردنية الهاشمية دولة عربية مستقلة ذات سيادة، ملكها لا يتجزأ، ولا يُتنازل عن شيء منه. الشعب الأردني جزء من الأمة العربية، ونظام الحكم فيها نيابي ملكي وراثي.
        </p>
        <p>
            <strong>المادة 2:</strong> الإسلام دين الدولة، واللغة العربية لغتها الرسمية.
        </p>
        <!-- Repeat similar blocks for each article in this chapter -->
    </div>

    <div class="section mb-4">
        <h4>الفصل الثاني: حقوق الأردنيين والأردنيات وواجباتهم</h4>
        <p>
            <strong>المادة 5:</strong> الجنسية الأردنية تحدد بقانون.
        </p>
        <p>
            <strong>المادة 6:</strong> الأردنيون أمام القانون سواء. لا تمييز بينهم في الحقوق والواجبات وإن اختلفوا في العرق أو اللغة أو الدين.
        </p>
        <!-- Repeat similar blocks for each article in this chapter -->
    </div>

    <!-- Continue adding sections for each chapter -->
</div>
<!-- Constitution Content End -->

<!-- Footer Start -->
@include('layouts.User-Footer')
<!-- Footer End -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
