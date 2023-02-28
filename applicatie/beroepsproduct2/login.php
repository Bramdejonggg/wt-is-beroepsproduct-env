<?php
require_once 'db_connectie.php';
require_once 'functies.php';

session_start();
Login_medewerker();
$message1 = '';
Login_bezoeker();
$message2 = '';
?>
<!DOCTYPE html>
<html lang="nl">

<!-- Header -->

<head>
  <meta charset="utf-8">
  <title>Gelre Airport</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="normalize.css">
</head>

<!-- Body -->

<body>

  <!-- Navigatiebalk -->

  <nav>
    <img src="image/Logo.jpg.png" alt="niks">
    <ul>
      <li><a href="Index.php">Home</a></li>
      <li><a href="vluchten.php">Vluchten</a></li>
      <li><a href="Privacyverklaring.php">Privacyverklaring</a></li>
    </ul>
  </nav>

  <div class="center">
    <h1>Login Medewerker</h1>
    <p><?= $message1 ?></p>
    <form method="post">
      <div class="txt_field">
        <input type="text" name="username1" required>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password1" required>
        <span></span>
        <label>Password</label>
      </div>
      <div class="pass">Wachtwoord vergeten?</div>
      <input type="submit" name="submit1" value="Login">
    </form>
  </div>

  <div class="center2">
    <h1>Login bezoeker</h1>
    <p><?= $message2 ?></p>
    <form method="post">
      <div class="txt_field">
        <input type="text" name="username2" required>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password2" required>
        <span></span>
        <label>Password</label>
      </div>
      <div class="pass">Wachtwoord vergeten?</div>
      <input type="submit" name="submit2" value="Login">
    </form>
  </div>

  <!-- Footer -->

  <footer>
    @Copyright GelreAirport 2022- All Right Reserved.
  </footer>
</body>

</html>