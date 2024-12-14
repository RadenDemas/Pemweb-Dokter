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

    // Print Booking Button
    const printBtn = document.querySelector('.print-btn');
    printBtn.addEventListener('click', () => {
        window.print();
    });

    // Home Button
    const homeBtn = document.querySelector('.home-btn');
    homeBtn.addEventListener('click', () => {
        window.location.href = 'beranda.html';
    });
});