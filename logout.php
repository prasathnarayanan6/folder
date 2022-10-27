<?php
    if (!isset($_SESSION['EmpID'])) { session_start(); }
    $_SESSION = array(); 
    session_destroy(); 
    header("Location: admin.php"); // Or wherever you want to redirect
    exit();
?>