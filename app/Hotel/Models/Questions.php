<?php 

namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class Questions extends Model{

    public $timestamps = false;

    protected $table = 'questions';
    
    protected $fillable = [
        "question_time",
        "user_id",
        "question",
        "descriptions"
    ]; 
}