document.addEventListener('DOMContentLoaded', function() {
    const loginButton = document.querySelector('.login-btn');
  
    loginButton.addEventListener('click', function() {
        window.location.href = '../../pages/sign-in/index.html';
    });
  });