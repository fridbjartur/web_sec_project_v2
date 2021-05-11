<?php
function out($text)
{
    echo htmlspecialchars($text);
}
function set_csrf()
{
    $csrf_token = bin2hex(random_bytes(25));
    $_SESSION['csrf'] = $csrf_token;
    echo '<input type="hidden" name="csrf" value="' . $csrf_token . '">';
}
function is_csrf_valid()
{
    if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
        return false;
    }
    if ($_SESSION['csrf'] != $_POST['csrf']) {
        return false;
    }
    return true;
}
