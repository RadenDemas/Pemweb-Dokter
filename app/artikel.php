<?php
    include "../scripts/php/db.php";
    session_start();
    if(!isset($_SESSION['login'])){
        $_SESSION['login'] = false;
    }
    global $conn;
    $query = "SELECT * FROM artikel";
    $rows = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/artikel.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/responsive.css">
    <link rel="stylesheet" href="../styles/alert-modal.css">
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
    <section class="articles">
        <h2>ARTIKEL</h2>
        <p>Kami menghadirkan artikel menarik untuk membantu Anda memahami dan menjaga kesehatan Anda.</p>
        <div class="articles-container">
            <?php while($row=mysqli_fetch_array($rows)): ?>
            <div class="article-card">
                <img src="../Assets/<?php echo $row['foto'];?>" alt="Diabetes">
                <div class="article-content">
                    <h3><?php echo $row['judul'];?></h3>
                    <p><?php echo $row['tanggal']?> • <?php echo $row['waktu_baca'];?> menit waktu baca</p>
                </div>
                <button class="navigate-button" data-url="isi-artikel.php?id=<?php echo$row['id_artikel'];?>"><i class='bx bx-chevron-right'></i></button>
            </div>
            <?php endwhile;?>
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
<script src="../scripts/js/artikel.js"></script>
</body>
</html>script