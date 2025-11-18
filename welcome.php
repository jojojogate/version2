<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Welcome</h1>

    <?php
    if (isset($_GET['pw'])) {
        // htmlspecialchars prevents XSS attacks
        $pw = htmlspecialchars($_GET['pw'], ENT_QUOTES, 'UTF-8');
        echo "<p>Password: <strong>$pw</strong></p>";
    } else {
        echo "<p>No password provided.</p>";
    }
    ?>

    <br><br>

    <form action="index.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
