<style>
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }
    
    .navbar-brand {
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        align-items: center;
    }
    
    .navbar-brand svg {
        width: auto;  /* يضمن تناسب الشعار */
        height: 50px;  /* يمكنك تعديل الحجم حسب الحاجة */
        max-width: 500px;  /* التحكم في الحجم الأقصى */
        max-height: 50px;  /* التحكم في الارتفاع الأقصى */
    }
    
    .navbar-nav {
        display: flex;
        gap: 20px;
    }
    
    .navbar-collapse {
        display: flex;
        justify-content: flex-end;
    }
    
    .btn-auth {
        margin-left: 10px;
    }
    
    @media (max-width: 991px) {
        .navbar-brand {
            position: relative;
            left: 0;
            top: 0;
        }
    }
    
    .logo {
        width: 200px;
    }
    
    .username {
        color: #a99065; /* اللون المحدد */
        font-weight: bold; /* لجعل الاسم بارزًا */
        margin-left: 10px; /* مسافة بين زر الخروج والاسم */
        cursor: pointer; /* تغيير المؤشر ليصبح قابلًا للنقر */
    }
</style>

<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
            <!-- شعار الموقع -->
            <a href="{{ route('home') }}" class="logo-container">
                <img src="{{ asset('user/img/logo.png') }}" class="logo" alt="logo">
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <!-- الروابط -->
                <div class="navbar-nav">
                    <div class="nav-item dropdown">
                        <a href="/consultations" class="nav-link dropdown-toggle" data-toggle="dropdown">Consultations</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('consultations.index') }}" class="dropdown-item">All Consultations</a>
                            <a href="{{ route('consultations.create') }}" class="dropdown-item">Add Consultation</a>
                        </div>
                        
                    </div>
                    <a href="{{ route('legal-library') }}" class="nav-item nav-link">Legal Library</a>
                    <a href="/about" class="nav-item nav-link">About Us</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link">Contact Us</a>
                </div>

                <!-- الأزرار في أقصى اليمين -->
                @if(Auth::check()) 
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle username" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ explode(' ', Auth::user()->name)[0] }} <!-- عرض الاسم الأول فقط -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/profile">Profile</a>
                        <!-- نموذج تسجيل الخروج -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>
                </div>
                @else
                    <a href="/login" class="btn btn-auth">Login</a>
                    <a href="/register" class="btn btn-auth">Register</a>
                @endif
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
