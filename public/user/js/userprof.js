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
    function showSection(sectionId) {
        // Hide all forms
        document.querySelectorAll('.form-section').forEach(form => {
            form.classList.remove('active');
        });
        
        // Remove active class from all buttons
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('active');
        });
        
        // Show selected form
        document.getElementById(sectionId).classList.add('active');
        
        // Add active class to clicked button
        event.target.classList.add('active');
    }
  
// عند تحميل الصفحة لأول مرة، نضيف 962 إلى بداية الحقل إذا لم تكن موجودة
window.onload = function() {
    var phoneInput = document.getElementById('phone_number');
    
    if (!phoneInput.value.startsWith("962")) {
        phoneInput.value = "962"; // التأكد من أن الرقم يبدأ بـ "962"
    }
};

// دالة لتحديث الرقم والتحقق من أنه لا يتجاوز 9 أرقام بعد "962"
function validatePhoneNumber() {
    var phoneInput = document.getElementById('phone_number');
    var phoneError = document.getElementById('phone-error');
    var currentValue = phoneInput.value;
    var phoneValid = true;
    var errorMessages = [];

    // إذا كان الرقم يبدأ بـ "962"، نسمح فقط بـ 9 أرقام بعدها
    if (currentValue.startsWith("962")) {
        // تأكد من أن الرقم بعد 962 يتكون من 9 أرقام فقط
        if (currentValue.length > 12) {
            phoneInput.value = currentValue.slice(0, 12); // لا تسمح بإدخال أكثر من 12 رقمًا
        }
    } else {
        // إذا تم مسح "962" أو تعديلها، أعد القيمة إلى "962"
        phoneInput.value = "962";
    }

    // التحقق من أن رقم الهاتف يبدأ بـ "962"
    if (!phoneInput.value.startsWith("962")) {
        errorMessages.push("Phone number must start with 962.");
        phoneValid = false;
    }

    // التحقق من أن رقم الهاتف يحتوي على 12 رقمًا (962 + 9 أرقام)
    if (phoneInput.value.length !== 12) {
        errorMessages.push("Phone number must be exactly 12 digits.");
        phoneValid = false;
    }

    // إظهار رسائل الخطأ إذا كانت البيانات غير صحيحة
    if (!phoneValid) {
        phoneError.style.display = 'block';
        phoneError.innerHTML = errorMessages.join('<br>');
        phoneInput.classList.remove('is-valid');
        phoneInput.classList.add('is-invalid');
    } else {
        phoneError.style.display = 'none';
        phoneInput.classList.remove('is-invalid');
        phoneInput.classList.add('is-valid');
    }
}
  // تحقق من كلمة السر الجديدة في الوقت الفعلي
  document.getElementById('new_password').addEventListener('input', function() {
    validateNewPassword();
});

// تحقق من تطابق كلمة السر الجديدة مع التأكيد في الوقت الفعلي
document.getElementById('new_password_confirmation').addEventListener('input', function() {
    validatePasswordConfirmation();
});

// دالة للتحقق من كلمة السر الجديدة وفقاً لجميع الشروط
function validateNewPassword() {
    var password = document.getElementById('new_password').value;
    var passwordError = document.getElementById('password-error');
    var passwordValid = true;
    var errorMessages = [];

    // تحقق من أن كلمة السر تحتوي على حروف صغيرة (a-z)
    if (!/[a-z]/.test(password)) {
        errorMessages.push("Password must contain at least one lowercase letter.");
        passwordValid = false;
    }

    // تحقق من أن كلمة السر تحتوي على حروف كبيرة (A-Z)
    if (!/[A-Z]/.test(password)) {
        errorMessages.push("Password must contain at least one uppercase letter.");
        passwordValid = false;
    }

    // تحقق من أن كلمة السر تحتوي على أرقام (0-9)
    if (!/[0-9]/.test(password)) {
        errorMessages.push("Password must contain at least one number.");
        passwordValid = false;
    }

    // تحقق من أن كلمة السر تحتوي على أحرف خاصة (@$!%*?&)
    if (!/[@$!%*?&]/.test(password)) {
        errorMessages.push("Password must contain at least one special character (@$!%*?&).");
        passwordValid = false;
    }

    // تحقق من أن طول كلمة السر لا يقل عن 6 أحرف
    if (password.length < 6) {
        errorMessages.push("Password must be at least 6 characters long.");
        passwordValid = false;
    }

    // إظهار الرسائل إذا كانت كلمة السر غير صالحة
    if (!passwordValid) {
        passwordError.style.display = 'block';
        passwordError.innerHTML = errorMessages.join('<br>');
        document.getElementById('new_password').classList.remove('is-valid');
        document.getElementById('new_password').classList.add('is-invalid');
    } else {
        passwordError.style.display = 'none';
        document.getElementById('new_password').classList.remove('is-invalid');
        document.getElementById('new_password').classList.add('is-valid');
    }
}

// دالة للتحقق من تطابق كلمة السر المؤكدة
function validatePasswordConfirmation() {
    var password = document.getElementById('new_password').value;
    var confirmPassword = document.getElementById('new_password_confirmation').value;
    var confirmPasswordError = document.getElementById('confirm-password-error');

    if (confirmPassword === password) {
        confirmPasswordError.style.display = 'none';
        document.getElementById('new_password_confirmation').classList.remove('is-invalid');
        document.getElementById('new_password_confirmation').classList.add('is-valid');
    } else {
        confirmPasswordError.style.display = 'block';
        confirmPasswordError.innerText = 'Passwords do not match.';
        document.getElementById('new_password_confirmation').classList.remove('is-valid');
        document.getElementById('new_password_confirmation').classList.add('is-invalid');
    }
}