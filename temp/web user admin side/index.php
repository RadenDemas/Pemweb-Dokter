<?php
    session_start();
    if(!isset($_SESSION)){
        header("Location:login.php");
    }
    if(isset($_POST['logout'])){
        header("Location:kill.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELAMAT DATANG</title>
</head>
<body>
    <?php
        echo "<h1>Selamat Datang " .$_SESSION['nama'] . "</h1>";
    ?>
    <form action="" method="post">
        <button type="submit" name="logout">LOGOUT</button>
    </form>
</body>
</html>