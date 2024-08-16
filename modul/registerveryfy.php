<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Validation</title>
</head>
<body>
  <form id="passwordForm">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <span id="passwordMessage"></span> <!-- Notifikasi -->
    <br>
    <label for="confirmPassword">Konfirmasi Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword">
    <span id="confirmPasswordMessage"></span> <!-- Notifikasi -->
    <br>
    <button type="submit">Submit</button>
  </form>

  <script>
    // Fungsi untuk memvalidasi password
    function validatePassword(password) {
      // Panjang minimal 8 karakter
      if (password.length < 8) {
        return false;
      }

      // Memeriksa apakah terdapat setidaknya satu huruf dan satu angka
      var hasLetter = false;
      var hasNumber = false;
      for (var i = 0; i < password.length; i++) {
        var char = password.charAt(i);
        if (/[a-zA-Z]/.test(char)) {
          hasLetter = true;
        } else if (/[0-9]/.test(char)) {
          hasNumber = true;
        }
      }

      // Mengembalikan hasil validasi
      return hasLetter && hasNumber;
    }

    // Menangani input pada input password
    document.getElementById('password').addEventListener('input', function () {
      var passwordInput = this.value;
      var passwordMessage = document.getElementById('passwordMessage');

      // Memeriksa apakah password valid
      if (validatePassword(passwordInput)) {
        passwordMessage.textContent = 'Password valid!';
      } else {
        passwordMessage.textContent = 'Password harus memiliki panjang minimal 8 karakter dan mengandung setidaknya satu huruf dan satu angka.';
      }
    });

    // Menangani input pada konfirmasi password
    document.getElementById('confirmPassword').addEventListener('input', function () {
      var confirmPasswordInput = this.value;
      var confirmPasswordMessage = document.getElementById('confirmPasswordMessage');
      var passwordInput = document.getElementById('password').value;

      // Memeriksa apakah konfirmasi password sama dengan password
      if (confirmPasswordInput === passwordInput) {
        confirmPasswordMessage.textContent = 'Konfirmasi password sama dengan password.';
      } else {
        confirmPasswordMessage.textContent = 'Konfirmasi password tidak sama dengan password.';
      }
    });

    // Menangani submit form
    document.getElementById('passwordForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Mencegah form untuk melakukan submit

      var passwordInput = document.getElementById('password').value;
      var confirmPasswordInput = document.getElementById('confirmPassword').value;

      // Memeriksa apakah password valid
      if (validatePassword(passwordInput)) {
        // Memeriksa apakah konfirmasi password sama dengan password
        if (passwordInput === confirmPasswordInput) {
          alert('Password valid dan konfirmasi password sama!');
        } else {
          alert('Password valid, tetapi konfirmasi password tidak sama!');
        }
      } else {
        alert('Password harus memiliki panjang minimal 8 karakter dan mengandung setidaknya satu huruf dan satu angka.');
      }
    });
  </script>
</body>
</html>
