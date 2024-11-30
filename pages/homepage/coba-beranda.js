document.querySelector('.info-selengkapnya').addEventListener('click', function() {
    window.location.href = '#about-us';
});

document.querySelector('.baca-selengkapnya').addEventListener('click', function() {
    window.location.href = '#about-us';
});

const profileButtons = document.querySelectorAll('.lihat-profil');
profileButtons.forEach((button, index) => {
    button.addEventListener('click', function() {
        window.location.href = `#dokter${index + 1}`;
    });
});

const articleButtons = document.querySelectorAll('.artikel-button');
articleButtons.forEach((button, index) => {
    button.addEventListener('click', function() {
        window.location.href = `#artikel${index + 1}`;
    });
});