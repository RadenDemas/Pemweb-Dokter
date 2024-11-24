document.addEventListener("DOMContentLoaded", function() {
    const handphoneInput = document.getElementById('handphone');
    const namaInput = document.getElementById('nama');

    handphoneInput.addEventListener('input', function() {
        // Menghapus karakter jika panjang lebih dari 13
        if (this.value.length > 13) {
            this.value = this.value.slice(0, 13);
        }
    });

    handphoneInput.addEventListener('keypress', function(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        // Memeriksa apakah karakter yang dimasukkan adalah angka
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            evt.preventDefault(); // Mencegah input karakter non-angka
        }
    });

    document.querySelector('form').addEventListener('submit', function(event) {

        // Cek apakah input sesuai dengan pola
        if (!namaInput.value.match(/^([A-Z][a-z]*)( [A-Z][a-z]*)*$/)) {
            namaInput.classList.add('error');
            event.preventDefault(); // Mencegah form dikirim
        } else {
            namaInput.classList.remove('error');
        }
    });
});