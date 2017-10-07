<?php 
namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class UsersConfirmations extends Model{


    public $timestamps = false;

    protected $table = 'users_confirmations';
    protected $fillable = [
        'user_id', 
        "email",
        "selector",
        "token",
        "expires"
    ]; 
}