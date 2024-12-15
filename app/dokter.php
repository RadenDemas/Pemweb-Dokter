<?php
    include "../scripts/php/db.php";
    session_start();
    global $conn;
    $query = "
            SELECT 
                d.nama_dokter,
                d.spesialis,
                d.id_dokter,
                d.foto,
                j.hari,
                j.jam_kerja
            FROM 
                dokter AS d
            JOIN 
                jam_kerja AS j
            ON 
                d.id_dokter = j.id_dokter";
    $result = $conn->query($query);


    $schedules = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dokter = $row['nama_dokter'];
            $spesialis = $row['spesialis'];
            $hari = $row['hari'];
            $jam_kerja = $row['jam_kerja'];
            $id_dokter = $row['id_dokter'];
            $pict = $row['foto'];
            if (!isset($schedules[$dokter])) {
                $schedules[$dokter] = [
                    'spesialis' => $spesialis,
                    'id_dokter' => $id_dokter,
                    'pict' => $pict,
                    'jadwal' => [
                        'Senin' => '-',
                        'Selasa' => '-',
                        'Rabu' => '-',
                        'Kamis' => '-',
                        'Jumat' => '-',
                        'Sabtu' => '-',
                        'Minggu' => '-',
                    ],
                ];
            }
            $schedules[$dokter]['jadwal'][$hari] = $jam_kerja;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelita Harapan Clinic</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/alert-modal.css">
    <link rel="stylesheet" href="../styles/dokter.css">
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
    <h1>Cari Jadwal Dokter di Pelita Harapan Clinic</h1>
    <p class="subtitle">Untuk mencari dokter, Anda dapat memilih nama dokter berdasarkan spesialis</p>

    <div class="doctor-cards">
        <?php foreach ($schedules as $dokter => $data):?>
            <div class="doctor-card">
                <div class="doctor-image">
                    <img src="../Assets/<?php echo $data['pict'];?>" alt="foto <?php echo htmlspecialchars($dokter);?>">
                </div>
                <div class="doctor-info">
                    <h2><?php echo htmlspecialchars($dokter);?></h2>
                    <p class="specialty"><?php echo htmlspecialchars($data['spesialis']);?></p>
                    <div class="schedule-container">
                        <div class="schedule-row days">
                            <div class="schedule-cell">Senin</div>
                            <div class="schedule-cell">Selasa</div>
                            <div class="schedule-cell">Rabu</div>
                            <div class="schedule-cell">Kamis</div>
                            <div class="schedule-cell">Jumat</div>
                            <div class="schedule-cell">Sabtu</div>
                            <div class="schedule-cell">Minggu</div>
                        </div>
                        <div class="schedule-row times">
                            <?php foreach ($data['jadwal'] as $hari => $jam): ?>
                                <div class="schedule-cell"><?php echo htmlspecialchars($jam); ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <a href="profile-dokter.php?id=<?php echo $data['id_dokter'];?>" class="profile-dokter-btn" style="text-decoration:none">Lihat Profil</a>
                </div>
            </div>
        <?php endforeach;?>
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
</body>
</html>
