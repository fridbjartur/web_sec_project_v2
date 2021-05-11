<?php
session_start();
require_once(__DIR__ . '/backend/config/helpers.php');
if (isset($_SESSION['user_id'])) {
    header('Location: /index.php');
}
?>

<form action="/backend/bridges/login.bridge.php" method="POST">
    <?php set_csrf() ?>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" minlength="4" required>
    <button>login</button>
</form>
<a href="/signup.php">Signup?</a>