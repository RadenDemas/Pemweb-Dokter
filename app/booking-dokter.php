<?php
    include "../scripts/php/db.php";
    global $conn;
    session_start();
    $id_dokter = $_GET['id'];
    if($_SESSION['login'] == true){
        $id_user = $_SESSION['id'];
    }

    $query = "SELECT * FROM dokter WHERE id_dokter = '$id_dokter'";
    $rows = mysqli_query($conn, $query);

    $query = "SELECT jam_kerja, hari
            FROM jam_kerja 
            WHERE id_dokter = '$id_dokter'
            ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')";
    $result = mysqli_query($conn, $query);

    $workingHours = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $workingHours[$row['hari']][] = $row['jam_kerja'];
        }
    }


// Tentukan tanggal hari ini
    $today = new DateTime();
    $dates = [];

// Buat daftar 7 hari ke depan
    for ($i = 0; $i < 7; $i++) {
        $currentDate = clone $today;
        $currentDate->modify("+$i day");

    // Nama hari (Senin, Selasa, dll.)
        $dayOfWeek = $currentDate->format('l');
        $dayMapping = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu'
        ];
        $translatedDay = $dayMapping[$dayOfWeek];

        // Cek apakah hari memiliki jam kerja
        $hasWorkingHours = array_key_exists($translatedDay, $workingHours);

        // Tambahkan ke array tanggal
        $dates[] = [
            'date' => $currentDate->format('D, j M'), // Format: Kam, 5 Des
            'available' => $hasWorkingHours,
            'working_hours' => $hasWorkingHours ? $workingHours[$translatedDay] : []
        ];
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data yang dikirimkan
    $selectedDate = $_POST['selectedDate'] ?? null;
    $selectedTime = $_POST['selectedTime'] ?? null;

    // Validasi input
    if ($selectedDate && $selectedTime) {
        echo "Booking berhasil pada tanggal $selectedDate pukul $selectedTime";
//        $query = "INSERT INTO booking
//                (id_user, id_dokter, no_booking, jam, tanggal, tanggal_pemesanan)
//                VALUES
//                ('$id_user', '$id_dokter', '$selectedDate', '$selectedTime', '$tanggal_pemesanan')";
//        mysqli_query($conn, $query);
    } else {
        echo "<script>
            alert('Mohon untuk pilih tanggal dan waktu yang benar');
            </script>";
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
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/alert-modal.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../pages/booking/per-booking/booking1/styles.css">
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
    <h1>BOOKING DOKTER</h1>

    <div class="content-grid">
        <?php while($row=mysqli_fetch_array($rows)): ?>
        <div class="doctor-card">
            <h2><?php echo $row['spesialis'];?></h2>
            <img src="../Assets/<?php echo $row['foto'];?>" alt="dr. Kim Sabu">
            <h3><?php echo $row['nama_dokter'];?></h3>
        </div>

        <div class="booking-form">
            <form action="struk.php" method="POST">
                <input type="hidden" name="id_dokter" value="<?php echo $id_dokter?>">
                <input type="hidden" name="nama_dokter" value="<?php echo $row['nama_dokter'];?>">
                <input type="hidden" name="spesialis" value="<?php echo $row['spesialis'];?>">
                <?php endwhile;?>
                <div class="date-section">
                    <h3>Tanggal Kedatangan</h3>
                    <div class="date-buttons" id="dateButtons">
                        <?php foreach ($dates as $date): ?>
                            <button
                                type="button"
                                class="date-btn <?php echo $date['available'] ? 'available' : 'unavailable'; ?>"
                                <?php echo $date['available'] ? '' : 'disabled'; ?>
                            >
                                <?php echo $date['date']; ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                    <!-- Input tersembunyi untuk menyimpan tanggal yang dipilih -->
                    <input type="hidden" name="selectedDate" id="selectedDate">
                </div>

                <div class="time-section">
                    <h3 style="margin-top: 1.5em">Waktu</h3>
                    <div class="time-buttons" id="timeButtons">
                        <p>Silakan pilih tanggal terlebih dahulu.</p>
                    </div>
                    <!-- Input tersembunyi untuk menyimpan waktu yang dipilih -->
                    <input type="hidden" name="selectedTime" id="selectedTime">
                </div>

                <!-- Tombol submit -->
            <button type="submit" class="book-btn" style="margin-top: 1.5em">BOOK</button>
            </form>
        </div>
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

<script>
    // Fungsi untuk konversi tanggal ke format ISO (YYYY-MM-DD)
    function convertDateToISO(dateString) {
        const dateParts = dateString.split(", ")[1].split(" "); // ["16", "Dec"]
        const day = dateParts[0];
        const month = dateParts[1];
        const year = new Date().getFullYear(); // Tahun saat ini

        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        const monthIndex = monthNames.indexOf(month) + 1;

        // Format: YYYY-MM-DD
        return `${year}-${String(monthIndex).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
    }

    document.addEventListener('DOMContentLoaded', () => {
        const dateButtons = document.querySelectorAll('.date-btn');
        const timeButtonsContainer = document.getElementById('timeButtons');
        const selectedDateInput = document.getElementById('selectedDate');
        const selectedTimeInput = document.getElementById('selectedTime');

        // Data tanggal dan waktu dari PHP
        const dates = <?php echo json_encode($dates); ?>;

        // Variabel untuk tanggal dan waktu yang dipilih
        let selectedDateISO = null;

        // Event listener untuk memilih tanggal
        dateButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Ambil tanggal yang dipilih (contoh: "Mon, 16 Dec")
                const selectedDateText = button.textContent.trim();
                selectedDateISO = convertDateToISO(selectedDateText); // Konversi ke "YYYY-MM-DD"

                // Set input tersembunyi untuk server
                selectedDateInput.value = selectedDateISO;

                // Update status tombol
                dateButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Render waktu yang tersedia berdasarkan tanggal
                const selectedDateData = dates.find(date => date.date === selectedDateText);
                if (selectedDateData && selectedDateData.available) {
                    renderTimeButtons(selectedDateData.working_hours);
                } else {
                    renderTimeButtons([]);
                }
            });
        });

        // Fungsi untuk render tombol waktu
        function renderTimeButtons(times) {
            // Reset tombol waktu
            timeButtonsContainer.innerHTML = '';
            selectedTimeInput.value = ''; // Reset waktu terpilih

            if (times.length === 0) {
                timeButtonsContainer.innerHTML = '<p>Tidak ada waktu yang tersedia untuk tanggal ini.</p>';
                return;
            }

            // Buat tombol waktu berdasarkan data
            times.forEach(time => {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'time-btn available';
                button.textContent = time;

                // Event listener untuk memilih waktu
                button.addEventListener('click', () => {
                    // Update status tombol waktu
                    document.querySelectorAll('.time-btn').forEach(btn => btn.classList.remove('selected'));
                    button.classList.add('selected');

                    // Masukkan waktu terpilih ke input tersembunyi
                    selectedTimeInput.value = time;
                });

                // Tambahkan tombol waktu ke container
                timeButtonsContainer.appendChild(button);
            });
        }
    });
</script>
</body>
</html>