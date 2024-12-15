const navigateButton = document.getElementById('navigate-button');

const urls = [
    '../../pages/artikel/per-artikel/artikel1/index.html',
    '../../pages/artikel/per-artikel/artikel2/index.html',
    '../../pages/artikel/per-artikel/artikel3/index.html'
];

let currentArticleIndex = 0;

navigateButton.addEventListener('click', function() {
    window.location.href = urls[currentArticleIndex];
    
    currentArticleIndex = (currentArticleIndex + 1) % urls.length;
});

const infoButton = document.querySelector('.info-btn');

infoButton.addEventListener('click', function() {

    window.location.href = 'halaman-info.html';
});