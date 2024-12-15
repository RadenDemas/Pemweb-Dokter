document.addEventListener('DOMContentLoaded', function() {
  const bookNowButton = document.getElementById('bookNowButton');

    bookNowButton.addEventListener('click', function() {
        window.location.href = '../../../booking/per-booking/booking1/index.html';
    });
});

document.addEventListener('DOMContentLoaded', function() {
  const loginButton = document.querySelector('.login-btn');

  loginButton.addEventListener('click', function() {
      window.location.href = '../../pages/sign-in/index.html';
  });
});