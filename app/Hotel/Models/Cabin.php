<?php


namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
* cabin
*/
class Cabin extends Model{
    
    public $timestamps = false;

    protected $table = 'cabins';
    
    protected $fillable = [
        "name",
        "descriptions",
        "min_adult",
        "min_child",
        "price",
        "cabin_img",
        "type"
    ]; 
}