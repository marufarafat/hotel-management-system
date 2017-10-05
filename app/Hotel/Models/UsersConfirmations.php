<?php 
namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class UsersConfirmations extends Model{


    public $timestamps = false;

    protected $table = 'users_confirmations';
    protected $fillable = [
        'user_id', 
        "email",
        "selector",
        "token",
        "expires"
    ]; 

    public function createTable(){
        Capsule::schema()->create($this->table, function($table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('email', 249);
            $table->string('selector', 16)->unique();
            $table->string('token', 255);
            $table->integer('expires');
            // $table->integer('expires');
            $table->index('user_id');
            $table->unique(['email', 'expires']);
        });
    }

    public function dropTable(){
        Capsule::schema()->dropIfExists($this->table);
    }
}