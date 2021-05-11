<?php
session_start();
require_once(__DIR__ . '/backend/config/helpers.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
}
?>

<h1>Welcome to the homepage</h1>

<a href="/backend/bridges/logout.bridge.php">Logout</a>