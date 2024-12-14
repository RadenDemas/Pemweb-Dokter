<?php
    include "../../scripts/php/db.php";
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
    <link rel="stylesheet" href="styles.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar">
    <div class="nav-container">
        <a href="homepage.php" class="nav-logo">
            <img src="../../Assets/logo rumah sakit.svg" alt="Klinik Logo">
        </a>
        <div class="menu-icon">
            <i class='bx bx-menu'></i>
        </div>

        <div class="nav-menu">
            <a href="homepage.php" class="nav-link">Home</a>
            <a href="../about-us/about.php" class="nav-link">About Us</a>
            <a href="../dokter/dokter.php" class="nav-link">Dokter</a>
            <a href="../booking/booking.php" class="nav-link">Booking</a>
            <a href="../artikel/artikel.php" class="nav-link">Artikel</a>
            <a href="../kontak/kontak.php" class="nav-link">Kontak</a>

            <?php if($_SESSION['login'] == true): ?>
            <div class="profile-menu">
                <button class="profile-btn">
                    <img src="../../Assets/profile_icon.svg" alt="profile icon">
                </button>
                <div class="profile-dropdown">
                    <a href="../profile/profile.php" class="dropdown-item">Lihat Akun</a>
                    <a href="../../scripts/php/kill.php" class="dropdown-item">Sign Out</a>
                </div>
            </div>
            <?php elseif($_SESSION['login'] == false): ?>
            <a href="../sign-in/index.php" class="logout-btn">Log In</a>
            <?php endif;?>
        </div>
    </div>
</nav>

<main>
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>SELAMAT DATANG DI KLINIK PELITA HARAPAN</h1>
                <p>"Terang Harapan Menuju Sehat"</p>
                <button class="info-btn"><a href="../about-us/about.php">Info Selengkapnya</a></button>
            </div>
            <img src="../../Assets/3 dokter.png" alt="Doctors">
        </div>
    </section>

    <section class="about">
        <h2>ABOUT US</h2>
        <div class="about-container">
            <img src="../../Assets/rumah sakit.jpg" alt="Gambar Klinik">
            <div class="about-content">
                <p>Klinik Pelita Harapan hadir untuk menjadi pelita harapan bagi kesehatan anda. Kami berkomitmen untuk memberikan layanan kesehatan kelas dunia dengan mengutamakan kenyamanan, kepercayaan, dan kepuasan pasien.<br>
                    Sebagai penyedia layanan kesehatan terdepan, kami menggabungkan teknologi modern dengan pendekatan yang penuh kasih. Tim medis kami yang profesional siap melayani anda dengan solusi kesehatan yang menyeluruh, mulai dari diagnosis akurat hingga perawatan yang dipersonalisasi sesuai kebutuhan Anda.</p>
                <button class="read-more"><a>Baca Selengkapnya ...</a></button>
            </div>
        </div>
    </section>

    <section class="doctors">
        <h2>DOKTER</h2>
        <p>Dapatkan pelayanan kesehatan terbaik, kami profil lengkap dokter spesialisasi dan pengalaman mereka</p>
        <div class="doctors-grid">
            <div class="doctor-card">
                <p>Penyakit Dalam</p>
                <img src="../../Assets/dokter1.jpg" alt="dr. Kim Sabu">
                <h3>dr. Kim Sabu,</h3>
                <h3>Sp.PD.</h3>
                <button><a href="../profil-dokter/profil-dokter.php?id=1">Lihat Profil</a></button>
            </div>
            <div class="doctor-card">
                <p>Anak</p>
                <img src="../../Assets/dokter3.jpg" alt="dr. Chae Sang-hwa">
                <h3>dr. Chae Sang-hwa,</h3>
                <h3>Sp.A.</h3>
                <button><a href="../profil-dokter/profil-dokter.php?id=2">Lihat Profil</a></button>
            </div>
            <div class="doctor-card">
                <p>Penyakit Dalam</p>
                <img src="../../Assets/dokter2.jpg" alt="dr. Lee Ik Jun">
                <h3>dr. Lee Ik Jun,</h3>
                <h3>Sp.PD.</h3>
                <button><a href="../profil-dokter/profil-dokter.php?id=3">Lihat Profil</a></button>
            </div>
        </div>
    </section>

    <section class="articles">
        <h2>ARTIKEL</h2>
        <p>Kami menghadirkan artikel menarik untuk membantu Anda memahami dan menjaga kesehatan Anda.</p>
        <div class="articles-container">
            <?php while($row = mysqli_fetch_array($artikel)): ?>
                <div class="article-card">
                    <img src="../../Assets/artikel diabetes.jpg" alt="Diabetes">
                    <div class="article-content">
                        <h3><?php echo $row['judul'];?></h3>
                        <p><?php echo $row['tanggal'];?> • <?php echo $row['waktu_baca'];?> menit waktu baca</p>
                    </div>
                    <button><i class='bx bx-chevron-right'><a href="../artikel/artikel.php?id=<?php echo $row['id_artikel'];?>"></a></i></button>
                </div>
            <?php endwhile;?>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-info">
                <img src="../../Assets/logo rumah sakit.svg" alt="Klinik Logo">
                <p>Jl. Cahaya Sejahtera</p>
                <p>No. 88, Harapan Indah,</p>
                <p>Kec. Mentari Baru,<br>
                    Jakarta</p>
            </div>

            <div class="contact-info">
                <h3>Hubungi Kami</h3>
                <div class="contact-details">
                    <div class="contact-item">
                        <img src="../../Assets/logo ambulan.svg" alt="ambulan">
                        <div>
                            <p>Ambulans & Gawat Darurat</p>
                            <p class="bold">0266 666 0 000</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <img src="../../Assets/logo telpon.svg" alt="telpon">
                        <div>
                            <p>Pusat Panggilan</p>
                            <p class="bold">0266 555 0 000</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <img src="../../Assets/logo whatsapp.svg" alt="whatsapp">
                        <div>
                            <p>Whatsapp</p>
                            <p class="bold">+6288888888888</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <img src="../../Assets/logo email.svg" alt="email">
                        <div>
                            <p>infohospital@pelitaharapan.co.id</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
</main>

<script src="script.js"></script>
</body>
</html>
