<?php
    require "db.php";
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];
        $gender = $_POST['gender'];
        $ttl = $_POST['tempat'] . $_POST['tanggal'];
        $password = $_POST['password'];

        $query = "INSERT INTO users VALUES
        ('','$nama','$email','$nohp','$gender','$ttl','$password','user')";
        mysqli_query($conn,$query);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="nama">Nama: </label></td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="email">Email: </label></td>
                <td><input type="text" name="email" id="email" required></td>
            </tr>
            <tr>
                <td><label for="nohp">Nomor Handphone: </label></td>
                <td><input type="text" name="nohp" id="nohp" required></td>
            </tr>
            <tr>
                <td><label for="gender">Gender: </label></td>
                <td><select name="gender" id="gender">
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">perempuan</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="tempat">Tempat Tanggal Lahir:</label></td>
                <td><input type="text" name="tempat" id="tempat" require></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="date" name="tanggal" id="tanggal"></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">REGISTER</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
