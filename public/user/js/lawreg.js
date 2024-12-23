  // Add required CSS styles
  const style = document.createElement('style');
  style.textContent = `
      .error-message {
          color: #dc2626;
          font-size: 0.875rem;
          position: absolute;
          top: 100%;
          left: 10px;
          display: flex;
          align-items: center;
          gap: 0.25rem;
          animation: fadeIn 0.3s ease-out;
          margin-top: 4px;
      }
      
      input.error, select.error {
          border-color: #dc2626 !important;
          background-color: #fef2f2 !important;
      }
      
      input.valid, select.valid {
          border-color: #16a34a !important;
          background-color: #f0fdf4 !important;
      }
  `;
  document.head.appendChild(style);

  // Validation rules matching LawyerRequest
  const validationRules = {
      first_name: {
          required: true,
          maxLength: 191,
          validate: (value) => {
              if (!value) return 'The first name is required.';
              if (value.length > 191) return 'The first name cannot exceed 191 characters.';
              return '';
          }
      },
      last_name: {
          required: true,
          maxLength: 191,
          validate: (value) => {
              if (!value) return 'The last name is required.';
              if (value.length > 191) return 'The last name cannot exceed 191 characters.';
              return '';
          }
      },
      email: {
          required: true,
          validate: (value) => {
              if (!value) return 'The email address is required.';
              if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) return 'Please enter a valid email address.';
              return '';
          }
      },
      phone_number: {
          required: true,
          validate: (value) => {
              if (!value) return 'The phone number is required.';
              if (!/^962[0-9]{9}$/.test(value)) return 'The phone number must start with 962 and have exactly 9 digits.';
              return '';
          }
      },
      password: {
          required: true,
          validate: (value) => {
              if (!value) return 'The password is required.';
              if (value.length < 8) return 'The password must be at least 8 characters.';
              if (!/[a-z]/.test(value)) return 'The password must include a lowercase letter.';
              if (!/[A-Z]/.test(value)) return 'The password must include an uppercase letter.';
              if (!/[0-9]/.test(value)) return 'The password must include a number.';
              if (!/[@$!%*?&]/.test(value)) return 'The password must include a special character.';
              return '';
          }
      },
      gender: {
          required: true,
          validate: (value) => {
              if (!value) return 'The gender is required.';
              if (!['male', 'female'].includes(value)) return 'Please select a valid gender.';
              return '';
          }
      },
      specialization: {
          validate: (value) => {
              if (value && value.length > 191) return 'The specialization cannot exceed 191 characters.';
              return '';
          }
      },
      date_of_birth: {
          required: true,
          validate: (value) => {
              if (!value) return 'The date of birth is required.';
              const age = new Date().getFullYear() - new Date(value).getFullYear();
              if (age < 18) return 'The lawyer must be at least 18 years old.';
              return '';
          }
      },
      lawyer_certificate: {
          required: true,
          validate: (input) => {
              if (!input.files || !input.files[0]) return 'The lawyer certificate is required.';
              const file = input.files[0];
              if (!file.type.startsWith('image/')) return 'The lawyer certificate must be an image.';
              if (file.size > 2 * 1024 * 1024) return 'The lawyer certificate must not exceed 2MB.';
              return '';
          }
      },
      syndicate_card: {
          required: true,
          validate: (input) => {
              if (!input.files || !input.files[0]) return 'The syndicate card is required.';
              const file = input.files[0];
              if (!file.type.startsWith('image/')) return 'The syndicate card must be an image.';
              if (file.size > 2 * 1024 * 1024) return 'The syndicate card must not exceed 2MB.';
              return '';
          }
      }
  };

  // Function to validate a single field
  function validateField(input) {
      const fieldName = input.name;
      const rules = validationRules[fieldName];
      
      // Remove existing error message
      const existingError = input.parentElement.querySelector('.error-message');
      if (existingError) {
          existingError.remove();
      }
      
      // Skip if no rules defined for this field
      if (!rules) return true;
      
      // Validate the field
      const errorMessage = rules.validate(input.type === 'file' ? input : input.value);
      
      if (errorMessage) {
          // Add error classes and message
          input.classList.add('error');
          input.classList.remove('valid');
          
          const errorDiv = document.createElement('div');
          errorDiv.className = 'error-message';
          errorDiv.innerHTML = `<i ></i> ${errorMessage}`;
          input.parentElement.appendChild(errorDiv);
          
          return false;
      } else {
          // Add valid class
          input.classList.remove('error');
          input.classList.add('valid');
          return true;
      }
  }

  // Add event listeners to all form inputs
  document.addEventListener('DOMContentLoaded', () => {
      const form = document.querySelector('form');
      const inputs = form.querySelectorAll('input, select');
      const phoneInput = document.querySelector('#phone_number');
      
      // Enforce the fixed "962" prefix for phone numbers
      phoneInput.addEventListener('input', () => {
          if (!phoneInput.value.startsWith('962')) {
              phoneInput.value = '962';
          }
          if (phoneInput.value.length > 12) {
              phoneInput.value = phoneInput.value.slice(0, 12);
          }
          phoneInput.value = phoneInput.value.replace(/[^0-9]/g, '');
      });

      inputs.forEach(input => {
          // Validate on blur
          input.addEventListener('blur', () => validateField(input));
          
          // Validate on input for non-file fields
          if (input.type !== 'file') {
              input.addEventListener('input', () => validateField(input));
          }
          
          // Special handling for file inputs
          if (input.type === 'file') {
              input.addEventListener('change', () => validateField(input));
          }
      });
      
      // Validate all fields on form submission
      form.addEventListener('submit', (e) => {
          let isValid = true;
          
          inputs.forEach(input => {
              if (!validateField(input)) {
                  isValid = false;
              }
          });
          
          if (!isValid) {
              e.preventDefault();
          }
      });
  });
  function highlightField(input, labelId) {
  const label = document.getElementById(labelId);
  const fileInputGroup = input.parentElement; // استهداف المجموعة

  // عند رفع الملف، تغيير النص إلى "File Uploaded"
  if (input.files && input.files[0]) {
      label.textContent = "File Uploaded";
      // إضافة الفئة highlight-success
      fileInputGroup.classList.add("highlight-success");
  } else {
      label.textContent = "Upload File";
      // إزالة الفئة highlight-success
      fileInputGroup.classList.remove("highlight-success");
  }
}