<?php
        require "..\..\scripts\php\db.php";
        session_start();
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $query = "SELECT id, email, password, nama FROM users WHERE email = '$email'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_assoc($result);
                if($user['password'] === $pass){
                    var_dump($user);
                    $_SESSION['login'] = true;
                    $_SESSION['nama'] = $user['nama'];                
                    $_SESSION['id'] = $user['id'];
                    header("Location: ..\homepage\index-beranda.html");
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="signin.css">
</head>
<body>
    <div class="container">
        <div class="left-side-sign-in">
            <img src="dokter animasi sign in.png" alt="Dokter">
        </div>
        <div class="right-side-sign-in">
                <h1>SIGN IN</h1>
                <form action="" method="post">
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukkan Password">
                    </div>
                    <p>Don't have an account? <a href="../sign-up/signup.php">Sign Up</a></p>
                    <button type="submit" class="signin-btn" name="login">Sign In</button>
                </form>
        </div>
    </div>
</body>
</html>