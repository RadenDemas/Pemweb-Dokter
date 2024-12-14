<?php
    require "../../scripts/php/db.php";
    global $conn;
    $query = "SELECT * FROM artikel";
    $rows = mysqli_query($conn, $query);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel</title>
</head>
<body>
<?php while($row=mysqli_fetch_array($rows)):?>
    <a><h2><?php echo $row['judul']?></h2>></a>
<?php endwhile;?>
</body>
</html>
