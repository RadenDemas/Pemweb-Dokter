<?php
include "../scripts/php/db.php";
global $conn;
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = false;
}
if($_SESSION['login'] == false){
    header('Location: index.php');
}

$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id_user = $id";
$rows = mysqli_query($conn, $query);

if(isset($_POST['ubah'])){
    $id = $_SESSION['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $ttl = $_POST['tempat'] . "," . $_POST['tanggal'];
    $password = $_POST['password'];
    $query = "UPDATE users SET
            nama = '$nama',
            email = '$email',
            no_hp = '$nohp',
            ttl = '$ttl',
            password = '$password'
            where id_user = $id";
    mysqli_query($conn, $query);
    $loc = $_SERVER['PHP_SELF'];
    header("location: $loc");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBAH PROFILE PENGGUNA</title>
    <link rel="stylesheet" href="../styles/edit-pengguna.css">
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
    <h1>PROFILE DETAILS</h1>
    <div class="profile-container">
        <form class="profile-form" action="" method="post">
            <?php while($row = mysqli_fetch_array($rows)) :
                $ttl = explode(",", $row['ttl']);
                $tempat = $ttl[0];
                $tanggal = $ttl[1];?>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Pengguna" value="<?php echo $row['nama'];?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Alamat Email" value="<?php echo $row['email'];?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="email" name="password" placeholder="Password Pengguna" value="<?php echo $row['password'];?>">
            </div>
            <div class="form-group">
                <label for="nohp">Nomor Telepon</label>
                <input type="text" id="nohp" name="nohp" placeholder="Nomor Telepon Pengguna" value="<?php echo $row['no_hp'];?>">
            </div>
            <div class="form-group">
                <label for="tempat">Tempat Lahir</label>
                <input type="text" id="tempat" name="tempat" placeholder="Tempat Lahir Pengguna" value="<?php echo $tempat;?>">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Lahir</label>
                <input type="date" id="tanggal" name="tanggal" placeholder="Tanggal Lahir Pengguna" value="<?php echo $tanggal;?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" id="gender" name="gender" placeholder="Gender Pengguna" value="<?php echo $row['gender'];?>" disabled>
            </div>
            <?php endwhile;?>
            <button type="submit" class="ubah-akun" name="ubah">Ubah akun</button>
        </form>
    </div>
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
<script src="../pages/profile/script.js"></script>
</body>
</html>