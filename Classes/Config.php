<?php

/**
 * Created by PhpStorm.
 * User: dalibor
 * Date: 12/17/16
 * Time: 20:21
 */
class Config
{
    public static function get($path = null){
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);


            foreach ($path as $bit) {
                if(isset($config[$bit])){
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }

}