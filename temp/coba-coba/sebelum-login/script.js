document.addEventListener('DOMContentLoaded', () => {
  // Mobile menu toggle
  const menuBtn = document.getElementById('menuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  let isMenuOpen = false;

  menuBtn.addEventListener('click', () => {
      isMenuOpen = !isMenuOpen;
      mobileMenu.classList.toggle('active');
      menuBtn.innerHTML = isMenuOpen 
          ? '<img src="https://raw.githubusercontent.com/lucide-icons/lucide/main/icons/x.svg" alt="Close" class="menu-icon">'
          : '<img src="https://raw.githubusercontent.com/lucide-icons/lucide/main/icons/menu.svg" alt="Menu" class="menu-icon">';
  });

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
  if (!navMenu.contains(e.target) && !menuIcon.contains(e.target)) {
    navMenu.classList.remove('active');
  }
});

  // Close mobile menu when clicking on a menu item
  mobileMenu.addEventListener('click', (e) => {
    if (e.target.tagName === 'A') {
      mobileMenu.classList.remove('active');
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
      entry.target.classList.add('fade-in');
    }
  });
}, observerOptions);

sections.forEach(section => {
  section.style.opacity = '0';
  section.style.transform = 'translateY(20px)';  
  observer.observe(section);
  });
});