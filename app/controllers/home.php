<?php

/**
 * Created by PhpStorm.
 * User: dalibor
 * Date: 12/27/16
 * Time: 21:12
 */
class Home extends Controller
{


    public function index()
    {
        $this->view('home/index');
    }

    public function report(){
        $this->view('home/report');
    }

}