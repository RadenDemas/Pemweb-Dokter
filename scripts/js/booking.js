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
  
    const bookingBtns = document.querySelectorAll('.booking-btn');
    bookingBtns.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            const bookingPages = [
                '../../pages/booking/per-booking/booking1/index.html',
                '../../pages/booking/per-booking/booking2/index.html',
                '../../pages/booking/per-booking/booking3/index.html'
            ];
            window.location.href = bookingPages[index];
        });
    });