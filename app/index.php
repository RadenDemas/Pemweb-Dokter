<?php
include "../scripts/php/db.php";
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = false;
}
global $conn;
$query = "SELECT * FROM artikel";
$artikel = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../styles/homepage.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/responsive.css">
    <link rel="stylesheet" href="../styles/alert-modal.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <div class="nav-container">
            <a href="index.php" class="logo">
                <img src="../Assets/logo rumah sakit.svg" alt="Klinik Logo">
            </a>
            <div class="nav-links">
                <a href="index.php" class="active">Home</a>
                <a href="about.php">About Us</a>
                <a href="dokter.php">Dokter</a>
                <a href="booking.php">Booking</a>
                <a href="artikel.php">Artikel</a>
                <a href="#kontak">Kontak</a>
            </div>
            <div class="nav-buttons">
                <?php if($_SESSION['login'] == false): ?>
                    <a href="signin.php" class="login-btn">Log In</a>
                <?php elseif ($_SESSION['login']==true):?>
                <div class="profile-btn">
                    <img src="../Assets/icon-profile.svg" alt="Profile">
                    <div class="dropdown-menu">
                        <a href="profile.php">Lihat Akun</a>
                        <a href="edit-pengguna.php">Edit Akun</a>
                        <a href="#" id="logout-btn">Log Out</a>
                    </div>
                </div>
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <?php endif;?>
            </div>
        </div>
    </nav>
</header>
<main>
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>SELAMAT DATANG DI KLINIK PELITA HARAPAN</h1>
                <p>"Terang Harapan Menuju Sehat"</p>
                <a href="#about-us" class="info-btn">Info Selengkapnya</a>
            </div>
            <img src="../Assets/3 dokter.png" alt="Doctors">
        </div>
    </section>

    <section id="about-us" class="about">
        <h2>ABOUT US</h2>
        <div class="about-container">
            <img src="../Assets/rumah sakit.jpg" alt="Gambar Klinik">
            <div class="about-content">
                <p>Klinik Pelita Harapan hadir untuk menjadi pelita harapan bagi kesehatan anda. Kami berkomitmen untuk memberikan layanan kesehatan kelas dunia dengan mengutamakan kenyamanan, kepercayaan, dan kepuasan pasien.</p>
                <p>Sebagai penyedia layanan kesehatan terdepan, kami menggabungkan teknologi modern dengan pendekatan yang penuh kasih. Tim medis kami yang profesional siap melayani anda dengan solusi kesehatan yang menyeluruh, mulai dari diagnosis akurat hingga perawatan yang dipersonalisasi sesuai kebutuhan Anda.</p>
                <a href="about.php" class="read-more">Baca Selengkapnya ...</a>
            </div>
        </div>
    </section>

    <section class="doctors">
        <h2>DOKTER</h2>
        <p>Dapatkan pelayanan kesehatan terbaik, kami profil lengkap dokter spesialisasi dan pengalaman mereka</p>
        <div class="doctors-grid">
            <div class="doctor-card">
                <p>Penyakit Dalam</p>
                <img src="../Assets/dokter1.jpg" alt="dr. Kim Sabu">
                <h3>dr. Kim Sabu,</h3>
                <h3>Sp.PD.</h3>
                <a href="" class="profil-dokter-btn">Lihat Profil</a>
            </div>
            <div class="doctor-card">
                <p>Anak</p>
                <img src="../Assets/dokter3.jpg" alt="dr. Chae Sang-hwa">
                <h3>dr. Chae Sang-hwa,</h3>
                <h3>Sp.A.</h3>
                <a href="" class="profil-dokter-btn">Lihat Profil</a>
            </div>
            <div class="doctor-card">
                <p>Penyakit Dalam</p>
                <img src="../Assets/dokter2.jpg" alt="dr. Lee Ik Jun">
                <h3>dr. Lee Ik Jun,</h3>
                <h3>Sp.PD.</h3>
                <a href="" class="profil-dokter-btn">Lihat Profil</a>
            </div>
        </div>
    </section>

    <section class="articles">
        <h2>ARTIKEL</h2>
        <p>Kami menghadirkan artikel menarik untuk membantu Anda memahami dan menjaga kesehatan Anda.</p>
        <div class="articles-container">
            <div class="article-card">
                <img src="../Assets/artikel diabetes.jpg" alt="Diabetes">
                <div class="article-content">
                    <h3>Potret Diabetes di RI dari Tahun ke Tahun, Angkanya Terus Naik</h3>
                    <p>18 November 2024 • 3 menit waktu baca</p>
                </div>
                <button class="navigate-button" data-url="../../pages/artikel/per-artikel/artikel1/index.html"><i class='bx bx-chevron-right'></i></button>
            </div>
            <div class="article-card">
                <img src="../Assets/artikel sakit telinga.jpg" alt="Telinga Sakit">
                <div class="article-content">
                    <h3>Telinga Sakit Bagian Dalam? Kenali Penyebab dan Penanganannya!</h3>
                    <p>15 November 2024 • 5 menit waktu baca</p>
                </div>
                <button class="navigate-button" data-url="../../pages/artikel/per-artikel/artikel2/index.html"><i class='bx bx-chevron-right'></i></button>
            </div>
        </div>
        <div class="button-container">
            <a href="artikel.php" class="read-more-articles">Baca artikel selengkapnya...</a>
        </div>
    </section>
</main>

<footer id="kontak">
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

<div id="logoutModal" class="modal">
    <div class="modal-content">
        <p>Yakin ingin Log out dari akun ini?</p>
        <div class="modal-buttons">
            <button id="cancelLogout">Batal</button>
            <button id="confirmLogout">Iya</button>
        </div>
    </div>
</div>

<div id="logoutAlert" class="alert">
    <p>Anda sudah berhasil Log out</p>
    <div class="countdown">3</div>
</div>

<script src="../scripts/js/header.js"></script>
<script src="../scripts/js/alert-modal.js"></script>
<script src="../scripts/js/homepage.js"></script>
</body>
</html>
