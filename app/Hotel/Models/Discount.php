<?php


namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
* Discount
*/
class Discount extends Model{
    
    public $timestamps = false;

    protected $table = 'discount';
    
    protected $fillable = [
        "name",
        "parcent",
        "code",
        "start_date",
        "end_date"
    ]; 
}