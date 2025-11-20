<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
</head>
<body>
  <h1>Welcome</h1>
  <?php
  if (isset($_GET['pw'])) {
      $pw = htmlspecialchars($_GET['pw'], ENT_QUOTES, 'UTF-8');
      echo "<p>Your password: <strong>{$pw}</strong></p>";
  } else {
      echo "<p>No password provided.</p>";
  }
  ?>
  <form action="index.php">
    <button type="submit">Logout</button>
  </form>
</body>
</html>