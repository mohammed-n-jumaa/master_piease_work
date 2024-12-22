<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Consultation Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <!-- Favicon -->
  <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">
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
  
    <!-- Custom Style -->
    <style>
        body {
            background-color: #ffffff;
            color: #d4af37;
            font-family: 'Roboto', sans-serif;
        }
        .card {
            background-color: #1b1b1b;
            border: 1px solid #333;
            color: #d4af37;
            padding: 20px;
        }
        .comments-container .comment {
            border-bottom: 1px solid #333;
            margin-bottom: 10px;
            padding-bottom: 10px;
        }
        .load-more-btn {
            background-color: #d4af37;
            color: #1b1b1b;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .dropdown-toggle::after {
            display: none;
        }
        .comment {
    border-bottom: 1px solid #333;
    margin-bottom: 10px;
    padding-bottom: 10px;
    border: 1px solid #d4af37; 
    border-radius: 5px; 
    padding: 10px; 
}
    </style>
</head>
<body>
    @include('layouts.User-Header')

    <!-- Consultation Details -->
    <div class="container mt-5">
        <div class="card mb-4 text-center">
            <img src="{{ asset($consultation->user->image ?? 'user/img/default-user.jpg') }}" 
            onerror="this.onerror=null; this.src='https://www.w3schools.com/w3images/avatar2.png';" 
            alt="User profile picture" class="rounded-circle mb-3" style="width: 100px; height: 100px;">
                    <h3>{{ $consultation->user->name ?? 'Anonymous User' }}</h3>
            <p><strong>Category:</strong> {{ $consultation->category->name ?? 'No Category' }}</p>
            <p><strong>Consultation:</strong> {{ $consultation->content }}</p>
        </div>
    <!-- Comments Section -->
    <div class="comments-section">
        <h4>Comments ({{ $commentsCount }})</h4> <!-- إضافة عدد التعليقات -->
        <div id="comments-container">
            @foreach($comments as $comment)
            <div class="comment d-flex justify-content-between align-items-center" data-comment-id="{{ $comment->id }}">
                <div>
                    <strong>{{ $comment->user->name ?? 'Anonymous User' }}</strong>
                    <p>{{ $comment->content }}</p>
                </div>
                @if(auth()->id() == $comment->user_id)
                <div class="dropdown">
                    <button class="btn btn-link text-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="#" class="dropdown-item text-danger delete-comment" data-comment-id="{{ $comment->id }}">Delete Comment</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item text-warning edit-comment" data-comment-id="{{ $comment->id }}" data-content="{{ $comment->content }}">Edit Comment</a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
            @endforeach
        </div>
         <!-- Load More and Show Less Buttons -->
    @if($consultation->comments()->count() > 3)
    <div class="text-center mt-3">
        <button id="load-more-comments" class="load-more-btn" data-offset="3" data-id="{{ $consultation->id }}">
            Load More Comments
        </button>
        <button id="show-less-comments" class="load-more-btn d-none">
            Show Less Comments
        </button>
    </div>
    @endif
 <!-- Add Comment Form -->
 <div class="mt-4">
    <h5>Add a Comment</h5>
    <form id="comment-form" method="POST" action="{{ route('user.comments.store') }}">
        @csrf
        <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">
        <div class="mb-3">
            <textarea name="content" class="form-control" rows="3" placeholder="Write your comment here..." required></textarea>
        </div>
        <button type="submit" class="load-more-btn">Submit Comment</button>
    </form>
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
<script src="{{ asset('user/js/main.js') }}"></script>
<!-- Count Up Script -->
<script>
    $(document).ready(function () {
        let originalComments = $('#comments-container').html();

        // Load More Comments
        $('#load-more-comments').on('click', function () {
            const offset = $(this).data('offset');
            const consultationId = $(this).data('id');
            const button = $(this);

            $.ajax({
                url: `/comments/load/${consultationId}`,
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { offset: offset },
                success: function (data) {
                    if (data.length > 0) {
                        data.forEach(comment => {
                            if ($('#comments-container').find(`.comment[data-comment-id="${comment.id}"]`).length === 0) {
                                let deleteMenu = '';
                                let editMenu = '';

                                // إذا كان المستخدم يملك صلاحية حذف أو تعديل التعليق
                                if (comment.user_can_delete) {
                                    deleteMenu = `
                                        <div class="dropdown">
                                            <button class="btn btn-link text-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="#" class="dropdown-item text-danger delete-comment" data-comment-id="${comment.id}">
                                                        Delete Comment
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dropdown-item text-warning edit-comment" data-comment-id="${comment.id}" data-content="${comment.content}">
                                                        Edit Comment
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    `;
                                }

                                // إضافة التعليق إلى الصفحة
                                $('#comments-container').append(`
                                    <div class="comment d-flex justify-content-between align-items-center" data-comment-id="${comment.id}">
                                        <div>
                                            <strong>${comment.user.name ?? 'Anonymous User'}</strong>
                                            <p>${comment.content}</p>
                                        </div>
                                        ${deleteMenu}
                                    </div>
                                `);
                            }
                        });

                        button.data('offset', offset + 3);
                        if (data.length < 3) button.hide();
                        $('#show-less-comments').removeClass('d-none');
                    }
                }
            });
        });

        // Show Less Comments
        $('#show-less-comments').on('click', function () {
            $('#comments-container').html(originalComments);
            $('#load-more-comments').data('offset', 3).show();
            $(this).addClass('d-none');
        });

        // Delete Comment with SweetAlert2
        $(document).on('click', '.delete-comment', function (e) {
            e.preventDefault();
            const commentId = $(this).data('comment-id');
            const commentElement = $(this).closest('.comment');

            Swal.fire({
                title: 'Are you sure?',
                text: "This comment will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/comments/${commentId}`,
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success: function (response) {
                            if (response.success) {
                                commentElement.fadeOut('slow', function () {
                                    $(this).remove();
                                });
                                Swal.fire('Deleted!', 'Your comment has been deleted.', 'success');
                            }
                        }
                    });
                }
            });
        });

      // Edit Comment
