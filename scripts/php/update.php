<?php
    require "db.php";
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];
        $gender = $_POST['gender'];
        $ttl = $_POST['tempat'] . $_POST['tanggal'];
        $password = $_POST['password'];

        $query = "UPDATE users SET
        nama = '$nama',
        email = '$email',
        nohp = '$nohp',
        gender = '$gender',
        ttl = '$tt',
        password = '$password'
        WHERE id = $id";
        mysqli_query($conn,$query);
    }    
?>