<?php 
namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class UsersResets extends Model{


    public $timestamps = false;

    protected $table = 'users_resets';
    protected $fillable = [
        'user', 
        "selector",
        "token",
        "expires"
    ]; 

    public function createTable(){
        Capsule::schema()->create($this->table, function($table){

            $table->bigIncrements('id');
            $table->integer('user');
            $table->string('selector', 20)->unique();
            $table->string('token', 255);
            $table->integer('expires');
            $table->unique(['user', 'expires']);
        });
    }

    public function dropTable(){
        Capsule::schema()->dropIfExists($this->table);
    }
}