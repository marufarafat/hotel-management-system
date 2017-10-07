<?php 
namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class UsersResets extends Model{


    public $timestamps = false;

    protected $table = 'users_resets';
    protected $fillable = [
        'user', 
        "selector",
        "token",
        "expires"
    ]; 
}