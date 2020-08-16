<?php

class Request {
    public function __call($name, $arguments)
    {
        trigger_error("Method '$name' not found ", E_USER_ERROR);
    }
    public static function __callStatic($name, $arguments)
    {
        trigger_error("Method Static '$name' not found ", E_USER_ERROR);
    }
    public static function GetMethod(){
        return $_SERVER['REQUEST_METHOD'];
    } 
    public static function GetValue($Key){
        if (Request::Exist($Key))
            return htmlspecialchars($_REQUEST[$Key]);
        else
            trigger_error("Request:: 'GetValue('$Key') not found ", E_USER_ERROR);
    }
    public static function Exist($Key){
        return (isset($_REQUEST[$Key]) && !empty($_REQUEST[$Key]));
    }
    public static function Exists($Arrays){
        foreach ($Arrays as $value)
            if (!Request::Exist($value))
                return false;
        return true;
    }
}
