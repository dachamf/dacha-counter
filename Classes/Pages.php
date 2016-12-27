<?php

/**
 * Created by PhpStorm.
 * User: dalibor
 * Date: 12/17/16
 * Time: 19:20
 */
class Pages
{
    protected $assagnedValues = array();

    protected $partialBuffer;

    protected $tpl;


    function __construct($_path)
    {
        if (!empty($_path)) {
            if (file_exists($_path)) {
                $this->tpl = file_get_contents($_path);
            } else {
                echo "<b>Template Error: </b> File '{$_path}' inclusion Error.";
            }
        }
    }

    function assign($_searchString, $_replaceString)
    {
        if (!empty($_searchString)) {
            $this->assagnedValues[strtoupper($_searchString)] = $_replaceString;
        }
    }

    function renderPartials($_searchString, $_path, $_assignedValues = array())
    {
        if (!empty($_searchString)) {
            $_path = file_exists($_path)? $_path : PARTIALS_PATH . '/' . 404 . '.html';
            if (file_exists($_path)) {
                $this->partialBuffer = file_get_contents($_path);
                if (count($_assignedValues) > 0) {
                    foreach ($_assignedValues as $key => $value) {
                        $this->partialBuffer = str_replace('{' . strtoupper($key) . '}', $value, $this->partialBuffer);
                    }
                }
                $this->tpl = str_replace('[' . strtoupper($_searchString) . ']', $this->partialBuffer, $this->tpl);
                $this->partialBuffer = '';
            }
        } else {
            echo "<b>Template Error: </b> Partial file '{$_path}' Inclusion Error.";
        }
    }

    function show(){
        if(count($this->assagnedValues) > 0){
            foreach ($this->assagnedValues as $key => $value) {
                $this->tpl = str_replace('{' . $key . '}', $value, $this->tpl);
            }
        }
        echo $this->tpl;
    }

}