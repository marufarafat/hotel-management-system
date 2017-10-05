<?php 

include_once 'vendor/autoload.php';

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

//send the message, check for errors
// if (!$mail->send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } else {
//     echo "Message sent!";
// }

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

$user               = new Hotel\Models\Users;
$UsersConfirmations = new Hotel\Models\UsersConfirmations;
$UsersRemembered    = new Hotel\Models\UsersRemembered;
$UsersResets        = new Hotel\Models\UsersResets;
$UsersRhrottling    = new Hotel\Models\UsersRhrottling;

$user->dropTable();
$user->createTable();

$UsersRemembered->dropTable();
$UsersRemembered->createTable();

$UsersConfirmations->dropTable();
$UsersConfirmations->createTable();

$UsersResets->dropTable();
$UsersResets->createTable();

$UsersRhrottling->dropTable();
$UsersRhrottling->createTable();
