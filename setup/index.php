<?php

include_once '../vendor/autoload.php';

include_once '../app/init.php';

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create("sessions", function($table){
    $table->string('session_id', 255);
    $table->primary('session_id');
    $table->integer('session_access');
    $table->text('session_data', 249);
});