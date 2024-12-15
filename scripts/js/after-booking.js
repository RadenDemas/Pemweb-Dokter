document.addEventListener('DOMContentLoaded', () => {
    // Print Booking Button
    const printBtn = document.querySelector('.print-btn');
    printBtn.addEventListener('click', () => {
        window.print();
    });

    // Home Button
    const homeBtn = document.querySelector('.home-btn');
    homeBtn.addEventListener('click', () => {
        window.location.href = '../../pages/homepage/index.html';
    });
});