
<?php 
include_once 'vendor/autoload.php';
include_once 'app/init.php';

$auth->logout();

header("Location: login.php");