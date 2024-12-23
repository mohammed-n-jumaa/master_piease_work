   // تحديد جميع حقول الإدخال
   const inputs = document.querySelectorAll('input:not([type="file"])');
    
   // إضافة نمط CSS للأخطاء
   const style = document.createElement('style');
   style.textContent = `
       .error-message {
           color: #dc2626;
           font-size: 0.875rem;
           margin-top: 0.25rem;
           display: flex;
           align-items: center;
           gap: 0.25rem;
       }
       
       input.error {
           border-color: #dc2626 !important;
           background-color: #fef2f2 !important;
       }
       
       input.valid {
           border-color: #16a34a !important;
           background-color: #f0fdf4 !important;
       }
   `;
   document.head.appendChild(style);

   // دالة التحقق من الحقول
   function validateField(input) {
       const name = input.name;
       const value = input.value;
       let error = '';

       // إزالة رسالة الخطأ السابقة إن وجدت
       const existingError = input.parentElement.querySelector('.error-message');
       if (existingError) {
           existingError.remove();
       }

       // التحقق حسب نوع الحقل
       switch (name) {
           case 'name':
               if (!value) {
                   error = 'Name required';
               } else if (value.length > 255) {
                   error = 'Name cannot exceed 255 characters';
               }
               break;

           case 'email':
               if (!value) {
                   error = 'Email required';
               } else if (!/\S+@\S+\.\S+/.test(value)) {
                   error = 'Invalid email';
               }
               break;

           case 'password':
               if (!value) {
                   error = 'Password required';
               } else if (value.length < 8) {
                   error = 'Password must be at least 8 characters long';
               } else if (!/[A-Z]/.test(value)) {
                   error = 'Password must contain a capital letter';
               } else if (!/[a-z]/.test(value)) {
                   error = 'Password must contain lowercase letter';
               } else if (!/[0-9]/.test(value)) {
                   error = 'Password must contain a number';
               } else if (!/[!@#$%^&*]/.test(value)) {
                   error = 'Password must contain a special character';
               }
               break;

           case 'phone_number':
               if (!value.startsWith("962")) {
                   input.value = "962"; // تثبيت 962 في البداية
               }
               if (value.length > 12) {
                   input.value = value.slice(0, 12); // تقصير الطول إلى 12 رقمًا
               }
               if (!/^\d{12}$/.test(input.value)) {
                   error = 'Phone number must start with 962 and have exactly 9 digits after it';
               }
               break;

           case 'date_of_birth':
               if (!value) {
                   error = 'Date of birth required';
               } else {
                   const age = new Date().getFullYear() - new Date(value).getFullYear();
                   if (age < 18) {
                       error = 'You must be at least 18 years old';
                   }
               }
               break;
       }

       // إضافة أو إزالة classes للتنسيق
       if (error) {
           input.classList.add('error');
           input.classList.remove('valid');

           // إنشاء وإضافة رسالة الخطأ
           const errorDiv = document.createElement('div');
           errorDiv.className = 'error-message';
           errorDiv.innerHTML = `<i></i> ${error}`;
           input.parentElement.appendChild(errorDiv);
       } else {
           input.classList.remove('error');
           input.classList.add('valid');
       }

       return !error;
   }

   // إضافة مستمعي الأحداث لجميع الحقول
   inputs.forEach(input => {
       input.addEventListener('input', () => validateField(input));
       input.addEventListener('blur', () => validateField(input));
   });

   // التحقق من النموذج عند الإرسال
   document.querySelector('form').addEventListener('submit', function (e) {
       let isValid = true;

       // التحقق من جميع الحقول قبل الإرسال
       inputs.forEach(input => {
           if (!validateField(input)) {
               isValid = false;
           }
       });

       // منع إرسال النموذج إذا كان هناك أخطاء
       if (!isValid) {
           e.preventDefault();
       }
   });