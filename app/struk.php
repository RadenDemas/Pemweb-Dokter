<?php
    include "../scripts/php/db.php";
    session_start();
    global $conn;

    if($_SESSION['login'] == false){
        header("location: signin.php");
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
        $spesialis = $_POST['spesialis'] ?? null;

        // Validasi input
        if ($selectedDate && $selectedTime) {
            $query = "SELECT COUNT(*) as total_bookings FROM booking WHERE tanggal = '$selectedDate'";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
            $total_bookings = $row['total_bookings'] + 1;
            if($spesialis=="Penyakit Dalam"){
                $booking_number = "PD-" . str_pad((int) $total_bookings, 3, "0", STR_PAD_LEFT);
            }
            elseif ($spesialis=="Anak"){
                $booking_number = "DA-" . str_pad((int) $total_bookings, 3, "0", STR_PAD_LEFT);
            }
            elseif ($spesialis=="Psikologi"){
                $booking_number = "PS-" . str_pad((int) $total_bookings, 3, "0", STR_PAD_LEFT);
            }

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
    <link rel="stylesheet" href="../styles/struk.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/responsive.css">
    <link rel="stylesheet" href="../styles/alert-modal.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <div class="nav-container">
            <a href="index.php" class="logo">
                <img src="../Assets/logo rumah sakit.svg" alt="Klinik Logo">
            </a>
            <div class="nav-links">
                <a href="index.php" class="active">Home</a>
                <a href="about.php">About Us</a>
                <a href="dokter.php">Dokter</a>
                <a href="booking.php">Booking</a>
                <a href="artikel.php">Artikel</a>
                <a href="#kontak">Kontak</a>
            </div>
            <div class="nav-buttons">
                <?php if($_SESSION['login'] == false): ?>
                    <a href="signin.php" class="login-btn">Log In</a>
                <?php elseif ($_SESSION['login']==true):?>
                    <div class="profile-btn">
                        <img src="../Assets/icon-profile.svg" alt="Profile">
                        <div class="dropdown-menu">
                            <a href="profile.php">Lihat Akun</a>
                            <a href="edit-pengguna.php">Edit Akun</a>
                            <a href="#" id="logout-btn">Log Out</a>
                        </div>
                    </div>
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </nav>
</header>
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
                <span class="value">(<?php echo $row['jam']?>)</span>
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

<footer id="kontak">
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

<div id="logoutModal" class="modal">
    <div class="modal-content">
        <p>Yakin ingin Log out dari akun ini?</p>
        <div class="modal-buttons">
            <button id="cancelLogout">Batal</button>
            <button id="confirmLogout">Iya</button>
        </div>
    </div>
</div>

<div id="logoutAlert" class="alert">
    <p>Anda sudah berhasil Log out</p>
    <div class="countdown">3</div>
</div>

<script src="../scripts/js/header.js"></script>
<script src="../scripts/js/alert-modal.js"></script>
<script src="../pages/booking/after-booking/script.js"></script>
</body>
</html>