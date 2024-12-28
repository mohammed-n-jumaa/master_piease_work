<style>
    #sidebar {
        border: 2px solid;
        border-image: linear-gradient(to right, #aa9166, #aa9166);
        border-image-slice: 1;
    }
    
    .sidebar .nav-link {
        color: #aa9166 !important; /* لون النص */
    }
    
    .sidebar .nav-link i {
        color: #aa9166 !important; /* لون الأيقونات */
    }
    
    .sidebar .nav-link .menu-title {
        color: #aa9166 !important; /* لون النصوص داخل العناصر */
    }
    
    .sidebar .nav-link:hover {
        background-color: #8f774d !important; /* لون خلفية أغمق عند التمرير */
        color: #1b1b1b !important; /* تغيير لون النص عند التمرير */
    }
    
    .sidebar .nav-link:hover i,
    .sidebar .nav-link:hover .menu-title {
        color: #1b1b1b !important; /* تغيير لون الأيقونات والنصوص عند التمرير */
    }
    
    .sidebar .nav-item.active .nav-link {
        background-color: #aa9166 !important; /* لون الخلفية عند التفعيل */
        color: #1b1b1b !important; /* لون النص عند التفعيل */
        font-weight: bold !important; /* خط عريض للنص */
    }
    
    .sidebar .nav-item.active .nav-link i {
        color: #1b1b1b !important; 
    }
    
    .sidebar .nav-item.active .nav-link .menu-title {
        color: #1b1b1b!important; /* لون النص عند التفعيل */
    }
    </style>
    

</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
  
        <!-- Manage Users -->
        <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Manage Users</span>
            </a>
        </li>
  
        <!-- Manage Lawyers -->
        <li class="nav-item {{ request()->routeIs('admin.lawyers.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.lawyers.index') }}">
                <i class="fas fa-gavel menu-icon"></i>
                <span class="menu-title">Manage Lawyers</span>
            </a>
        </li>
  
        <!-- Manage Consultations -->
        <li class="nav-item {{ request()->routeIs('admin.consultations.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.consultations.index') }}">
                <i class="fas fa-comment-alt menu-icon"></i>
                <span class="menu-title">Manage Consultations</span>
            </a>
        </li>
  
        <!-- Manage Comments -->
        <li class="nav-item {{ request()->routeIs('admin.comments.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.comments.index') }}">
                <i class="fas fa-comments menu-icon"></i>
                <span class="menu-title">Manage Comments</span>
            </a>
        </li>
  
        <!-- Manage Category -->
        <li class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                <i class="fas fa-list menu-icon"></i>
                <span class="menu-title">Manage Categories</span>
            </a>
        </li>
  
        <!-- Manage Subscriptions -->
        <li class="nav-item {{ request()->routeIs('admin.subscriptions.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.subscriptions.index') }}">
                <i class="fas fa-credit-card menu-icon"></i>
                <span class="menu-title">Manage Subscriptions</span>
            </a>
        </li>

        <!-- Manage Notifications -->
        <li class="nav-item {{ request()->routeIs('admin.notifications.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.notifications.index') }}">
                <i class="fas fa-bell menu-icon"></i>
                <span class="menu-title">Manage Notifications</span>
            </a>
        </li>

        <!-- Manage Testimonials -->
        <li class="nav-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.testimonials.index') }}">
                <i class="fas fa-quote-right menu-icon"></i>
                <span class="menu-title">Manage Testimonials</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                <i class="fas fa-star menu-icon"></i>
                <span class="menu-title">Manage Reviews</span>
            </a>
        </li>
        
</ul>

  </nav>
  