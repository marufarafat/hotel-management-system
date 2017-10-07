<?php 

namespace Hotel;

/**
* CSRF
*/
class CSRF{


    public static function set($key,$value){

        if (isset($_SESSION)){
            $_SESSION[$key]= $value;
        }
    }

    public static function distroy($key){

        $_SESSION[$key]=' ';
        unset($_SESSION[$key]);
    }

    public static function get($key){

        if (isset($_SESSION[$key])){

            return $_SESSION[$key];
        } 
        return false; 
    }

    public static function generate($unique_form_name){
        $token = uniqid(mt_rand(), true);
        self::set($unique_form_name,$token);
        return $token;
    }
}