<?php
session_start();
unset($_SESSION['user']);

$_SESSION['message'] = 'You have been successfully logged out!';
$_SESSION['msg_type'] = 'success';
header("Location: index.php");
