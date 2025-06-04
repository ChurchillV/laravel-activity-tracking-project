import './bootstrap';

window.togglePasswordVisibility = function () {
  const passwordFields = [
    document.getElementById('password'),
    document.getElementById('password_confirmation')
  ];

  passwordFields.forEach(field => {
    if (field.type === 'password') {
      field.type = 'text';
    } else {
      field.type = 'password';
    }
  });
}
