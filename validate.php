<?php
function isCommonPassword(string $password): bool {
    $file = __DIR__ . '/common-passwords.txt';
    if (!file_exists($file)) return false;

    $passwords = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($password, $passwords, true);
}

function isValidPassword(string $password): bool {
    // OWASP C6 Level 1 requirements
    if (strlen($password) < 8) return false;
    if (!preg_match('/[A-Z]/', $password)) return false;
    if (!preg_match('/[a-z]/', $password)) return false;
    if (!preg_match('/[0-9]/', $password)) return false;
    if (!preg_match('/[\W]/', $password)) return false;

    return true;
}

$password = $_POST['password'] ?? '';

if (!isValidPassword($password) || isCommonPassword($password)) {
    header("Location: index.php");
    exit();
}

header("Location: welcome.php?pw=" . urlencode($password));
exit();