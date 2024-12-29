<link href="{{ asset('user/css/header.css') }}" rel="stylesheet">
<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <!-- Logo -->
            <a href="{{ auth()->check() ? route('user.home') : route('home') }}" class="logo-container">
                <img src="{{ asset('user/img/logo.png') }}" class="logo" alt="logo">
            </a>
            

            <!-- Mobile Toggle Button -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Search Bar - Only show for authenticated users -->
            @if(Auth::guard('web')->check() || Auth::guard('lawyer')->check())
            <div class="dropdown">
                <input class="form-control" type="text" id="searchDropdown" 
                       data-toggle="dropdown" placeholder="Search users or lawyers..." 
                       aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="searchDropdown" id="searchResults"></div>
            </div>
            @endif

            <!-- Navigation Items -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Consultations</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('user.consultations.index') }}" class="dropdown-item">All Consultations</a>
                            @if(Auth::guard('web')->check())
                                <a href="{{ route('user.consultations.create') }}" class="dropdown-item">Add Consultation</a>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('user.legal-library') }}" class="nav-item nav-link">Legal Library</a>
                    <a href="{{ route('user.about') }}" class="nav-item nav-link">About us</a>
                    <a href="{{ route('user.contact') }}" class="nav-item nav-link">Contact Us</a>
                </div>

                <!-- Authentication Links -->
                @if(Auth::guard('lawyer')->check())
                    <!-- Lawyer Auth -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle username" href="#" id="lawyerDropdown" 
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ explode(' ', Auth::guard('lawyer')->user()->first_name)[0] }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('lawyer.profile', ['lawyer_id' => Auth::guard('lawyer')->user()->id]) }}">Profile</a>
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
                    <!-- User Auth -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle username" href="#" id="userDropdown" 
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ explode(' ', Auth::user()->name)[0] }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
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
                    <!-- Guest Auth Links with new styling -->
                    <div class="auth-buttons">
                        <a href="{{ route('user.lawyer.login.form') }}" class="auth-btn login-btn">Login</a>
                        <a href="{{ route('register.user') }}" class="auth-btn register-btn">Register</a>
                    </div>
                @endif
            </div>
        </nav>
    </div>
</div>

<style>
    /* Updated styles for consistent spacing */
    .navbar-nav {
        display: flex;
        align-items: center;
        margin-left: auto;
    }
    
    .nav-item {
    margin-left: 5px;  /* تقليل المسافة بين العناصر */
}

.nav-link {
    padding: 8px 0; /* الإبقاء على padding عمودي فقط */
}
    
    /* Auth buttons container */
    .auth-buttons {
    gap: 5px;  /* تقليل المسافة بين أزرار الدخول والتسجيل */
    margin-left: 15px; /* تقليل المسافة بين الأزرار وبقية الروابط */
}
    
    /* Auth button styles */
    .auth-btn {
        padding: 8px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .login-btn {
        background-color: #1b1b1b;
        color: #ffffff;
        border: 2px solid #1b1b1b;
    }
    
    .login-btn:hover {
        background-color: transparent;
        color: #aa9166;
        text-decoration: none;
    }
    
    .register-btn {
        background-color: #aa9166;
        color: #ffffff;
        border: 2px solid #aa9166;
    }
    
    .register-btn:hover {
        background-color: transparent;
        color: #aa9166;
        text-decoration: none;
    }
    
    /* Responsive adjustments */
    @media (max-width: 991px) {
        .navbar-nav {
            flex-direction: column;
            align-items: flex-start;
        }
    
        .nav-item {
            margin: 5px 0;
        }
    
        .auth-buttons {
            margin: 10px 0;
            justify-content: flex-start;
        }
    }
    </style>
<script>
const searchInput = document.getElementById('searchDropdown');
const searchResults = document.getElementById('searchResults');

if (searchInput) {  // Only add event listener if search input exists
    searchInput.addEventListener('input', async function () {
        const query = searchInput.value.trim();

        if (query.length > 2) {
            try {
                const response = await fetch(`{{ route('search') }}?query=${encodeURIComponent(query)}`);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                searchResults.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(item => {
                        const profilePicture = item.profile_picture 
                            ? `/${item.profile_picture}`
                            : '/default-profile-picture.jpg';
                        
                        const result = document.createElement('a');
                        result.href = item.profile_url;
                        result.classList.add('dropdown-item', 'd-flex', 'align-items-center');
                        result.innerHTML = ` 
                            <img src="${profilePicture}" 
                                 class="rounded-circle mr-2" 
                                 style="width: 40px; height: 40px;" 
                                 alt="Image"
                                 onerror="this.src='/default-profile-picture.jpg';">
                            <span>${item.name}</span>
                        `;
                        searchResults.appendChild(result);
                    });
                } else {
                    searchResults.innerHTML = '<span class="dropdown-item text-muted">No results found</span>';
                }
            } catch (error) {
                console.error('Error fetching search results:', error);
                searchResults.innerHTML = '<span class="dropdown-item text-muted text-danger">An error occurred. Please try again later.</span>';
            }
        } else {
            searchResults.innerHTML = '';
        }
    });
}
</script>