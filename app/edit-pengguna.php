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
    <link rel="stylesheet" href="../pages/profile/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<nav>
    <div class="logo">
        <img src="https://i.ibb.co/VqkQ8Kc/logo.png" alt="Klinik Pelita Harapan">
    </div>
    <div class="hamburger">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Dokter</a></li>
        <li><a href="#">Booking</a></li>
        <li><a href="#">Artikel</a></li>
        <li><a href="#">Kontak</a></li>
    </ul>
    <div class="nav-buttons">
        <a href="#" class="profile-icon"><i class="fas fa-user"></i></a>
        <a href="#" class="logout-btn">Log Out</a>
    </div>
</nav>

<main>
    <h1>PROFILE DETAILS</h1>
    <div class="profile-container">
        <div class="profile-image">
            <i class="fas fa-user"></i>
        </div>
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

<footer>
    <div class="footer-content">
        <div class="footer-logo">
            <img src="https://i.ibb.co/VqkQ8Kc/logo.png" alt="Klinik Pelita Harapan">
            <p>Jl. Cahaya Sejahtera No. 88, Harapan Indah, Kec. Mentari Baru, Jakarta</p>
        </div>
        <div class="footer-contact">
            <h2>Hubungi Kami</h2>
            <div class="contact-item">
                <i class="fas fa-ambulance"></i>
                <p>Ambulans & Gawat Darurat 0266 666 0 000</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <p>Pusat Panggilan 0255 555 0 000</p>
            </div>
            <div class="contact-item">
                <i class="fab fa-whatsapp"></i>
                <p>Whatsapp 628888888888</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <p>infohospital@pelitaharapan.co.id</p>
            </div>
        </div>
    </div>
</footer>
<script src="../pages/profile/script.js"></script>
</body>
</html>