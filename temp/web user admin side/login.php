<?php
    require "db.php";
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

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td>:</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><button type="submit" name="login">LOGIN</button></td>
        </tr>
        </table>
    </form>
    <?php if(isset($gagal) && $gagal):?>
        <p>Anda gagal untuk login</p>
    <?php endif;?>
    <p>Apakah belum daftar <a href="register.php">Sign Up</a>?</p>
</body>
</html>