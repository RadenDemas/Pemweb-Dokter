<?php
require "..\..\scripts\php\db.php";
global $conn;
if(isset($_POST['register'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $gender = $_POST['gender'];
    $ttl = $_POST['tempat'] . "," . $_POST['tanggal'];
    $password = $_POST['password'];
    $query = "INSERT INTO users
            (nama,email,password,ttl,no_hp,gender) 
            VALUES
            ('$nama','$email','$password','$ttl','$nohp','$gender')";
    mysqli_query($conn,$query);
    echo "<script>
        alert('Berhasil Membuat Akun');
        window.location.href = '../sign-in/index.php';
        </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<div class="container">
    <div class="left-side">
        <h1>SIGN UP</h1>
        <form id="signupForm" action="" method="post">
            <div class="input-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Pengguna" required>
                <small class="error-message"></small>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Alamat Email" required>
                <small class="error-message"></small>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" name="password" id="password" placeholder="Password" maxlength="15" required>
                    <i class="far fa-eye-slash toggle-password"></i>
                </div>
                <small class="error-message"></small>
            </div>

            <div class="input-group">
                <label for="tempat-lahir">Tempat Lahir</label>
                <input type="text" name="tempat" id="tempat-lahir" placeholder="Tempat Lahir" required>
                <small class="error-message"></small>
            </div>

            <div class="input-group">
                <label for="phone">No. Handphone</label>
                <input type="tel" name="nohp" id="phone" placeholder="Nomor Handphone" required>
                <small class="error-message"></small>
            </div>

            <div class="input-group">
                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <div class="input-group">
                <label for="birthdate">Tanggal Lahir</label>
                <input type="date" name="tanggal" id="birthdate" required>
            </div>

            <p class="login-link">Already have an account? <a href="../sign-in/index.php">Log In</a></p>
            <button type="submit" class="signup-btn" name="register">Sign Up</button>
        </form>
    </div>
    <div class="right-side">
        <img src="../../Assets/logo rumah sakit.svg" alt="Klinik Logo" class="logo animate-right">
        <img src="../../Assets/dokter animasi sign up.png" alt="Doctor" class="doctor-image animate-right">
    </div>
</div>
<script src="signup.js"></script>
</body>
</html>