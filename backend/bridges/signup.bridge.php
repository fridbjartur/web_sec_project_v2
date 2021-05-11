<?php
session_start();
require_once(__DIR__ . '/../config/init.php');

if (!is_csrf_valid()) {
    header('Location: /signup.php');
    exit();
}

if (isset($_SESSION['userId'])) {
    header('Location: /index.php');
    exit();
}
if (!$_POST) {
    header('Location: /signup.php');
    exit();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('Location: /signup.php');
    exit();
};

if (!isset($_POST['email'])) {
    header('Location: /signup.php');
    exit();
}
if (strlen($_POST['email']) < 6) {
    header('Location: /signup.php');
    exit();
}
if (strlen($_POST['email']) > 255) {
    header('Location: /signup.php');
    exit();
}

if (!isset($_POST['password'])) {
    header('Location: /signup.php');
    exit();
}
if (strlen($_POST['password']) < 4) {
    header('Location: /signup.php');
    exit();
}
if (strlen($_POST['password']) > 50) {
    header('Location: /signup.php');
    exit();
}

if (!isset($_POST['first_name'])) {
    header('Location: /signup.php');
    exit();
}
if (strlen($_POST['first_name']) < 2) {
    header('Location: /signup.php');
    exit();
}
if (strlen($_POST['first_name']) > 20) {
    header('Location: /signup.php');
    exit();
}

if (!isset($_POST['last_name'])) {
    header('Location: /signup.php');
    exit();
}
if (strlen($_POST['last_name']) < 2) {
    header('Location: /signup.php');
    exit();
}
if (strlen($_POST['last_name']) > 20) {
    header('Location: /signup.php');
    exit();
}

$users->createUser($_POST);
header('Location: /login.php');
