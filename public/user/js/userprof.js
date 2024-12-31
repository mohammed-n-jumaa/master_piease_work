       // Function to switch sections
       function switchSection(sectionId) {
        // Remove 'active' class from all sections
        document.querySelectorAll('.content-section').forEach(function(section) {
            section.classList.remove('active');
        });

        // Add 'active' class to the targeted section
        const targetSection = document.getElementById(sectionId);
        if (targetSection) {
            targetSection.classList.add('active');
        }
    }

    // Add event listeners to buttons if they exist
    const profileButton = document.getElementById('profile-button');
    if (profileButton) {
        profileButton.addEventListener('click', function() {
            switchSection('profile-section');
        });
    }

    const appointmentsButton = document.getElementById('appointments-button');
    if (appointmentsButton) {
        appointmentsButton.addEventListener('click', function() {
            switchSection('appointments-section');
        });
    }

    const consultationsButton = document.getElementById('consultations-button');
    if (consultationsButton) {
        consultationsButton.addEventListener('click', function() {
            switchSection('consultations-section');
        });
    }

    // Highlight the active button and switch sections accordingly
    const buttons = document.querySelectorAll('.btn-group .btn');
    const sections = document.querySelectorAll('.content-section');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove 'active' class from all buttons
            buttons.forEach(btn => btn.classList.remove('active'));

            // Add 'active' class to the clicked button
            button.classList.add('active');

            // Switch to the corresponding section
            const sectionId = button.id.replace('-button', '-section');
            sections.forEach(section => section.classList.remove('active'));
            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.classList.add('active');
            }
        });
    });
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