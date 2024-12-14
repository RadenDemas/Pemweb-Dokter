<?php
    require "../../scripts/php/db.php";
    global $conn;
    $id_artikel = $_GET['id_artikel'];
    $query = "SELECT * FROM artikel where id_artikel = '$id_artikel'";
    $result = mysqli_query($conn, $query);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel</title>
</head>
<body>
<h1><?php echo $result['judul']?></h1>>
<p><?php echo nl2br($result['isi_artikel'])?></p>>
</body>
</html>