document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    const logoutBtn = document.getElementById('logout-btn');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');
    const confirmLogout = document.getElementById('confirmLogout');
    const logoutAlert = document.getElementById('logoutAlert');

    // Mendapatkan elemen tombol
    const loginButton = document.querySelector('.login-btn');

    // Menambahkan event listener untuk klik
    loginButton.addEventListener('click', function() {
        // Mengarahkan ke halaman lain
        window.location.href = '../sign-in/index.html';
        window.location.href = '../../pages/sign-in/index.html';
    });

    // Hamburger menu
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navLinks.classList.toggle('active');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
            hamburger.classList.remove('active');
            navLinks.classList.remove('active');
        }
    });

    // Logout functionality
    logoutBtn.addEventListener('click', (e) => {
        e.preventDefault();
        logoutModal.classList.add('active');
    });

    cancelLogout.addEventListener('click', () => {
        logoutModal.classList.remove('active');
    });

    confirmLogout.addEventListener('click', () => {
        logoutModal.classList.remove('active');
        logoutAlert.classList.add('active');
        
        let countdown = 3;
        const countdownElement = logoutAlert.querySelector('.countdown');
        
        const timer = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            
            if (countdown <= 0) {
                clearInterval(timer);
                window.location.href = 'index.html';
            }
        }, 1000);
    });
});