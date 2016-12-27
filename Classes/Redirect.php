<?php

/**
 * Created by PhpStorm.
 * User: dalibor
 * Date: 12/18/16
 * Time: 19:25
 */
class Redirect
{
    public static function to($location = null)
    {

        if(is_numeric($location)){
            switch ($location){
                case 404:
                    header("HTTP/1.0 404 Not found");
                    header('Location: ', $location);
                    exit();
                    break;
            }
        }
        if($location){
            header('Location: ' . $location);
            exit();
        }
    }
}