<?php
require_once(__DIR__ . '/database.php');
require_once(__DIR__ . '/../classes/class-user.php');
require_once(__DIR__ . '/helpers.php');

$database = new Database();
$db = $database->getConnection();

$users = new User($db);
