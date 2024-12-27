<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <title>Consultation Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Law Firm Website Template" name="keywords">
    <meta content="Law Firm Website Template" name="description"><link href="{{ asset('user/img/favicon.ico') }}" rel="icon">
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
       /* Form Controls */
.form-control {
    background: rgba(255,255,255,0.05);
    border: 1px solid var(--dark-gold);
    border-radius: 8px;
    color: white; /* هذا يجعل النص داخل textarea باللون الأبيض */
    padding: 1rem;
}

.form-control:focus {
    background: rgba(255,255,255,0.08);
    border-color: var(--gold);
    box-shadow: 0 0 15px rgba(170, 143, 97, 0.1);
    outline: none;
    color: white; /* للتأكد من أن النص يظل أبيض أثناء التركيز */
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
        .dropdown .btn-link i {
    color: #aa8f61 !important;
    
}
#confirmDeleteModal .modal-content {
    background-color: #1a1a1a;
    border-radius: 15px;
    border: 1px solid #aa8f61;
}

#confirmDeleteModal .modal-title {
    color: #aa8f61;
}

#confirmDeleteModal .btn {
    border-radius: 10px;
    padding: 10px 20px;
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

<!-- Toast Notification -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="toastMessage" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" style="opacity: 0.95;">
        <div class="d-flex">
            <div class="toast-body">
                Action completed successfully.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
  
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
        <div class="user-info">
            <div class="d-flex align-items-center gap-3 mb-3">
                <a href="{{ route('user.profile.show', $consultation->user_id) }}" class="text-decoration-none">
                    <img src="{{ $consultation->user->profile_picture ? asset($consultation->user->profile_picture) : asset('default-profile-picture.jpg') }}"
                         alt="User Profile" 
                         width="120" 
                         height="120" 
                         class="rounded-circle border border-2 border-gold"
                         style="border-color: #aa8f61 !important;"
                         onerror="this.onerror=null; this.src='https://www.w3schools.com/w3images/avatar2.png';">
                </a>
                <div>
                    <a href="{{ route('user.profile.show', $consultation->user_id) }}" class="text-decoration-none">
                        <h3 class="mb-0" style="color: #aa8f61;">{{ $consultation->user->name ?? 'Anonymous User' }}</h3>
                    </a>
                    <div class="consultation-category mt-2">
                        <i class="fas fa-folder me-2"></i>{{ $consultation->category->name ?? 'No Category' }}
                    </div>
                </div>
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
                        <button class="btn btn-link text-gold" type="button" data-bs-toggle="dropdown">
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
        <h5><i class="fas fa-plus-circle me-2" style="color:#aa8f61 "></i> <span style="color: #aa8f61;">Add a Comment</span></h5>
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
<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #1a1a1a; border-radius: 15px; border: 1px solid #aa8f61;">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="confirmDeleteLabel" style="color: #aa8f61;">DELETE COMMENT</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" style="color: #ffffff;">
                Are you sure you want to DELETE this COMMENT?
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #aa8f61; color: #ffffff; border-radius: 10px; padding: 10px 20px;">Close</button>
                <button type="button" class="btn" id="confirmDeleteButton" style="background-color: #aa8f61; color: #1a1a1a; border-radius: 10px; padding: 10px 20px;">Confirm DELETE</button>
            </div>
        </div>
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
    let commentToDeleteId;

    // إضافة تعليق
    $('#comment-form').on('submit', function (e) {
        e.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            url: '{{ route("user.comments.store") }}',
            type: 'POST',
            data: formData,
            success: function (response) {
                showToast('Comment added successfully!');
                location.reload(); // إعادة تحميل الصفحة لعرض التعليق الجديد
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                showToast('Error adding comment.', 'danger');
            }
        });
    });

    // حذف تعليق - عرض نافذة التأكيد
    $('.delete-comment').on('click', function (e) {
        e.preventDefault();
        commentToDeleteId = $(this).data('comment-id');
        $('#confirmDeleteModal').modal('show');
    });

    // تأكيد الحذف
    $('#confirmDeleteButton').on('click', function () {
        $.ajax({
            url: '{{ route("user.comments.delete") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                comment_id: commentToDeleteId
            },
            success: function (response) {
                $(`[data-comment-id="${commentToDeleteId}"]`).fadeOut(300, function () {
                    $(this).remove();
                });
                $('#confirmDeleteModal').modal('hide');
                showToast('Comment deleted successfully!', 'success', 5000);
            },
            error: function (xhr) {
                let errorMessage = xhr.responseJSON?.error || 'Error deleting comment.';
                showToast(errorMessage, 'danger', 5000);
            }
        });
    });

    // تعديل تعليق مباشرة داخل الحقل مع زر حفظ
    $('.edit-comment').on('click', function (e) {
        e.preventDefault();
        let commentId = $(this).data('comment-id');
        let commentElement = $(`[data-comment-id="${commentId}"]`).find('p');
        let currentContent = commentElement.text();

        // استبدال النص بحقل إدخال مع زر حفظ
        commentElement.replaceWith(`
            <div class="edit-container">
                <textarea class="form-control edit-input">${currentContent}</textarea>
                <button class="btn btn-sm btn-success save-edit" data-comment-id="${commentId}" style="margin-top: 5px;">Save</button>
            </div>
        `);

        // حفظ التعديل عند الضغط على زر حفظ
        $('.save-edit').on('click', function () {
            let newContent = $(this).siblings('.edit-input').val();
            let saveButton = $(this);

            $.ajax({
                url: '{{ route("user.comments.update") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    comment_id: commentId,
                    content: newContent
                },
                success: function (response) {
                    saveButton.closest('.edit-container').replaceWith(`<p>${newContent}</p>`);
                    showToast('Comment edited successfully!', 'success', 5000);
                },
                error: function () {
                    showToast('Error updating comment.', 'danger', 5000);
                }
            });
        });
    });

    // عرض المزيد من التعليقات
    $('#load-more-comments').on('click', function () {
        let offset = $(this).data('offset');
        let consultationId = $(this).data('id');

        $.ajax({
            url: '{{ route("user.comments.loadMore") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                offset: offset,
                consultation_id: consultationId
            },
            success: function (response) {
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

                    let newOffset = offset + response.comments.length;
                    $('#load-more-comments').data('offset', newOffset);

                    if ($('#comments-container .comment').length > 3) {
                        $('#show-less-comments').removeClass('d-none');
                    }
                } else {
                    $('#load-more-comments').hide();
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                showToast('Error loading comments.', 'danger', 5000);
            }
        });
    });

    // تقليل عدد التعليقات
    $('#show-less-comments').on('click', function () {
        let totalComments = $('#comments-container .comment').length;

        if (totalComments > 3) {
            $('#comments-container .comment').slice(3).remove();

            let newOffset = $('#load-more-comments').data('offset') - (totalComments - 3);
            $('#load-more-comments').data('offset', newOffset);
        }

        if ($('#comments-container .comment').length <= 3) {
            $(this).addClass('d-none');
        }

        $('#load-more-comments').removeClass('d-none');
    });

    // Toast Function
    function showToast(message, type = 'success', delay = 5000) {
        let toastElement = $(
            `<div class="toast align-items-center text-bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>`
        );

        $('.toast-container').append(toastElement);
        let toast = new bootstrap.Toast(toastElement[0], { delay: delay });
        toast.show();

        toastElement.on('hidden.bs.toast', function () {
            $(this).remove();
        });
    }

    // تعديل زر الحذف عند الهوفر
    $('#confirmDeleteButton').hover(
        function () {
            $(this).css({
                'background-color': 'red',
                'color': '#ffffff',
                'border': '2px solid red'
            });
        },
        function () {
            $(this).css({
                'background-color': '#aa8f61',
                'color': '#1a1a1a',
                'border': 'none'
            });
        }
    );
});

</script>
</html>