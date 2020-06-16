<?php require 'includes/header.php' ?>
<?php
session_start();
unset($_SESSION['username']);
?>
<?php
echo "logout";
?>
<?php require 'includes/footer.php' ?>
