<style>
    .footer-rights {
        color: #d4af37; 
        font-size: 14px;
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid #333;
        text-align: left;
        margin-left: 250px; 
    }
</style>

<!-- Footer Start -->
<div class="footer">
    <div class="container py-4">
        <div class="row">
            <!-- About Us Section -->
            <div class="col-md-4">
                <div class="footer-about">
                    <h2 class="mb-3">About Us</h2>
                    <p>
                        We provide a free legal consultation platform connecting clients with expert attorneys
                        across various fields. Our goal is to make legal guidance accessible and reliable,
                        ensuring everyone has access to trusted legal advice.
                    </p>
                </div>
            </div>

          <!-- Service Areas Section -->
<div class="col-md-4">
    <div class="footer-link">
        <h2 class="mb-3">Service Areas</h2>
        <ul class="list-unstyled">
            <li>
                <a href="{{ route('user.consultations.index') }}" class="dropdown-item">
                    All Consultations
                </a>
            </li>
            <li>
                <a href="{{ route('user.consultations.create') }}" class="dropdown-item">
                    Add Consultation
                </a>
            </li>
        </ul>
    </div>
</div>


            <!-- Useful Links Section -->
            <div class="col-md-4">
                <div class="footer-link">
                    <h2 class="mb-3">Useful Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('user.about') }}">About Us</a></li>
                        <li><a href="{{ route('user.consultations.index') }}">Consultations</a></li>
                        <li><a href="{{ route('user.contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('user.legal-library') }}">Legal Library</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Menu -->
    <div class="container footer-menu text-center py-2">
        <div class="f-menu">
            <a href="/terms">Terms of Use</a> |
            <a href="{{ route('user.privacy') }}">Privacy Policy</a>
            <a href="/cookies">Cookies</a> |
            <a href="{{ route('user.faq') }}">Help</a> 
        </div>
        <div class="text-center footer-rights mt-3">
            <p>© 2024 Mustashark. All rights reserved.</p>
        </div>
    </div>
</div>
<!-- Footer End -->
