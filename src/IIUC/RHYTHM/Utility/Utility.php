<?php
/**
 * Created by PhpStorm.
 * User: FAHIM HASAN
 * Date: 9/22/2017
 * Time: 1:52 AM
 */

namespace App\Utility;


class Utility
{

    public function redirect($url){
        header("Location:$url");

    }

    public static function d($myVar){
        echo  "<pre>";
        var_dump($myVar);
        echo  "</pre>";
    }


    public static function dd($myVar){
        echo  "<pre>";
        var_dump($myVar);
        echo  "</pre>";
        die;
    }

}