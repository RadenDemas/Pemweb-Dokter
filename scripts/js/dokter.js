const profiledokterBtns = document.querySelectorAll('.profile-dokter-btn');
profiledokterBtns.forEach((btn, index) => {
  btn.addEventListener('click', () => {
    const profilePages = [
      '../dokter/per-dokter/dokter1/index.html',
      '../dokter/per-dokter/dokter2/index.html',
      '../dokter/per-dokter/dokter3/index.html'
    ];
    window.location.href = profilePages[index];
  });
});