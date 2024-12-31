
    @include('layouts.User-Header')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="btn-group">
            <button class="btn active" id="profile-button">
                <i class="far fa-user"></i> Profile
            </button>
            <button class="btn" id="appointment-button">
                <i class="far fa-calendar-alt"></i> Add an appointment
            </button>
            <button class="btn" id="reviews-button">
                <i class="far fa-star"></i> Reviews
            </button>
        </div>
        <!-- Profile Section -->
        <div id="profile-section" class="content-section active">
            <div class="profile-card">
                <div class="header-banner"></div>
                <div class="profile-content">
                    <div class="profile-picture">
                        <img src="{{ $lawyer->profile_picture ? asset($lawyer->profile_picture) : asset('default-profile-picture.jpg') }}" alt="Profile Picture">
                    </div>
                    <div class="profile-info">
                        <h1 class="profile-name">{{ $lawyer->first_name . ' ' . $lawyer->last_name }}</h1>
                        <div class="lawyer-title">
                            <i class="fas fa-balance-scale"></i> Professional Lawyer
                        </div>

                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-envelope"></i> Email
                                </div>
                                <div class="info-value">{{ $lawyer->email }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-phone"></i> Phone
                                </div>
                                <div class="info-value">{{ $lawyer->phone_number }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-gavel"></i> Specialization
                                </div>
                                <div class="info-value">{{ $lawyer->category->name ?? 'Not Specified' }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-calendar"></i> Date of Birth
                                </div>
                                <div class="info-value">{{ \Carbon\Carbon::parse($lawyer->date_of_birth)->format('Y-m-d') }}</div>
                            </div>
                        </div>

                        <div class="document-section">
                            <h2 class="document-title">Professional Documents</h2>
                            <div class="document-grid">
                        
                                <!-- Lawyer Certificate -->
                                <div class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                    <h3 class="info-label">Lawyer Certificate</h3>
                                    <a href="{{ $lawyer->lawyer_certificate ? asset($lawyer->lawyer_certificate) : '#' }}" 
                                        class="document-link" target="_blank">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </div>
                        
                                <!-- Syndicate Card -->
                                <div class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <h3 class="info-label">Syndicate Card</h3>
                                    <a href="{{ $lawyer->syndicate_card ? asset($lawyer->syndicate_card) : '#' }}" 
                                        class="document-link" target="_blank">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>

                    <div class="actions">
                        @if(auth()->guard('lawyer')->check() && auth()->guard('lawyer')->user()->id === $lawyer->id)
                            <a href="{{ route('lawyer.profile.edit') }}" class="btn">
                                <i class="fas fa-edit"></i> Edit Profile
                            </a>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Appointments Section -->
        <div id="appointment-section" class="content-section">
           <!-- Available Appointments -->
<h2 class="section-title" style="color: #aa9166;">Available Appointments</h2>
@if (isset($appointments) && $appointments->count() > 0)
    <ul>
        @foreach ($appointments as $appointment)
            @if ($appointment->status === 'pending')
                <li class="appointment-item">
                    <div class="datetime-info">
                        <div class="date-time">
                            <div class="date">
                                <i class="fas fa-calendar-alt" style="color: #aa9166;"></i>
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}
                            </div>
                            <div class="time">
                                <i class="fas fa-clock" style="color: #aa9166;"></i>
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('H:i') }}
                            </div>
                        </div>
                    </div>
                    <!-- Check if the user is authenticated as a normal user -->
                    @if (auth()->guard('web')->check())
                        <form action="{{ route('appointments.book') }}" method="POST" style="display: inline-block;">
                            @csrf
                            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                            <button type="submit" class="book-button">Book Now</button>
                        </form>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
@else
    <p style="color: #aa9166;">No appointments available at the moment.</p>
