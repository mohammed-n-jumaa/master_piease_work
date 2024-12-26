<!DOCTYPE html>
<html lang="en">
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

<head>
    <!-- [Previous head content remains the same] -->
    <style>
        :root {
            --gold: #aa8f61;
            --dark-gold: #8a7141;
            --light-gold: #d4c4a8;
            --dark: #1a1a1a;
            --light: #ffffff;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #0a0a0a;
            color: var(--light);
            line-height: 1.6;
            position: relative;
            overflow-x: hidden;
        }

        /* Header Section */
        .section-header {
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAEklEQVQImWNgYGD4z0AswK4SAFXuAf8EPy+xAAAAAElFTkSuQmCC') repeat;
            padding: 3rem 0;
            position: relative;
            margin-bottom: 2rem;
        }

        .section-header::before,
        .section-header::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, var(--gold) 50%, transparent 100%);
        }

        .section-header::before { top: 0; }
        .section-header::after { bottom: 0; }

        /* Main Content Section */
        .consultation-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .consultation-card {
            background: linear-gradient(145deg, #1c1c1c, #252525);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            border: 1px solid rgba(170, 143, 97, 0.1);
            margin-bottom: 2rem;
        }

        .user-profile {
            display: flex;
            align-items: flex-start;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .user-image {
            flex-shrink: 0;
        }

        .user-image img {
            width: 120px;
            height: 120px;
            border-radius: 15px;
            border: 2px solid var(--gold);
            object-fit: cover;
        }

        .user-info {
            flex-grow: 1;
        }

        .user-info h3 {
            color: var(--gold);
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .consultation-category {
            display: inline-block;
            background: rgba(170, 143, 97, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            color: var(--gold);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .consultation-content {
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            margin-top: 1rem;
            color: var(--light);
            line-height: 1.8;
        }

        /* Comments Section */
        .comments-section {
            background: linear-gradient(145deg, #1c1c1c, #252525);
            border-radius: 20px;
            padding: 2rem;
            margin-top: 2rem;
            border: 1px solid rgba(170, 143, 97, 0.1);
        }

        .comments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--dark-gold);
        }

        .comments-header h4 {
            color: var(--gold);
            margin: 0;
        }

        .comment {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid var(--dark-gold);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .comment:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .comment strong {
            color: var(--gold);
            display: block;
            margin-bottom: 0.5rem;
        }

        .comment p {
            color: var(--light);
            margin-bottom: 0;
        }

        /* Form Controls */
        .form-control {
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--dark-gold);
            border-radius: 8px;
            color: var(--light);
            padding: 1rem;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.08);
            border-color: var(--gold);
            box-shadow: 0 0 15px rgba(170, 143, 97, 0.1);
            outline: none;
        }

        /* Buttons */
        .custom-btn {
            background: linear-gradient(45deg, var(--dark-gold), var(--gold));
            color: var(--light);
            border: none;
            border-radius: 8px;
            padding: 0.8rem 2rem;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .custom-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(170, 143, 97, 0.3);
        }

        /* Dropdown Menu */
        .dropdown-menu {
            background: #1c1c1c;
            border: 1px solid var(--dark-gold);
        }

        .dropdown-item {
            color: var(--light);
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--dark-gold);
            color: var(--light);
        }

        .comment-form {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--dark-gold);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .user-profile {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .user-image {
                margin-bottom: 1rem;
            }

            .consultation-card,
            .comments-section {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    @include('layouts.User-Header')

    <!-- Page Header -->
    <div class="section-header text-center">
        <h2>Consultation Details</h2>
        <p>View and discuss the consultation</p>
    </div>

    <!-- Main Content -->
    <div class="consultation-container">
        <!-- Consultation Card -->
        <div class="consultation-card">
            <div class="user-profile">
                <div class="user-image">
                    <img src="{{ asset($consultation->user->image ?? 'user/img/default-user.jpg') }}" 
                         onerror="this.onerror=null; this.src='https://www.w3schools.com/w3images/avatar2.png';" 
                         alt="User profile picture">
                </div>
                <div class="user-info">
                    <h3>{{ $consultation->user->name ?? 'Anonymous User' }}</h3>
                    <div class="consultation-category">
                        <i class="fas fa-folder me-2"></i>{{ $consultation->category->name ?? 'No Category' }}
                    </div>
                    <div class="consultation-content">
                        {{ $consultation->content }}
                    </div>
                </div>
            </div>
        </div>

       <!-- Comments Section -->
<div class="comments-section">
    <div class="comments-header">
        <h4><i class="fas fa-comments me-2"></i>Comments ({{ $commentsCount }})</h4>
    </div>

    <div id="comments-container">
        @foreach($comments as $comment)
            <div class="comment d-flex justify-content-between align-items-start" data-comment-id="{{ $comment->id }}">
                <div>
                    <strong>
                        @if($comment->user_id)
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <a href="{{ route('user.profile.show', $comment->user_id) }}" class="text-decoration-none d-flex align-items-center gap-2">
                                <img src="{{ $comment->user->profile_picture ? asset($comment->user->profile_picture) : asset('default-profile-picture.jpg') }}"
                                     alt="User Profile" 
                                     width="40" 
                                     height="40" 
                                     class="rounded-circle">
                                <span style="color: #aa8f61">{{ $comment->user->name ?? 'Anonymous User' }}</span>
                            </a>
                        </div>
                    @elseif($comment->lawyer_id)
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <a href="{{ route('lawyer.profile.show', $comment->lawyer_id) }}" class="text-decoration-none d-flex align-items-center gap-2">
                                <img src="{{ $comment->lawyer->profile_picture ? asset($comment->lawyer->profile_picture) : asset('default-profile-picture.jpg') }}"
                                     alt="Lawyer Profile" 
                                     width="40" 
                                     height="40" 
                                     class="rounded-circle">
                                <span style="color: #aa8f61">{{ $comment->lawyer->full_name ?? 'Anonymous Lawyer' }}</span>
                            </a>
                        </div>
                    @endif
                    </strong>
                    
                    
                    <p>{{ $comment->content }}</p>
                </div>
                @if(
                    (auth('web')->check() && auth('web')->id() == $comment->user_id) || 
                    (auth('lawyer')->check() && auth('lawyer')->id() == $comment->lawyer_id)
                )
                    <div class="dropdown">
                        <button class="btn btn-link text-gold dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="#" class="dropdown-item edit-comment" data-comment-id="{{ $comment->id }}">
                                    <i class="fas fa-edit me-2"></i>Edit
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item text-danger delete-comment" data-comment-id="{{ $comment->id }}">
                                    <i class="fas fa-trash-alt me-2"></i>Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    

    @if($consultation->comments()->count() > 3)
        <div class="text-center mt-4">
            <button id="load-more-comments" class="custom-btn" data-offset="3" data-id="{{ $consultation->id }}">
                <i class="fas fa-sync me-2"></i>Load More Comments
            </button>
            <button id="show-less-comments" class="custom-btn d-none">
                <i class="fas fa-chevron-up me-2"></i>Show Less
            </button>
        </div>
    @endif

    <!-- Add Comment Form -->
    <div class="comment-form">
        <h5><i class="fas fa-plus-circle me-2"></i>Add a Comment</h5>
        <form id="comment-form" method="POST" action="{{ route('user.comments.store') }}">
            @csrf
            <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="3" placeholder="Share your thoughts..." required></textarea>
            </div>
            <button type="submit" class="custom-btn">
                <i class="fas fa-paper-plane me-2"></i>Submit Comment
            </button>
        </form>
    </div>
</div>

    </div>

    @include('layouts.User-Footer')

 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/lib/isotope/isotope.pkgd.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script></body>
<script>
    
    $(document).ready(function () {
        $('#comment-form').on('submit', function (e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: '{{ route("user.comments.store") }}',
        type: 'POST',
        data: formData,
        success: function (response) {
            alert('Comment added successfully!');
            location.reload(); // إعادة تحميل الصفحة لعرض التعليق الجديد
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('Error adding comment.');
        }
    });
});

    // حذف تعليق
    $('.delete-comment').on('click', function (e) {
    e.preventDefault();
    let commentId = $(this).data('comment-id');
    let commentElement = $(this).closest('.comment');

    $.ajax({
        url: '{{ route("user.comments.delete") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            comment_id: commentId
        },
        success: function (response) {
            commentElement.fadeOut(300, function () {
                $(this).remove();
            });
            alert(response.message);
        },
        error: function (xhr) {
            let errorMessage = xhr.responseJSON.error || 'Error deleting comment.';
            alert(errorMessage);
        }
    });
});


    // تعديل تعليق
    $('.dropdown-item').on('click', function (e) {
        e.preventDefault();
        let commentId = $(this).data('comment-id');
        let commentContent = $(this).closest('.comment').find('p').text();
        let newContent = prompt('Edit your comment:', commentContent);

        if (newContent) {
            $.ajax({
                url: '{{ route("user.comments.update") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    comment_id: commentId,
                    content: newContent
                },
                success: function (response) {
                    $(`[data-comment-id="${commentId}"]`).closest('.comment').find('p').text(response.content);
                    alert(response.message);
                },
                error: function () {
                    alert('Error updating comment.');
                }
            });
        }
    });

    // عرض المزيد من التعليقات
   // عرض المزيد من التعليقات
   $('#load-more-comments').on('click', function () {
        console.log('Load More button clicked'); // للتحقق من تنفيذ الحدث
        let offset = $(this).data('offset');
        let consultationId = $(this).data('id');

        $.ajax({
            url: '{{ route("user.comments.loadMore") }}', // تأكد أن الراوت صحيح
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                offset: offset,
                consultation_id: consultationId
            },
            success: function (response) {
                console.log(response); // عرض الرد القادم من السيرفر
                if (response.comments && response.comments.length > 0) {
                    response.comments.forEach(comment => {
                        $('#comments-container').append(`
                            <div class="comment d-flex justify-content-between align-items-start" data-comment-id="${comment.id}">
                                <div>
                                    <strong>${comment.user?.name ?? 'Anonymous User'}</strong>
                                    <p>${comment.content}</p>
                                </div>
                            </div>
                        `);
                    });

                    // تحديث قيمة الأوفست
                    let newOffset = offset + response.comments.length;
                    $('#load-more-comments').data('offset', newOffset);

                    // عرض زر "Show Less" إذا كان عدد التعليقات أكثر من 3
                    if ($('#comments-container .comment').length > 3) {
                        $('#show-less-comments').removeClass('d-none');
                    }
                } else {
                    console.log('No more comments to load.');
                    $('#load-more-comments').hide(); // إخفاء الزر إذا لم يعد هناك تعليقات
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText); // عرض أي خطأ في وحدة التحكم
                alert('Error loading comments.');
            }
        });
    });

    // تقليل عدد التعليقات
    $('#show-less-comments').on('click', function () {
        // عدد التعليقات الإجمالي الحالي
        let totalComments = $('#comments-container .comment').length;

        // التحقق إذا كان هناك أكثر من 3 تعليقات
        if (totalComments > 3) {
            // حذف التعليقات الزائدة والإبقاء على أول 3 تعليقات فقط
            $('#comments-container .comment').slice(3).remove();

            // تحديث قيمة الأوفست
            let newOffset = $('#load-more-comments').data('offset') - (totalComments - 3);
            $('#load-more-comments').data('offset', newOffset);
        }

        // إذا كان عدد التعليقات المتبقية أقل من أو يساوي 3، قم بإخفاء زر "Show Less"
        if ($('#comments-container .comment').length <= 3) {
            $(this).addClass('d-none'); // إخفاء زر "Show Less"
        }

        // إعادة عرض زر "Load More" إذا تم إخفاؤه
        $('#load-more-comments').removeClass('d-none');
    });
});

</script>
</html>