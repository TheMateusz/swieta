<?php
session_start();

// Import other
require("db.php");

// Login check
if (!isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) != 'login.php' && basename($_SERVER['PHP_SELF']) != 'form.php'){
    header("Location: login.php");
}