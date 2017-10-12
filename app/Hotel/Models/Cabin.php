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
        "so_start_date",
        "so_end_date",
        "so_price",
        "price",
        "cabin_img",
        "cabin_thumb",
        "type",
        "facility"
    ]; 
}