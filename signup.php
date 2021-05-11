<?php
session_start();
require_once(__DIR__ . '/backend/config/helpers.php');
if (isset($_SESSION['user_id'])) {
    header('Location: /index.php');
}
?>

<form action="/backend/bridges/signup.bridge.php" method="POST">
    <?php set_csrf() ?>
    <input type="text" name="first_name" placeholder="First name" minlength="2" maxlength="20" required>
    <input type="text" name="last_name" placeholder="Last name" minlength="2" maxlength="20" required>
    <input type="email" name="email" placeholder="Email" minlength="4" required>
    <input type="password" name="password" placeholder="Password" required>
    <button>Create user</button>
</form>

<a href="/login.php">Login?</a>