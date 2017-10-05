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
        'email', 
        "password", 
        "username", 
        "status", 
        "verified", 
        "resettable", 
        "roles_mask", 
        "last_login"
    ]; 

    public function createTable(){
        Capsule::schema()->create($this->table, function($table){
            $table->increments('id');
            $table->string('email', 249)->unique();
            $table->string('password', 255);
            $table->string('username', 100);
            $table->tinyInteger('status');
            $table->tinyInteger('verified');
            $table->tinyInteger('resettable');
            $table->integer('roles_mask');
            $table->integer('registered');
            $table->integer('last_login');
        });
    }

    public function dropTable(){
        Capsule::schema()->dropIfExists($this->table);
    }
}