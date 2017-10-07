<?php 

namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class Users extends Model{

    public $timestamps = false;

    protected $table = 'Users';
    
    protected $fillable = [
        "full_name",
        'email', 
        "password", 
        "username", 
        "phone", 
        "profile_picture", 
        "address1", 
        "address2", 
        "city", 
        "postcode", 
        "gender", 
        "status", 
        "verified", 
        "resettable", 
        "roles_mask", 
        "last_login"
    ]; 
}