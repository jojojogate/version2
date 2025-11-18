<!DOCTYPE html>
<html>
<head><title>Welcome</title></head>
<body>
    <h1>Welcome</h1>
    <?php
    if (isset($_GET['pw'])) {
        echo "Password: " . htmlspecialchars($_GET['pw']);
    }
    ?>
    <br><br>
    <form action="index.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>