document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signupForm');
    const nameInput = document.getElementById('nama');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const phoneInput = document.getElementById('phone');
    const togglePassword = document.querySelector('.toggle-password');

    // Password visibility toggle
    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    // Name validation
    nameInput.addEventListener('input', function() {
        const namePattern = /^([A-Z][a-z]*)(\s[A-Z][a-z]*)*$/;
        const errorElement = this.nextElementSibling;
        
        if (!namePattern.test(this.value)) {
            this.classList.add('error');
            errorElement.style.display = 'block';
            errorElement.textContent = 'Setiap nama harus diawali dengan huruf kapital dan tidak boleh mengandung karakter lain 3,./@[]-_';
            showAlert('Harap isi nama sesuai dengan ketentuan');
        } else {
            this.classList.remove('error');
            errorElement.style.display = 'none';
        }
    });

    // Email validation
    emailInput.addEventListener('input', function() {
        const errorElement = this.nextElementSibling;
        if (!this.value.includes('@')) {
            this.classList.add('error');
            errorElement.style.display = 'block';
            errorElement.textContent = 'Email harus mengandung @';
        } else {
            this.classList.remove('error');
            errorElement.style.display = 'none';
        }
    });

    // Phone number validation
    phoneInput.addEventListener('input', function() {
        const phonePattern = /^08\d{8,11}$/;
        const errorElement = this.nextElementSibling;
        
        // Remove non-numeric characters
        this.value = this.value.replace(/\D/g, '');
        
        if (!phonePattern.test(this.value)) {
            this.classList.add('error');
            errorElement.style.display = 'block';
            errorElement.textContent = 'Nomor handphone harus diawali dengan 08 dan min 10 digit';
            showAlert('Harap isi nomor handphone sesuai dengan ketentuan');
        } else {
            this.classList.remove('error');
            errorElement.style.display = 'none';
        }
    });

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate all required fields
        const inputs = form.querySelectorAll('input[required], select[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value) {
                input.classList.add('error');
                isValid = false;
            }
        });

        if (isValid) {
            // Redirect to homepage
            window.location.href = 'homepage.html';
        }
    });

    // Alert function
    function showAlert(message) {
        const alert = document.createElement('div');
        alert.className = 'alert';
        alert.textContent = message;
        
        // Style the alert
        alert.style.position = 'fixed';
        alert.style.top = '20px';
        alert.style.left = '50%';
        alert.style.transform = 'translateX(-50%)';
        alert.style.padding = '1rem 2rem';
        alert.style.backgroundColor = '#dc3545';
        alert.style.color = 'white';
        alert.style.borderRadius = '4px';
        alert.style.zIndex = '1000';
        
        document.body.appendChild(alert);
        
        // Remove alert after 3 seconds
        setTimeout(() => {
            alert.remove();
        }, 3000);
    }
});