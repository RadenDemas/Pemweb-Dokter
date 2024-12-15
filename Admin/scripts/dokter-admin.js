function deleteDoctor(doctorId) {
    if (confirm('Apakah Anda yakin ingin menghapus dokter ini?')) {
        console.log('Deleting doctor:', doctorId);
        location.reload();
    }
}