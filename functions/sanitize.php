<?php
/**
 * Created by PhpStorm.
 * User: dalibor
 * Date: 12/17/16
 * Time: 20:03
 */

function escape($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}