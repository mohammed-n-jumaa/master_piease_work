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
        width: auto;
        height: 50px;
        max-width: 500px;
        max-height: 50px;
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
        color: #a99065;
        font-weight: bold;
        margin-left: 10px;
        cursor: pointer;
    }
</style>

<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
            <!-- Logo -->
            <a href="{{ route('user.home') }}" class="logo-container">
                <img src="{{ asset('user/img/logo.png') }}" class="logo" alt="logo">
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <!-- Links -->
                <div class="navbar-nav">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Consultations</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('user.consultations.index') }}" class="dropdown-item">All Consultations</a>
                            <a href="{{ route('user.consultations.create') }}" class="dropdown-item">Add Consultation</a>
                        </div>
                    </div>
                    <a href="{{ route('user.legal-library') }}" class="nav-item nav-link">Legal Library</a>
                    <a href="{{ route('user.about') }}" class="nav-item nav-link">About us</a>
                    <a href="{{ route('user.contact') }}" class="nav-item nav-link">Contact Us</a>
                </div>

                <!-- User Auth -->
                @if(Auth::guard('lawyer')->check())
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle username" href="#" id="lawyerDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ explode(' ', Auth::guard('lawyer')->user()->first_name)[0] }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="lawyerDropdown">
                            <!-- Lawyer Profile Link -->
                            <a class="dropdown-item" href="{{ route('lawyer.profile') }}">Profile</a>
                            <!-- Logout Form -->
                            <form id="logout-form-lawyer" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="guard" value="lawyer">
                            </form>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-lawyer').submit();">
                                Logout
                            </a>
                        </div>
                    </div>
                @elseif(Auth::guard('web')->check())
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle username" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ explode(' ', Auth::user()->name)[0] }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <!-- User Profile Link -->
                            <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                            <!-- Logout Form -->
                            <form id="logout-form-user" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="guard" value="web">
                            </form>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-user').submit();">
                                Logout
                            </a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-auth">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-auth">Register</a>
                @endif
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