$(document).on('click', '.edit-comment', function (e) {
    e.preventDefault();

    const commentId = $(this).data('comment-id');
    const currentContent = $(this).data('content');
    const commentElement = $(this).closest('.comment');

    // إزالة أي نموذج تعديل مفتوح مسبقًا
    $('.comment-edit-form').remove();
    $('.comment p').show(); // إعادة عرض النص الأصلي

    // إخفاء النص الأصلي وإظهار نموذج التعديل
    const editForm = `
        <div class="comment-edit-form">
            <textarea class="form-control" rows="2">${currentContent}</textarea>
            <button class="btn btn-primary mt-2 save-edited-comment" data-comment-id="${commentId}">Save Changes</button>
        </div>
    `;
    commentElement.find('p').hide(); // إخفاء النص الأصلي
    commentElement.find('div:first-child').append(editForm);
});

// Save Edited Comment
$(document).on('click', '.save-edited-comment', function () {
    const commentId = $(this).data('comment-id');
    const updatedContent = $(this).siblings('textarea').val();
    const commentElement = $(this).closest('.comment');

    $.ajax({
        url: `/comments/update/${commentId}`,
        method: 'PUT',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        data: { content: updatedContent },
        success: function (response) {
            if (response.success) {
                // تحديث النص المعروض
                commentElement.find('p').text(updatedContent).show();
                $('.comment-edit-form').remove(); // إزالة نموذج التعديل
                Swal.fire('Success', 'Your comment has been updated!', 'success');
            }
        },
        error: function () {
            Swal.fire('Error', 'Unable to update comment. Please try again.', 'error');
        }
    });
});


        // Save Edited Comment
        $(document).on('click', '.save-edited-comment', function () {
    const commentId = $(this).data('comment-id');
    const updatedContent = $(this).siblings('textarea').val();
    const commentElement = $(this).closest('.comment');

    $.ajax({
        url: `/comments/update/${commentId}`,
        method: 'PUT',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        data: { content: updatedContent },
        success: function (response) {
            if (response.success) {
                commentElement.find('p').text(response.comment.content).show();
                $('.comment-edit-form').remove();
                Swal.fire('Success', 'Your comment has been updated!', 'success');
            } else {
                Swal.fire('Error', 'Something went wrong.', 'error');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText); // Log any error messages
            Swal.fire('Error', 'Unable to update comment. Please try again.', 'error');
        }
    });
});


    });
</script>


</body>
</html>
