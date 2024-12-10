// Mobile menu toggle
const menuIcon = document.querySelector('.menu-icon');
const navMenu = document.querySelector('.nav-menu');

menuIcon.addEventListener('click', () => {
  navMenu.classList.toggle('active');
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
  if (!navMenu.contains(e.target) && !menuIcon.contains(e.target)) {
    navMenu.classList.remove('active');
  }
});

// Smooth scroll for sections
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

// Intersection Observer for fade-in animation
const sections = document.querySelectorAll('section');
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = '1';
      entry.target.style.transform = 'translateY(0)';
    }
  });
}, observerOptions);

sections.forEach(section => {
  observer.observe(section);
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