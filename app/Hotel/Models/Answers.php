<?php 

namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class Answers extends Model{

    public $timestamps = false;

    protected $table = 'answers';
    
    protected $fillable = [
        "question_id",
        "user_id",
        "date",
        "answer"
    ]; 
}