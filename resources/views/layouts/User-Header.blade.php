<style>
  /* Base navbar styles */
.nav-bar {
    width: 100%;
    background-color: #000000;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 1rem;
    position: relative;
}

.navbar-brand {
    display: flex;
    align-items: center;
}

.logo {
    width: 200px;
    height: auto;
}

/* Navbar toggle button */
.navbar-toggler {
    padding: 0.25rem 0.75rem;
    background-color: transparent;
    border: 1px solid #aa9166;
    border-radius: 4px;
    display: none;
}

.navbar-toggler-icon {
    display: inline-block;
    width: 1.5em;
    height: 1.5em;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(170, 145, 102, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

/* Navigation items */
.navbar-nav {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nav-link {
    color: #ffffff;
    padding: 0.5rem 1rem;
    text-decoration: none;
    white-space: nowrap;
}

.nav-link:hover {
    color: #aa9166;
}

/* Search bar styles */
.dropdown {
    position: relative;
    margin: 0 1rem;
}

#searchDropdown {
    background-color: #121518;
    border: 1px solid #aa9166;
    color: #ffffff;
    border-radius: 4px;
    padding: 6px 12px;
    width: 220px;
    transition: all 0.3s ease;
    font-size: 14px;
}

#searchDropdown::placeholder {
    color: #aa9166;
    opacity: 0.7;
}

#searchDropdown:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(170, 145, 102, 0.25);
    border-color: #aa9166;
}

/* Search results */
#searchResults {
    background-color: #121518;
    border: 1px solid #aa9166;
    border-radius: 4px;
    margin-top: 4px;
    max-height: 350px;
    overflow-y: auto;
    width: 100%;
    position: absolute;
    z-index: 1000;
}

#searchResults .dropdown-item {
    color: #ffffff;
    padding: 8px 12px;
    transition: background-color 0.2s ease;
    font-size: 14px;
}

#searchResults .dropdown-item:hover {
    background-color: #aa9166;
    color: #121518;
}

#searchResults img {
    border: 2px solid #aa9166;
    object-fit: cover;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    margin-right: 10px;
}

/* User/Auth styles */
.username {
    color: #a99065;
    font-weight: bold;
    cursor: pointer;
}

.btn-auth {
    margin-left: 10px;
    padding: 0.375rem 1rem;
    border: 1px solid #aa9166;
    border-radius: 4px;
    color: #aa9166;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-auth:hover {
    background-color: #aa9166;
    color: #121518;
}

/* Dropdown menus */
.dropdown-menu {
    background-color: #121518;
    border: 1px solid #aa9166;
    border-radius: 4px;
    min-width: 200px;
}

.dropdown-item {
    color: #ffffff;
    padding: 8px 16px;
    text-decoration: none;
}

.dropdown-item:hover {
    background-color: #aa9166;
    color: #121518;
}

/* Responsive styles */
@media (max-width: 991px) {
    .navbar {
        flex-wrap: wrap;
        padding: 0.5rem;
    }

    .navbar-toggler {
        display: block;
        order: 2;
    }

    .navbar-collapse {
        display: none;
        width: 100%;
        order: 4;
    }

    .navbar-collapse.show {
        display: block;
    }

    .navbar-nav {
        flex-direction: column;
        width: 100%;
        gap: 0;
        padding: 1rem 0;
    }

    .nav-item {
        width: 100%;
    }

    .nav-link {
        padding: 0.75rem 1rem;
        display: block;
        text-align: center;
        border-bottom: 1px solid rgba(170, 145, 102, 0.1);
    }

    .dropdown {
        width: 100%;
        margin: 0.5rem 0;
        order: 3;
    }

    #searchDropdown {
        width: 100%;
    }

    .dropdown-menu {
        position: static !important;
        width: 100%;
        margin-top: 0;
        padding: 0;
    }

    .btn-auth {
        display: block;
        width: 100%;
        text-align: center;
        margin: 0.25rem 0;
    }

    .username {
        text-align: center;
        padding: 0.5rem;
        display: block;
    }
}

@media (max-width: 576px) {
    .logo {
        width: 150px;
    }

    .navbar-brand {
        max-width: 50%;
    }

    .nav-link {
        font-size: 14px;
    }

    #searchDropdown {
        font-size: 13px;
        padding: 4px 8px;
    }

    .dropdown-item {
        font-size: 13px;
        padding: 6px 12px;
    }
}

/* Scrollbar customization */
#searchResults::-webkit-scrollbar {
    width: 6px;
}

#searchResults::-webkit-scrollbar-track {
    background: #121518;
}

#searchResults::-webkit-scrollbar-thumb {
    background-color: #aa9166;
    border-radius: 4px;
}
</style>
<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <!-- Logo -->
            <a href="{{ route('user.home') }}" class="logo-container">
                <img src="{{ asset('user/img/logo.png') }}" class="logo" alt="logo">
            </a>

            <!-- Mobile Toggle Button -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Search Bar -->
            <div class="dropdown">
                <input class="form-control" type="text" id="searchDropdown" 
                       data-toggle="dropdown" placeholder="Search users or lawyers..." 
                       aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="searchDropdown" id="searchResults"></div>
            </div>

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
                    <!-- Guest Auth Links -->
                    <div class="auth-buttons">
                        <a href="{{ route('login') }}" class="btn btn-auth">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-auth">Register</a>
                    </div>
                @endif
            </div>
        </nav>
    </div>
</div>
<script>
  const searchInput = document.getElementById('searchDropdown');
const searchResults = document.getElementById('searchResults');

searchInput.addEventListener('input', async function () {
    const query = searchInput.value.trim();

    // التأكد أن طول النص المدخل أكثر من 2 حروف
    if (query.length > 2) {
        try {
            // إرسال الطلب إلى السيرفر
            const response = await fetch(`{{ route('search') }}?query=${encodeURIComponent(query)}`);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();

            // تفريغ محتويات نتائج البحث
            searchResults.innerHTML = '';

            console.log('Data fetched:', data); // عرض البيانات في وحدة التحكم لفحصها

            if (data.length > 0) {
                data.forEach(item => {
                    // التعامل مع مسار الصورة للمستخدم أو المحامي
                    const profilePicture = item.profile_picture 
                        ? `/${item.profile_picture}` // الصورة من المجلد `public`
                        : '/default-profile-picture.jpg'; // صورة افتراضية
                    
                    // إنشاء عنصر لكل نتيجة بحث
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
                // في حالة عدم وجود نتائج
                searchResults.innerHTML = '<span class="dropdown-item text-muted">No results found</span>';
            }
        } catch (error) {
            console.error('Error fetching search results:', error);

            // عرض رسالة خطأ للمستخدم في حالة حدوث مشكلة في الطلب
            searchResults.innerHTML = '<span class="dropdown-item text-muted text-danger">An error occurred. Please try again later.</span>';
        }
    } else {
        // تفريغ النتائج إذا كان النص المدخل أقل من 3 حروف
        searchResults.innerHTML = '';
    }
});

</script>


    
<!-- Nav Bar End -->
