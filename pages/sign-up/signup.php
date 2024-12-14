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
        $query = "INSERT INTO users VALUES
        ('','$nama','$email','$nohp','$gender','$ttl','$password','user')";
        mysqli_query($conn,$query);
        echo "<script>
        alert('Berhasil Membuat Akun');
        window.location.href = '../sign-in/signin.php';
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <div class="left-side-sign-up">
            <h1>SIGN UP</h1>
            <form action="" method="post">
                <div class="input-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" pattern="^([A-Z][a-z]*)( [A-Z][a-z]*)*$" required title="Setiap nama harus diawali dengan huruf kapital dan tidak boleh mengandung karakter lain ,./@[]-_">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password">
                </div>
                <div class="input-group">
                    <label for="handphone">No. Handphone</label>
                    <input type="tel" id="handphone" name="nohp" placeholder="Masukkan Nomor Handphone" pattern="^08[0-9]{8,11}$" required title="Nomor handphone harus diawali dengan 08 dan min 10 digit"">
                </div>
                <div class="input-group d-flexbox">
                    <label for="jenis-kelamin" class="mr-2">Jenis Kelamin</label>
                    <select id="jenis-kelamin" name="gender" style="width: auto;">
                        <option value="" disabled selected>Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input type="text" id="tempat-lahir" name="tempat" placeholder="Tempat Lahir">
                </div>
                <div class="input-group d-flexbox">
                    <label for="tanggal-lahir" class="mr-2">Tanggal Lahir</label>
                    <input type="date" id="tanggal-lahir" name="tanggal" style="width: auto;">
                </div>
                <p>Already have an account? <a href="../sign-in/signin.php">Log In</a></p>
                <button type="submit" class="signup-btn" name="register">Sign Up</button>
            </form>

            <script src="signup.js"></script>

        </div>
        <div class="right-side-sign-up">
            <img src="dokter animasi sign up.png" alt="Dokter">
        </div>
    </div>
</body>
</html>