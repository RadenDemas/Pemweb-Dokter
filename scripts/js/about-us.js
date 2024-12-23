const hamburger = document.getElementById('hamburger-menu');
const navLinks = document.querySelector('.nav-links');
const logoutBtn = document.getElementById('login-btn');
const modal = document.getElementById('logout-modal');
const cancelBtn = document.querySelector('.cancel-btn');
const confirmBtn = document.querySelector('.confirm-btn');
const alert = document.getElementById('alert');

// Toggle mobile menu
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

// Logout functionality
loginBtn.addEventListener('click', () => {
    modal.style.display = 'flex';
});

cancelBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Show alert and handle logout
function showLogoutAlert() {
    return new Promise((resolve) => {
        const alert = document.createElement('div');
        alert.className = 'alert';
        alert.textContent = 'Anda sudah berhasil Log out';
        alert.style.opacity = '0';
        alert.style.transition = 'opacity 0.3s ease-in-out';
        document.body.appendChild(alert);

        // Fade in
        setTimeout(() => {
            alert.style.opacity = '1';
        }, 100);

        // Wait for 3 seconds then fade out
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
                resolve();
            }, 300);
        }, 3000);
    });
}

// Handle confirm logout
confirmBtn.addEventListener('click', async () => {
    modal.style.display = 'none';
    
    // Show alert and wait for it to complete
    await showLogoutAlert();
    
    // After alert is done, redirect
    window.location.href = '../homepage/index.html';
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

// Profile dropdown functionality
const profileBtn = document.querySelector('.profile-btn');
const profileDropdown = document.querySelector('.profile-dropdown');

profileBtn.addEventListener('mouseenter', () => {
  profileDropdown.style.display = 'block';
});

profileBtn.addEventListener('mouseleave', () => {
  setTimeout(() => {
    if (!profileDropdown.matches(':hover')) {
      profileDropdown.style.display = 'none';
    }
  }, 100);
});

profileDropdown.addEventListener('mouseleave', () => {
  profileDropdown.style.display = 'none';
});

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("login-btn").addEventListener("click", function() {
        window.location.href = '../sign-in/index.html';
    });
});