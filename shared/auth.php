<?php
// authentication check
// user must have an active session to load the requested page
session_start();
if (empty($_SESSION['username'])) {
    header('location:login.php');
}
?>