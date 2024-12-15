<?php
    include "../scripts/php/db.php";
    session_start();
    global $conn;

    if($_SESSION['login'] == false){
        header("location: index.php");
    }

    $id_user = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Tangkap data yang dikirimkan
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_pemesanan = date("Y-m-d H:i:s");
        $selectedDate = $_POST['selectedDate'] ?? null;
        $selectedTime = $_POST['selectedTime'] ?? null;
        $id_dokter = $_POST['id_dokter'] ?? null;
        $nama_dokter = $_POST['nama_dokter'] ?? null;

        // Validasi input
        if ($selectedDate && $selectedTime) {
            $query = "SELECT COUNT(*) as total_bookings FROM booking WHERE tanggal = '$selectedDate'";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
            $total_bookings = $row['total_bookings'] + 1;

            $booking_number = "A-" . str_pad((int) $total_bookings, 3, "0", STR_PAD_LEFT);

            $query = "INSERT INTO booking
                    (id_user, id_dokter, no_booking, tanggal, jam, tanggal_pemesanan)
                    VALUES
                    ('$id_user', '$id_dokter', '$booking_number','$selectedDate', '$selectedTime', '$tanggal_pemesanan')";
            mysqli_query($conn, $query);

            $query = "SELECT * FROM booking
                    WHERE id_user = '$id_user' AND id_dokter = '$id_dokter' AND tanggal = '$selectedDate' AND jam = '$selectedTime' AND tanggal_pemesanan = '$tanggal_pemesanan'";
            $rows = mysqli_query($conn, $query);
        } else {
            echo "<script>
                alert('Mohon untuk pilih tanggal dan waktu yang benar');
                window.location = 'booking-dokter.php?id=$id_dokter.php';
                </script>";
        }
    };
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Berhasil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/booking/after-booking/styles.css">
</head>
<body>
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-left">
            <img src="../Assets/logo rumah sakit.svg" alt="Klinik Logo" class="logo">
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Dokter</a>
                <a href="#">Booking</a>
                <a href="#">Artikel</a>
                <a href="#">Kontak</a>
            </div>
        </div>
        <div class="nav-right">
            <a href="#" class="profile-btn">
                <img src="../Assets/profile_icon.svg" alt="Profile" class="profile-icon">
            </a>
            <button class="logout-btn">Log Out</button>
            <button class="menu-btn" id="menuBtn">
                <img src="https://raw.githubusercontent.com/lucide-icons/lucide/main/icons/menu.svg" alt="Menu" class="menu-icon">
            </button>
        </div>
    </div>
    <div class="mobile-menu" id="mobileMenu">
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Dokter</a>
        <a href="#">Booking</a>
        <a href="#">Artikel</a>
        <a href="#">Kontak</a>
    </div>
</nav>

<main>
    <div class="booking-container">
        <?php while ($row = mysqli_fetch_array($rows)): ?>
        <h1>BOOKING BERHASIL!</h1>
        <div class="booking-details">
            <h2 class="queue-number-title">Nomor Antrean</h2>
            <p class="queue-number"><?php echo $row['no_booking'];?></p>

            <div class="detail-row">
                <span class="label">Pasien</span>
                <span class="value"><?php echo $_SESSION['nama'];?></span>
            </div>
            <div class="detail-row">
                <span class="label">Dokter</span>
                <span class="value"><?php echo $nama_dokter;?></span>
            </div>
            <div class="detail-row">
                <span class="label">Tanggal</span>
                <span class="value">(<?php echo $row['tanggal'];?>)</span>
            </div>
            <div class="detail-row">
                <span class="label">Waktu</span>
                <span class="value">(<?php echo $row['jam']?>>)</span>
            </div>
            <div class="detail-row">
                <span class="label">Lokasi</span>
                <span class="value">Pelita Harapan Clinic</span>
            </div>
        </div>
        <div class="booking-buttons">
            <button class="print-btn">Cetak Bukti Booking</button>
            <button class="home-btn">Kembali ke Beranda</button>
        </div>
        <?php endwhile;?>
    </div>
</main>

<footer>
    <div class="footer-content">
        <div class="footer-left">
            <img src="../Assets/logo rumah sakit.svg" alt="Klinik Logo" class="logo-footer">
            <p>Jl. Cahaya Sejahtera</p>
            <p>No. 88, Harapan Indah,</p>
            <p>Kec. Mentari Baru,</p>
            <p>Jakarta</p>
        </div>
        <div class="footer-right">
            <h3>Hubungi Kami</h3>
            <div class="contact-details">
                <div class="contact-item">
                    <img src="../Assets/logo ambulan.svg" alt="ambulan">
                    <div>
                        <p>Ambulans & Gawat Darurat 0266 666 0 000</p>
                    </div>
                </div>

                <div class="contact-item">
                    <img src="../Assets/logo telpon.svg" alt="telepon">
                    <div>
                        <p>Pusat Panggilan 0255 555 0 000</p>
                    </div>
                </div>

                <div class="contact-item">
                    <img src="../Assets/logo whatsapp.svg" alt="whatsapp">
                    <div>
                        <p>Whatsapp 628888888888</p>
                    </div>
                </div>

                <div class="contact-item">
                    <img src="../Assets/logo email.svg" alt="email">
                    <div>
                        <p>infohospital@pelitaharapan.co.id</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<script src="../pages/booking/after-booking/script.js"></script>
</body>
</html>