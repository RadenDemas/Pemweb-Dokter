// DOM Elements
const hamburger = document.getElementById('hamburger-menu');
const navLinks = document.querySelector('.nav-links');
const logoutBtn = document.getElementById('logout-btn');
const modal = document.getElementById('logout-modal');
const cancelBtn = document.querySelector('.cancel-btn');
const confirmBtn = document.querySelector('.confirm-btn');
const alert = document.getElementById('alert');
const searchInput = document.getElementById('search-input');
const searchDropdown = document.getElementById('search-dropdown');
const articlesContainer = document.querySelector('.articles-container');

// Sample article data
const articles = [
    {
        title: 'Potret Diabetes di RI dari Tahun ke Tahun, Angkanya Terus Naik',
        date: '18 November 2024',
        readTime: '3 menit waktu baca',
        image: 'https://example.com/diabetes.jpg'
    },
    {
        title: 'Telinga Sakit Bagian Dalam? Kenali Penyebab dan Penanganannya!',
        date: '15 November 2024',
        readTime: '5 menit waktu baca',
        image: 'https://example.com/ear.jpg'
    },
    // Add more articles as needed
];

// Toggle mobile menu
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

// Logout functionality
logoutBtn.addEventListener('click', () => {
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

// Search functionality
searchInput.addEventListener('input', (e) => {
    const value = e.target.value.toLowerCase();
    if (value.length >= 3) {
        const filteredArticles = articles.filter(article => 
            article.title.toLowerCase().includes(value)
        );
        showSearchResults(filteredArticles);
    } else {
        searchDropdown.style.display = 'none';
    }
});

function showSearchResults(results) {
    searchDropdown.innerHTML = '';
    if (results.length > 0) {
        results.forEach(result => {
            const div = document.createElement('div');
            div.className = 'search-result';
            div.textContent = result.title;
            div.addEventListener('click', () => {
                searchInput.value = result.title;
                searchDropdown.style.display = 'none';
            });
            searchDropdown.appendChild(div);
        });
        searchDropdown.style.display = 'block';
    } else {
        searchDropdown.style.display = 'none';
    }
}

// Render articles
function renderArticles() {
    articlesContainer.innerHTML = articles.map(article => `
        <div class="article-card">
            <img src="${article.image}" alt="${article.title}">
            <div class="article-content">
                <h3>${article.title}</h3>
                <p>${article.date} • ${article.readTime}</p>
                <button class="lihat-artikel">Lihat Artikel</button>
            </div>
        </div>
    `).join('');
}

// Initialize the page
renderArticles();