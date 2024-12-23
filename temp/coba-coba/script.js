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

  // Date and Time data
  const dates = [
      { date: 'Kam, 5 Des', available: false },
      { date: 'Jum, 6 Des', available: true },
      { date: 'Sab, 7 Des', available: false },
      { date: 'Min, 8 Des', available: true },
      { date: 'Sen, 9 Des', available: false },
      { date: 'Sel, 10 Des', available: true },
      { date: 'Rab, 11 Des', available: false }
  ];

  const times = [
      { time: '08.00 - 09.00', available: true },
      { time: '09.00 - 10.00', available: false },
      { time: '10.00 - 11.00', available: false },
      { time: '11.00 - 12.00', available: true }
  ];

  let selectedDate = 'Jum, 6 Des';
  let selectedTime = '08.00 - 09.00';

  // Render date buttons
  const dateButtons = document.getElementById('dateButtons');
  dates.forEach(({ date, available }) => {
      const button = document.createElement('button');
      button.textContent = date;
      button.className = `date-btn ${available ? 'available' : 'unavailable'} ${date === selectedDate ? 'selected' : ''}`;
      
      if (available) {
          button.addEventListener('click', () => {
              document.querySelectorAll('.date-btn').forEach(btn => btn.classList.remove('selected'));
              button.classList.add('selected');
              selectedDate = date;
          });
      }
      
      dateButtons.appendChild(button);
  });

  // Render time buttons
  const timeButtons = document.getElementById('timeButtons');
  times.forEach(({ time, available }) => {
      const button = document.createElement('button');
      button.textContent = time;
      button.className = `time-btn ${available ? 'available' : 'unavailable'} ${time === selectedTime ? 'selected' : ''}`;
      
      if (available) {
          button.addEventListener('click', () => {
              document.querySelectorAll('.time-btn').forEach(btn => btn.classList.remove('selected'));
              button.classList.add('selected');
              selectedTime = time;
          });
      }
      
      timeButtons.appendChild(button);
  });
});