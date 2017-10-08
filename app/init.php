<?php 

use Illuminate\Database\Capsule\Manager as Capsule;
use Delight\Auth\Auth;
use PHPMailer\PHPMailer\PHPMailer;

// default configuration
ob_start();

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

// mail configuration
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "bdphoto369@gmail.com";
$mail->Password = "369#bdphoto";


$mail->setFrom('poltu@gmail.com', 'First Last');
$mail->addAddress('marufarafat@gmail.com', 'John Doe');
$mail->Subject = 'PHPMailer mail() test';
$mail->msgHTML("<strong> strong </strong>");
$mail->AltBody = 'This is a plain-text message body';


// database configuration
$capsule = new Capsule;
$capsule->addConnection(
    array(
        'driver'    => 'mysql',
        'host'      => "localhost",
        'database'  => "00159072",
        'username'  => "root",
        'password'  => "",
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    )
);
$capsule->setAsGlobal();
$capsule->bootEloquent();


$auth = new Auth($capsule->getDatabaseManager()->getPdo());

$misc = new Hotel\Misc;

// checking profile complete or not 
if ($auth->isLoggedIn()) {

    $user = \Hotel\Models\Users::find($auth->getUserId())->toArray();

    $proile = explode("/", $_SERVER['REQUEST_URI']);

    if ($user["complete_profile"] == 0) {
        if ( end($proile) !== "complete-profile.php") header("location: complete-profile.php");
    }
    if ($user["complete_profile"] == 1) {
        if ( end($proile) === "complete-profile.php") header("location: dashboard.php");
    }
}
if ($auth->admin()->doesUserHaveRole(4, \Delight\Auth\Role::ADMIN)) {
    
}
