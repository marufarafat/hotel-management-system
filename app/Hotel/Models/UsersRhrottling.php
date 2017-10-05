<?php 
namespace Hotel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
* 
*/
class UsersRhrottling extends Model{


    public $timestamps = false;

    protected $table = 'users_throttling';
    protected $fillable = [
        'bucket', 
        "tokens",
        "replenished_at",
        "expires_at",
        "bucket"
    ]; 

    public function createTable(){
        Capsule::schema()->create($this->table, function($table){

            $table->string("bucket", 44);
            $table->float("tokens");
            $table->integer('replenished_at');
            $table->integer('expires_at');
            $table->primary('bucket');
            $table->index('expires_at');
        });
    }

    public function dropTable(){
        Capsule::schema()->dropIfExists($this->table);
    }
}