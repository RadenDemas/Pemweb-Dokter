document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('editForm');
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    // Toggle password visibility
    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePassword.querySelector('img').src = type === 'password' ? 'eye-icon.svg' : 'eye-off-icon.svg';
    });

    // Form validation
    function validateForm() {
        let isValid = true;

        // Validate name
        const nama = document.getElementById('nama');
        if (!/^[A-Z][a-zA-Z\s]*$/.test(nama.value)) {
            document.getElementById('nama-error').textContent = 'Setiap nama harus diawali dengan huruf kapital dan hanya mengandung huruf';
            document.getElementById('nama-error').style.display = 'block';
            nama.classList.add('error');
            isValid = false;
        }

        // Validate email
        const email = document.getElementById('email');
        if (!email.value.includes('@')) {
            document.getElementById('email-error').textContent = 'Email harus mengandung @';
            document.getElementById('email-error').style.display = 'block';
            email.classList.add('error');
            isValid = false;
        }

        // Validate phone
        const phone = document.getElementById('noHandphone');
        if (!/^08\d{8,11}$/.test(phone.value)) {
            document.getElementById('phone-error').textContent = 'Nomor handphone harus diawali dengan 08 dan min 10 digit';
            document.getElementById('phone-error').style.display = 'block';
            phone.classList.add('error');
            isValid = false;
        }

        return isValid;
    }

    // Handle form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Reset previous errors
        document.querySelectorAll('.error-message').forEach(msg => msg.style.display = 'none');
        document.querySelectorAll('.form-input').forEach(input => input.classList.remove('error'));

        if (validateForm()) {
            // Show success alert
            const alert = document.getElementById('alert');
            alert.style.display = 'block';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 3000);
        }
    });
});