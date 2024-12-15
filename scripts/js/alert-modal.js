document.addEventListener('DOMContentLoaded', () => {
    const logoutBtn = document.getElementById('logout-btn');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');
    const confirmLogout = document.getElementById('confirmLogout');
    const logoutAlert = document.getElementById('logoutAlert');

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === logoutModal) {
            logoutModal.classList.remove('active');
        }
    });

    // Close alert after animation
    const hideAlert = () => {
        logoutAlert.classList.remove('active');
    };

    // Show alert with countdown
    const showAlertWithCountdown = () => {
        logoutAlert.classList.add('active');
        setTimeout(hideAlert, 3000);
    };
});