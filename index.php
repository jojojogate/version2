<?php
function isCommonPassword($pw) {
    $list = file("top-1000.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($pw, $list);
}

function isValidPassword($pw) {
    return strlen($pw) >= 8 &&
           preg_match('/[A-Z]/', $pw) &&
           preg_match('/[a-z]/', $pw) &&
           preg_match('/\d/', $pw) &&
           !isCommonPassword($pw);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pw = $_POST["password"];
    if (isValidPassword($pw)) {
        header("Location: welcome.php?pw=" . urlencode($pw));
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Login Page</title></head>
<body>
    <h1>Login Page</h1>
    <form method="post">
        Enter password: <input type="password" name="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>
