document.addEventListener('DOMContentLoaded', () => {
    const nameInput = document.getElementById('nama');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const updateBtn = document.getElementById('updateProfile');

    // Name validation
    nameInput.addEventListener('input', () => {
        const value = nameInput.value;
        const isValid = /^[A-Z][a-zA-Z\s]*$/.test(value);
        
        nameInput.classList.toggle('error', !isValid);
        document.getElementById('nama-error').style.display = isValid ? 'none' : 'block';
    });

    // Email validation
    emailInput.addEventListener('input', () => {
        const value = emailInput.value;
        const isValid = value.includes('@');
        
        emailInput.classList.toggle('error', !isValid);
        document.getElementById('email-error').style.display = isValid ? 'none' : 'block';
    });

    // Phone validation
    phoneInput.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, '');
        
        if (!value.startsWith('08')) {
            value = '08';
        }
        
        if (value.length > 13) {
            value = value.slice(0, 13);
        }
        
        phoneInput.value = value;
        const isValid = value.startsWith('08') && value.length >= 10;
        
        phoneInput.classList.toggle('error', !isValid);
        document.getElementById('phone-error').style.display = isValid ? 'none' : 'block';
    });

    // Toggle password visibility
    togglePassword.addEventListener('click', () => {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
        togglePassword.classList.toggle('bx-hide');
        togglePassword.classList.toggle('bx-show');
    });

    // Update profile
    updateBtn.addEventListener('click', (e) => {
        e.preventDefault();
        successAlert.show();
    });
});