<?php
session_start();
require_once(__DIR__ . '/../config/init.php');

if (!is_csrf_valid()) {
    header('Location: /login.php');
    exit();
}

if (isset($_SESSION['userId'])) {
    header('Location: /index.php');
    exit();
}
if (!$_POST) {
    header('Location: /login.php');
    exit();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('Location: /login.php');
    exit();
};

if (!isset($_POST['email'])) {
    header('Location: /login.php');
    exit();
}
if (strlen($_POST['email']) < 6) {
    header('Location: /login.php');
    exit();
}
if (strlen($_POST['email']) > 255) {
    header('Location: /login.php');
    exit();
}

if (!isset($_POST['password'])) {
    header('Location: /login.php');
    exit();
}
if (strlen($_POST['password']) < 4) {
    header('Location: /login.php');
    exit();
}
if (strlen($_POST['password']) > 50) {
    header('Location: /login.php');
    exit();
}

$users->login($_POST['email'], $_POST['password']);
header('Location: /login.php');
