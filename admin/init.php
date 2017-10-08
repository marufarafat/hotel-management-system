<?php

require_once '../vendor/autoload.php';
require_once '../app/init.php';


if (!$auth->isLoggedIn()){
    header("Location: ../index.php");
    return;
}

if (!$auth->admin()->doesUserHaveRole($auth->getUserId(), \Delight\Auth\Role::ADMIN)) {
    header("Location: ../dashboard.php");
    return;
}