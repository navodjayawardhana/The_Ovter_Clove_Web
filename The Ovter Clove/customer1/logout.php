<?php
session_start();


unset($_SESSION['customer_name']);


header('Location: home.php');
exit();
?>
