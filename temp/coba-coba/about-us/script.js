const hamburger = document.getElementById('hamburger-menu');
const navLinks = document.querySelector('.nav-links');
const logoutBtn = document.getElementById('logout-btn');
const modal = document.getElementById('logout-modal');
const cancelBtn = document.querySelector('.cancel-btn');
const confirmBtn = document.querySelector('.confirm-btn');
const alert = document.getElementById('alert');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

logoutBtn.addEventListener('click', () => {
    modal.style.display = 'flex';
});

cancelBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

confirmBtn.addEventListener('click', () => {
    // Show alert
    const alert = document.createElement('div');
    alert.className = 'alert';
    alert.textContent = 'Anda sudah berhasil Log out';
    document.body.appendChild(alert);

    // Animate alert
    setTimeout(() => {
        alert.style.top = '20px';
    }, 100);

    // Hide alert and redirect
    setTimeout(() => {
        alert.style.top = '-100px';
        setTimeout(() => {
            window.location.href = '../homepage/index.html';
        }, 300);
    }, 2000);

    modal.style.display = 'none';
});

// Smooth scroll for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
        navLinks.classList.remove('active');
    }
});