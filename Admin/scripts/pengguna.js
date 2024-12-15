function deleteUser(userId) {
    if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
        console.log('Deleting user:', userId);
        location.reload();
    }
}