<?php
global $conn;
require "..\scripts\php\db.php";
session_start();
if($_SESSION['login']==true){
    header("location: index.php");
}
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        if($user['password'] === $pass){
            $ttl = explode(',',$user['ttl']);
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $user['nama'];
            $id = (int) $user['id_user'];
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $user['email'];
            $_SESSION['no_hp'] = $user['no_hp'];
            header("Location: index.php");
            exit;
        }
        else {
            $gagal = true;
        }
    }
    else {
        $gagal = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../pages/sign-in/signin.css">
</head>
<body>
<div class="container">
    <div class="left-side">
        <img src="../Assets/logo rumah sakit.svg" alt="Klinik Logo" class="logo animate-left">
        <img src="../Assets/dokter animasi sign in.png" alt="Doctor" class="doctor-image animate-left">
    </div>
    <div class="right-side">
        <div class="form-container">
            <h1>SIGN IN</h1>
            <form id="signinForm" action="" method="post">
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

                <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
                <button type="submit" class="signin-btn" name="login">Sign In</button>
            </form>
        </div>
    </div>
</div>
<script src="../pages/sign-in/signin.js"></script>
</body>
</html>