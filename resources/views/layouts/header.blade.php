<style>
.navbar {
    border: 2px solid;
    border-image: linear-gradient(to right, #aa9166, #aa9166);
    border-image-slice: 1;
}


.navbar-brand-wrapper {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 10px !important;
}

.logo-container {
    text-decoration: none !important;
    text-align: center !important;
    color: #aa9166 !important;

svg {
    width: 700px !important;
    height: 100px !important; 
    fill: #aa9166 !important;
}

#profileDropdown {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #aa9166 !important;
}

.profile-img {
    width: 40px !important; 
    height: 40px !important; 
    border-radius: 50% !important;
    object-fit: cover !important; 
    border: 2px solid #aa9166 !important; 
}

</style>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper">
        <a href="{{ route('dashboard') }}" class="logo-container">

            <svg xmlns="" viewBox="0 0 2000 125" width="150" height="50">
                <g transform="translate(10 2.228)scale(.96435)">
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="2000" height="98" data-id="lg_x07yVrfoR6X3b95UDU" data-version="1" viewBox="0 0 2000 98"><g data-padding="20"><g transform="translate(10 1.808)scale(.9631)"><rect width="434.527" height="98.31" x="418.963" y="-400.395" fill="none" rx="0" ry="0" transform="translate(337.76 400.24)"/><path fill="#aa9166" d="m765.476 76.33 3.13-59.34h9.31l13.4 35.33q1.13 3.04 2.09 5.61.95 2.56 1.65 4.56.87 2.27 1.48 4.18h.17q.52-1.91 1.31-4.18.69-2 1.56-4.56.87-2.57 2.09-5.61l13.66-35.33h9.31l3.04 59.34h-7.39l-1.48-32.63q-.17-4.26-.26-7.22t-.09-4.87v-3.65h-.17q-.52 1.3-1.31 3.56-.69 1.92-1.78 4.92t-2.65 7.26l-12.27 32.63h-7.4l-12.35-32.63q-1.65-4.17-2.7-7.18-1.04-3-1.74-4.91-.78-2.26-1.22-3.65h-.17q.09 1.39.17 3.65.09 3.65-.26 12.09l-1.74 32.63Zm101.44.7-.52-5.48h-.18q-.78.61-2.26 1.61t-3.39 1.96-4.22 1.65q-2.31.7-4.65.7-3.22 0-5.49-.83-2.26-.82-3.65-2.74-1.39-1.91-2-5.04-.61-3.14-.61-7.83V32.58h6.96v27.4q0 2.61.09 4.7.08 2.09.61 3.57.52 1.48 1.69 2.3 1.18.83 3.35.83 2.26 0 4.7-.96t4.44-2.17q2.35-1.4 4.61-3.14V32.58h6.96v38.1q.09 3.13.43 5.66Zm43.94-43.51-1.22 6.18q-3.66-1.13-6.48-1.52-2.83-.39-5.18-.39-3.05 0-5.09 1.48-2.04 1.47-2.04 3.82.08 2.09 1.82 3.57t4.05 2.65q2.3 1.18 5.13 2.57t5.31 3.13 4.04 4.18q1.57 2.43 1.66 5.83-.09 3.65-1.61 6.04-1.53 2.4-3.92 3.83-2.39 1.44-5.17 2-2.79.57-5.22.57-3.14 0-6.49-.35t-7.17-1.48l1.3-6.26q3.92 1.04 7.14 1.52 3.21.48 5.3.48 1.57 0 3.09-.35t2.74-1 1.96-1.7q.74-1.04.74-2.35-.09-2.43-1.65-4.13-1.57-1.69-4.05-3.04t-5.31-2.7q-2.82-1.35-5.3-3.13-2.48-1.79-4.14-4.27-1.65-2.47-1.65-6.13 0-2.61 1.35-4.65 1.35-2.05 3.48-3.4 2.13-1.34 4.7-2.08 2.56-.74 5-.74 2.52 0 5.65.39 3.14.39 7.23 1.43m14.61-13.13 6.96-.87v13.05h12.62v5.65h-12.62v23.23q0 2.87.13 4.79.13 1.91.57 3.04.43 1.13 1.22 1.61.78.48 2 .48 3.3-.09 7.65-2.44l2.09 5.31q-2.87 1.91-5.35 2.57-2.48.65-4.92.65-5.74 0-8.04-3.26-2.31-3.27-2.31-10.84V38.22h-8v-5.65h8Zm52.81 45.76v-9.92l-3.31.17q-1.56.09-3.08.22-1.53.13-2.74.31-6.27.78-8.88 2.74-2.61 1.95-2.61 5.61 0 3.04 1.87 4.57 1.87 1.52 4.92 1.52 4.17 0 7.44-1.44 3.26-1.43 6.39-3.78m.78 10.87-.87-4.78q-4.09 2.35-7.61 3.78-3.52 1.44-7.61 1.44-5.83 0-9.27-2.83-3.43-2.83-3.43-9.35 0-3.39 1.74-5.92 1.74-2.52 4.56-4.22 2.83-1.69 6.4-2.65t7.31-1.22q1.56-.17 4.09-.3 2.52-.13 3.91-.22 0-3.05-.17-5.44-.18-2.39-1.05-4.09-.87-1.69-2.56-2.56-1.7-.87-4.83-.87-2.53 0-4.87.3-2.35.31-4.18.65-2.18.44-4 .96l-1.39-6q2.17-.52 4.69-.96 2.18-.43 5.05-.74 2.87-.3 6.18-.3 4.43 0 7.17 1.3 2.74 1.31 4.27 3.52 1.52 2.22 2.09 5.05.56 2.83.56 5.96v20.88q0 1.22.04 2.57.05 1.35.18 2.65.13 1.31.3 2.7Zm43.33-43.5-1.22 6.18q-3.65-1.13-6.48-1.52t-5.18-.39q-3.04 0-5.09 1.48-2.04 1.47-2.04 3.82.09 2.09 1.83 3.57t4.04 2.65q2.31 1.18 5.14 2.57 2.82 1.39 5.3 3.13t4.05 4.18q1.56 2.43 1.65 5.83-.09 3.65-1.61 6.04-1.52 2.4-3.91 3.83-2.4 1.44-5.18 2-2.78.57-5.22.57-3.13 0-6.48-.35t-7.18-1.48l1.31-6.26q3.91 1.04 7.13 1.52t5.31.48q1.56 0 3.09-.35 1.52-.35 2.74-1 1.21-.65 1.95-1.7.74-1.04.74-2.35-.08-2.43-1.65-4.13-1.57-1.69-4.05-3.04t-5.3-2.7q-2.83-1.35-5.31-3.13-2.48-1.79-4.13-4.27-1.66-2.47-1.66-6.13 0-2.61 1.35-4.65 1.35-2.05 3.48-3.4 2.13-1.34 4.7-2.08t5-.74q2.53 0 5.66.39t7.22 1.43m11.39 42.81V11.16l6.96-.78v27.67q2.61-1.74 5.17-3.05 2.57-1.3 5.27-2.3 2.69-1 5.22-1 3.56 0 5.96.82 2.39.83 3.87 2.74 1.48 1.92 2.13 5.05t.65 7.83v28.19h-6.96V48.92q0-2.61-.09-4.65-.08-2.05-.73-3.48-.66-1.44-2.01-2.22-1.34-.78-3.78-.78-2.26 0-4.87 1t-4.96 2.3q-2.35 1.31-4.87 3.05v32.19Zm71.87-10.18v-9.92l-3.31.17q-1.56.09-3.09.22-1.52.13-2.74.31-6.26.78-8.87 2.74-2.61 1.95-2.61 5.61 0 3.04 1.87 4.57 1.87 1.52 4.92 1.52 4.17 0 7.43-1.44 3.27-1.43 6.4-3.78m.78 10.87-.87-4.78q-4.09 2.35-7.61 3.78-3.52 1.44-7.61 1.44-5.83 0-9.27-2.83t-3.44-9.35q0-3.39 1.74-5.92 1.74-2.52 4.57-4.22 2.83-1.69 6.4-2.65 3.56-.96 7.3-1.22 1.57-.17 4.09-.3 2.53-.13 3.92-.22 0-3.05-.18-5.44-.17-2.39-1.04-4.09-.87-1.69-2.57-2.56-1.69-.87-4.82-.87-2.53 0-4.88.3-2.35.31-4.17.65-2.18.44-4 .96l-1.4-6q2.18-.52 4.7-.96 2.18-.43 5.05-.74 2.87-.3 6.17-.3 4.44 0 7.18 1.3 2.74 1.31 4.27 3.52 1.52 2.22 2.08 5.05.57 2.83.57 5.96v20.88q0 1.22.04 2.57.05 1.35.18 2.65.13 1.31.3 2.7Zm18.52-.68V39.62q0-2-.43-6.26l6.44-.87.69 6.35h.09q1.56-2 3.04-3.48t3.09-2.57q1.61-1.08 3.09-1.08 2-.09 5.57.43l-1.57 6.7q-2.87-.52-4-.43-1.48 0-3.13 1.39t-2.87 2.96q-1.57 1.91-3.05 4.35v29.23Zm29.23-.01V11.16l6.96-.78v39.24l19.41-17.05h9.57l-18.97 16.61 19.66 27.15h-8.79l-16-22.71-4.88 4.26v18.45Zm114.804-21.195c-.31.28-.35.76-.1 1.09l2.29 2.64c.3.34.82.38 1.16.09l14.04-12.21c.34-.3.38-.83.08-1.17l-2.25-2.59a.83.83 0 0 0-1.16-.08c-4.69 4.07-9.37 8.15-14.06 12.23m-5.25-35.69-2.27-2.61a.84.84 0 0 0-1.1-.1c-4.6 4.15-9.56 8.08-14.1 12.27-.31.28-.35.76-.11 1.09l2.3 2.64c.29.34.82.38 1.16.08l14.04-12.2c.34-.3.38-.83.08-1.17m-.4 4.56-10.31 8.97 16.28 18.73c3.43-3 6.89-5.98 10.33-8.96-5.44-6.25-10.86-12.48-16.3-18.74m-2.46 21.59-3.15-3.62-28.72 24.98c-.63.54-.69 1.5-.15 2.12l1.17 1.35c.54.62 1.5.69 2.12.15Zm10.72-15.68 3.15 3.62.76-.66c.62-.54.69-1.5.15-2.12l-1.18-1.35c-.54-.62-1.5-.69-2.12-.15Zm24.98 44.78v-2.53a3.7 3.7 0 0 0-3.69-3.69h-24.61c-2.03 0-3.68 1.66-3.68 3.69v2.53Zm-34.56 2.37v4.79h37.13v-4.79Z"/></g><path fill="transparent" stroke="transparent" d="M729 0h542v98H729z"/></g></svg>            </svg>
            
        </a>
    </div>
    
    
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
      </button>
      
      <ul class="navbar-nav navbar-nav-right">
          <!-- Notifications -->
          <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="icon-bell mx-0"></i>
                  <span class="count"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                          <div class="preview-icon bg-success">
                              <i class="ti-info-alt mx-0"></i>
                          </div>
                      </div>
                      <div class="preview-item-content">
                          <h6 class="preview-subject font-weight-normal">Application Error</h6>
                          <p class="font-weight-light small-text mb-0 text-muted">
                              Just now
                          </p>
                      </div>
                  </a>
                  <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                          <div class="preview-icon bg-warning">
                              <i class="ti-settings mx-0"></i>
                          </div>
                      </div>
                      <div class="preview-item-content">
                          <h6 class="preview-subject font-weight-normal">Settings</h6>
                          <p class="font-weight-light small-text mb-0 text-muted">
                              Private message
                          </p>
                      </div>
                  </a>
                  <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                          <div class="preview-icon bg-info">
                              <i class="ti-user mx-0"></i>
                          </div>
                      </div>
                      <div class="preview-item-content">
                          <h6 class="preview-subject font-weight-normal">New user registration</h6>
                          <p class="font-weight-light small-text mb-0 text-muted">
                              2 days ago
                          </p>
                      </div>
                  </a>
              </div>
          </li>
          <!-- Profile -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="{{ asset(auth()->user()->profile_picture ?? 'images/Prof.jpg') }}" alt="profile" class="profile-img"/>
            </a>
            
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="{{ route('profile.edit') }}">
                      <i class="ti-settings text-primary"></i>
                      Settings
                  </a>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item">
                          <i class="ti-power-off text-primary"></i>
                          Logout
                      </button>
                  </form>
              </div>
          </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
      </button>
  </div>
</nav>
