<?php
    include "../scripts/php/db.php";
    global $conn;
    $id = $_GET['id'];
    $query = "SELECT * FROM artikel where id_artikel = '$id'";
    $rows = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Depresi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/artikel/per-artikel/artikel3/styles.css">
</head>
<body>
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-left">
            <img src="../Assets/logo rumah sakit.svg" alt="Klinik Logo" class="logo">
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Dokter</a>
                <a href="#">Booking</a>
                <a href="#">Artikel</a>
                <a href="#">Kontak</a>
            </div>
        </div>
        <div class="nav-right">
            <a href="#" class="profile-btn">
                <img src="../Assets/profile_icon.svg" alt="Profile" class="profile-icon">
            </a>
            <button class="logout-btn">Log Out</button>
            <button class="menu-btn" id="menuBtn">
                <img src="https://raw.githubusercontent.com/lucide-icons/lucide/main/icons/menu.svg" alt="Menu" class="menu-icon">
            </button>
        </div>
    </div>
    <div class="mobile-menu" id="mobileMenu">
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Dokter</a>
        <a href="#">Booking</a>
        <a href="#">Artikel</a>
        <a href="#">Kontak</a>
    </div>
</nav>

<main>
    <h1>ARTIKEL</h1>
    <article class="article-content">
        <?php while($row = mysqli_fetch_array($rows)):?>
        <h2><?php echo $row['judul'];?></h2>

        <div class="article-image">
            <img src="../Assets/<?php echo $row['foto'];?>" alt="Telinga Sakit">
        </div>

        <div class="article-text">
            <p><?php echo nl2br($row['isi'])?></p>
        <?php endwhile;?>
    </article>
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

<script src="../pages/artikel/per-artikel/artikel3/script.js"></script>
</body>
</html>
