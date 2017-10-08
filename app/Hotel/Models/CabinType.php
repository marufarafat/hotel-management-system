<?php


namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
* cabins
*/
class CabinType extends Model{
    
    public $timestamps = false;

    protected $table = 'cabin_type';
    
    protected $fillable = [
        "name"
    ]; 
}