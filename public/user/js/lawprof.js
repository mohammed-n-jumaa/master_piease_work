document.getElementById('appointment-button').addEventListener('click', function() {
    document.getElementById('profile-section').classList.remove('active');
    document.getElementById('appointment-section').classList.add('active');
    document.getElementById('reviews-section').classList.remove('active');
});

document.getElementById('reviews-button').addEventListener('click', function() {
    document.getElementById('profile-section').classList.remove('active');
    document.getElementById('reviews-section').classList.add('active');
    document.getElementById('appointment-section').classList.remove('active');
});

document.getElementById('profile-button').addEventListener('click', function() {
    document.getElementById('appointment-section').classList.remove('active');
    document.getElementById('reviews-section').classList.remove('active');
    document.getElementById('profile-section').classList.add('active');
});

$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        center: true,
        loop: true,
        margin: 20,
        nav: true,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 3,
            },
        },
    });
});
// JavaScript to dynamically update the form action with the correct appointment ID
const cancelModal = document.getElementById('cancelModal');
const cancelForm = document.getElementById('cancel-form');

cancelModal.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    // Extract the appointment ID from data attributes
    const appointmentId = button.getAttribute('data-appointment-id');

    // Update the form action with the correct URL
    const actionUrl = `{{ url('lawyer/appointments/cancel') }}/${appointmentId}`;
    cancelForm.action = actionUrl;
});
const buttons = document.querySelectorAll('.btn-group .btn');

buttons.forEach(button => {
button.addEventListener('click', () => {
// إزالة الكلاس 'active' من جميع الأزرار
buttons.forEach(btn => btn.classList.remove('active'));

// إضافة الكلاس 'active' للزر الذي تم الضغط عليه
button.classList.add('active');
});
});
window.onload = function() {
var currentTime = new Date().toTimeString().substr(0,5);
document.getElementById("appointment_time").setAttribute("min", currentTime);
};
function dismissAlert(alert) {
    alert.classList.add('fade-out');
    setTimeout(() => {
        alert.remove();
    }, 500);
}

// Auto-dismiss alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.custom-alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert && alert.parentElement) {
                dismissAlert(alert);
            }
        }, 5000);
    });
});