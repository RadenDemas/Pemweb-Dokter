<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../pages/about-us/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src="../Assets/logo rumah sakit.svg" alt="Klinik Pelita Harapan">
    </div>
    <div class="nav-links">
        <a href="#home" class="active">Home</a>
        <a href="#about">About Us</a>
        <a href="#dokter">Dokter</a>
        <a href="#booking">Booking</a>
        <a href="#artikel">Artikel</a>
        <a href="#kontak">Kontak</a>
    </div>
    <div class="nav-buttons">
        <button class="hamburger" id="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a href="/profile" class="profile-icon">
            <img src="../Assets/profile_icon.svg" alt="Profile">
        </a>
        <button class="logout-btn" id="logout-btn">Log Out</button>
    </div>
</nav>
<main>
    <section class="about-us">
        <h1>About Us</h1>

        <!-- Top section with image and description -->
        <div class="top-content">
            <div class="image-section">
                <img src="../Assets/rumah sakit.jpg" alt="Klinik Pelita Harapan Building">
            </div>
            <div class="description-section">
                <p>Klinik Pelita Harapan hadir untuk menjadi pelita harapan bagi kesehatan Anda. Kami berkomitmen untuk memberikan layanan kesehatan kelas dunia dengan mengutamakan kenyamanan, kepercayaan, dan kepuasan pasien.</p>
                <p>Sebagai penyedia layanan kesehatan terdepan, kami menggabungkan teknologi modern dengan pendekatan yang penuh kasih. Tim medis kami yang profesional siap melayani Anda dengan solusi kesehatan yang menyeluruh, mulai dari diagnosis akurat hingga perawatan yang dipersonalisasi sesuai kebutuhan Anda.</p>
            </div>
        </div>

        <!-- Bottom section with mission and vision -->
        <div class="bottom-content">
            <div class="vision-mission">
                <h2>Misi:</h2>
                <p>Membawa harapan dan kehidupan yang lebih baik bagi setiap pasien melalui layanan kesehatan yang unggul, berlandaskan empati dan inovasi.</p>

                <h2>Visi:</h2>
                <p>Menjadi klinik terkemuka yang menginspirasi perubahan positif melalui pelayanan kesehatan berkualitas, teknologi terkini, dan kepedulian yang tulus.</p>

                <h2>Nilai-Nilai Kami:</h2>
                <ol>
                    <li>Kepedulian: Memberikan perhatian terbaik bagi pasien dan keluarga mereka, memastikan kenyamanan di setiap langkah perjalanan kesehatan.</li>
                    <li>Keunggulan: Menjunjung tinggi standar mutu layanan untuk hasil perawatan yang maksimal.</li>
                    <li>Integritas: Bekerja secara transparan dan etis dalam setiap aspek pelayanan kami.</li>
                    <li>Kolaborasi: Membangun kerja sama yang erat antara tenaga medis, pasien, dan komunitas untuk menciptakan kesehatan yang lebih baik.</li>
                </ol>

                <p>Di Klinik Pelita Harapan, kami hadir untuk menyalakan semangat dan harapan baru bagi kesehatan Anda.</p>
                <p class="tagline"><strong>Kesehatan Anda, Prioritas Kami.</strong></p>
            </div>
        </div>
    </section>
</main>
<footer>
    <div class="footer-content">
        <div class="footer-left">
            <img src="../Assets/logo rumah sakit.svg" alt="Klinik Logo" class="logo-footer">
            <p>Jl. Cahaya Sejahtera</p>
            <p>No. 88, Harapan Indah,</p>
            <p>Kec. Mentari Baru,</p>
            <p>Jakarta</p>
        </div>
        <div class="footer-right">
            <h3>Hubungi Kami</h3>
            <div class="contact-details">
                <div class="contact-item">
                    <img src="../Assets/logo ambulan.svg" alt="ambulan">
                    <div>
                        <p>Ambulans & Gawat Darurat 0266 666 0 000</p>
                    </div>
                </div>

                <div class="contact-item">
                    <img src="../Assets/logo telpon.svg" alt="telepon">
                    <div>
                        <p>Pusat Panggilan 0255 555 0 000</p>
                    </div>
                </div>

                <div class="contact-item">
                    <img src="../Assets/logo whatsapp.svg" alt="whatsapp">
                    <div>
                        <p>Whatsapp 628888888888</p>
                    </div>
                </div>

                <div class="contact-item">
                    <img src="../Assets/logo email.svg" alt="email">
                    <div>
                        <p>infohospital@pelitaharapan.co.id</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

<!-- Logout Modal -->
<div class="modal" id="logout-modal">
    <div class="modal-content">
        <p>Yakin ingin Log out dari akun ini?</p>
        <div class="modal-buttons">
            <button class="cancel-btn">Batal</button>
            <a href="../homepage/index.html" class="confirm-btn">Iya</a>
        </div>
    </div>
</div>

<div class="alert" id="alert">Anda sudah berhasil Log out</div>

<script src="script.js"></script>
</body>
</html>