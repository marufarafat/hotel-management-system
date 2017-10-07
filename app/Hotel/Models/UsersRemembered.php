<?php 
namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class UsersRemembered extends Model{


    public $timestamps = false;

    protected $table = 'users_remembered';
    protected $fillable = [
        'user', 
        "selector",
        "token",
        "expires",
    ]; 
}