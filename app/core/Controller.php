<?php

/**
 * Created by PhpStorm.
 * User: dalibor
 * Date: 12/27/16
 * Time: 21:21
 */
class Controller
{

    public function model($model){
        require_once '../app/models' . $model . '.php';

        return new $model();
    }

    public function view($view, $data = []){

        require_once '../app/views/' . $view . '.php';
    }
}