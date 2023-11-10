<?php 
session_start();

unset($_SESSION['email']);
unset($_SESSION['foto']);
header('location: index.php');