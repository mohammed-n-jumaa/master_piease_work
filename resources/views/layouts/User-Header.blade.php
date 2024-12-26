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
.dropdown {
position: relative;
}

/* تنسيق حقل البحث */
#searchDropdown {
background-color: #121518;
border: 1px solid #aa9166;
color: #ffffff;
border-radius: 4px;
padding: 6px 12px;  /* تقليل padding */
width: 220px;      /* تقليل العرض */
transition: all 0.3s ease;
font-size: 14px;   /* تقليل حجم الخط */
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

/* تنسيق قائمة نتائج البحث */
#searchResults {
background-color: #121518;
border: 1px solid #aa9166;
border-radius: 4px;
margin-top: 4px;
max-height: 350px;    /* تقليل الارتفاع الأقصى */
overflow-y: auto;
width: 100%;
}

/* تنسيق عناصر نتائج البحث */
#searchResults .dropdown-item {
color: #ffffff;
padding: 8px 12px;    /* تقليل padding */
transition: background-color 0.2s ease;
font-size: 14px;      /* تقليل حجم الخط */
}

#searchResults .dropdown-item:hover {
background-color: #aa9166;
color: #121518;
}

/* تنسيق رسالة عدم وجود نتائج */
#searchResults .text-muted {
color: #aa9166 !important;
padding: 8px 12px;
}

/* تنسيق صور المستخدمين في نتائج البحث */
#searchResults img {
border: 2px solid #aa9166;
object-fit: cover;
width: 32px;         /* تقليل حجم الصور */
height: 32px;
}

/* تخصيص scrollbar */
#searchResults::-webkit-scrollbar {
width: 6px;          /* تقليل عرض scrollbar */
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
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
            <!-- Logo -->
            <a href="{{ route('user.home') }}" class="logo-container">
                <img src="{{ asset('user/img/logo.png') }}" class="logo" alt="logo">
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
           <!-- Search Bar -->
             <div class="dropdown mx-3">
           <input class="form-control dropdown-toggle" type="text" id="searchDropdown" data-toggle="dropdown" placeholder="Search users or lawyers..." aria-haspopup="true" aria-expanded="false">
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="searchDropdown" id="searchResults"></div>
             </div>
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
                            <a class="dropdown-item" href="{{ route('lawyer.profile', ['lawyer_id' => Auth::guard('lawyer')->user()->id]) }}">Profile</a>
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
