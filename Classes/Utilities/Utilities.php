<?php


namespace Core\Utilities;


class Utilities
{
    public static function redirect($path){
        header('location:'.$path);
    }

    public static function pre($data){
        echo '<pre>';
            var_dump($data);
        echo '</pre>';
    }

    public static function preDie($data){
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }
}