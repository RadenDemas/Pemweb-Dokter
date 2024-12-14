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

    // Book Now button click handler
    const bookBtn = document.querySelector('.book-btn');
    bookBtn.addEventListener('click', () => {
        window.location.href = '/booking';
    });
});