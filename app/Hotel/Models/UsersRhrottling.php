<?php 
namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class UsersRhrottling extends Model{


    public $timestamps = false;

    protected $table = 'users_throttling';
    protected $fillable = [
        'bucket', 
        "tokens",
        "replenished_at",
        "expires_at",
        "bucket"
    ]; 
}