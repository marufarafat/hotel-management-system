<?php 

namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class Booking extends Model{

    public $timestamps = false;

    protected $table = 'booking';
    
    protected $fillable = [
        "cabinid",
        "date",
        "totalPrice",
        "user"
    ]; 
}