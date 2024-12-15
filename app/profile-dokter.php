<?php
include "../scripts/php/db.php";
global $conn;
$id = $_GET["id"];
$query = "
            SELECT 
                d.nama_dokter,
                d.spesialis,
                d.id_dokter,
                d.foto,
                d.pendidikan1,
                d.pendidikan2,
                j.hari,
                j.jam_kerja
            FROM 
                dokter AS d
            JOIN 
                jam_kerja AS j
            ON 
                d.id_dokter = j.id_dokter
            WHERE d.id_dokter = '$id'";
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
        $s1 = $row['pendidikan1'];
        $s2 = $row['pendidikan2'];
        if (!isset($schedules[$dokter])) {
            $schedules[$dokter] = [
                'spesialis' => $spesialis,
                'id_dokter' => $id_dokter,
                'pict' => $pict,
                's1' => $s1,
                's2' => $s2,
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
    <title>Doctor Booking</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/dokter/per-dokter/dokter1/styles.css">
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
    <h1>DOKTER</h1>
    <?php foreach ($schedules as $dokter => $data):?>
        <div class="doctor-profile">
            <div class="doctor-image">
                <img src="../Assets/<?php echo $data['pict'];?>" alt="foto <?php echo htmlspecialchars($dokter);?>">
                <button class="book-btn">BOOK NOW</button>
            </div>

            <div class="doctor-info">
                <h2><?php echo htmlspecialchars($dokter);?></h2>

                <div class="info-section">
                    <h3>Poli Klinik</h3>
                    <p><?php echo htmlspecialchars($data['spesialis']);?></p>
                </div>

                <div class="info-section">
                    <h3>Pendidikan</h3>
                    <p><?php echo $data['s1'];?></p>
                    <p><?php echo $data['s2'];?></p>
                </div>

                <div class="info-section">
                    <h3>Pengalaman</h3>
                    <p>RS Yulje, Seoul - Head of Psychology Department</p>
                    <p>SiCare Psychologist Clinic - Consultant</p>
                </div>

                <div class="info-section">
                    <h3>Jadwal Praktik</h3>
                    <div class="schedule-table">
                        <div class="schedule-row header">
                            <div class="cell">Senin</div>
                            <div class="cell">Selasa</div>
                            <div class="cell">Rabu</div>
                            <div class="cell">Kamis</div>
                            <div class="cell">Jumat</div>
                            <div class="cell">Sabtu</div>
                            <div class="cell">Minggu</div>
                        </div>
                        <div class="schedule-row">
                            <?php foreach ($data['jadwal'] as $hari => $jam): ?>
                                <div class="cell"><?php echo htmlspecialchars($jam); ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
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

<script src="../pages/dokter/per-dokter/dokter1/script.js"></script>
</body>
</html>