@endif

            <!-- Confirmed Appointments (Visible to lawyers only) -->
            @if (auth()->guard('lawyer')->check())
                <h2 class="section-title" style="color: #aa9166;">Confirmed Appointments</h2>
                @if ($appointments->where('status', 'confirmed')->count() > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-calendar-alt" style="color: #aa9166;"></i> Date</th>
                                    <th><i class="fas fa-clock" style="color: #aa9166;"></i> Time</th>
                                    <th><i class="fas fa-user" style="color: #aa9166;"></i> Client Name</th>
                                    <th><i class="fas fa-phone" style="color: #aa9166;"></i> Client Phone</th>
                                    <th><i class="fas fa-times-circle" style="color: #aa9166;"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    @if ($appointment->status === 'confirmed')
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('H:i') }}
                                            </td>
                                            <td>{{ optional($appointment->user)->name ?? 'N/A' }}</td>
                                            <td>{{ optional($appointment->user)->phone_number ?? 'N/A' }}</td>
                                            <td>
                                                <!-- Cancel Button -->
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#cancelModal"
                                                    data-appointment-id="{{ $appointment->id }}">
                                                    Cancel
                                                </button>

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p style="color: #aa9166;">No confirmed appointments yet.</p>
                @endif
            @endif
            <!-- Cancel Modal -->
            <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="cancel-form" method="POST" action="">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="cancelModalLabel">Cancel Appointment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to cancel this appointment?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Confirm Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Add a New Appointment -->
            @if (auth()->guard('lawyer')->check())
                <h2 class="section-title" style="color: #aa9166;">Add a New Appointment</h2>
                <div class="form-container">
                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="appointment_date">Select Date</label>
                            <input type="date" id="appointment_date" name="appointment_date" class="form-control" required min="{{ \Carbon\Carbon::today()->toDateString() }}">

                        </div>
                        <div class="form-group">
                            <label for="appointment_time">Select Time</label>
                            <input type="time" id="appointment_time" name="appointment_time" class="form-control" required 
                            min="{{ \Carbon\Carbon::now()->format('H:i') }}">
                                             </div>
                        
                        <button type="submit" class="btn btn-primary">Add Appointment</button>
                    </form>
                </div>
            @endif

        </div>

        <!-- Reviews Section -->
        <div id="reviews-section" class="content-section">
            <h2 class="styled-title" style="color: #aa9166">Reviews</h2>
            <!-- Slider -->
            <div class="reviews-slider mt-5">
                <h2 class="section-title text-center" style="color: #aa9166;">What Clients Say</h2>
                <div class="reviews-container owl-carousel owl-theme">
                    @if ($approvedReviews && count($approvedReviews) > 0)
                        @foreach ($approvedReviews as $index => $review)
                            @php
                                $defaultImage = 'https://ui-avatars.com/api/?name=' . 
                                    urlencode($review->user->name) . 
                                    '&background=aa9166&color=fff';
                                $userImage = asset($review->user->profile_picture);
                            @endphp
                            <div class="review-slide text-center">
                                <div class="reviewer-image">
                                    <img src="{{ $review->user->profile_picture ? $userImage : $defaultImage }}"
                                        alt="{{ $review->user->name }}" class="rounded-circle"
                                        onerror="this.onerror=null; this.src='{{ $defaultImage }}';">
                                    <div class="rating-badge" style="background-color: #aa9166;">
                                        <span>{{ $review->rating }}★</span>
                                    </div>
                                </div>
                                <div class="review-content mt-3">
                                    <h3 class="reviewer-name" style="color: #aa9166;">{{ $review->user->name }}</h3>
                                    <p class="review-text" style="color: #aa9166;">{{ $review->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <p class="text-center text-muted" style="color: #aa9166 !important;">No reviews yet</p>
                    @endif
                </div>
            </div>
            @if (auth()->guard('web')->check())
                <!-- Add Review Form -->
                <h2 class="section-title" style="color: #aa9166;">Add a review</h2>
                <div class="form-container">
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lawyer_id" value="{{ $lawyer->id }}">

                        <div class="form-group">
                            <div class="form-group-header">
                                <i class="fas fa-star"></i>
                                <label class="form-label">Rating</label>
                            </div>
                            <div class="rating-container">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="rating-item">
                                        <input type="radio" id="rating-{{ $i }}" name="rating"
                                            value="{{ $i }}" required>
                                        <label for="rating-{{ $i }}">{{ $i }}</label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group-header">
                                <i class="fas fa-comment"></i>
                                <label class="form-label">Comment</label>
                            </div>
                            <textarea name="comment" class="form-control" rows="4" placeholder="اكتب تعليقك هنا..." required></textarea>
                        </div>

                        <button type="submit" class="submit-button">Post review</button>
                    </form>
                </div>
            @endif
          