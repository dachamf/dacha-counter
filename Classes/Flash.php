<?php

/**
 * Created by PhpStorm.
 * User: djord
 * Date: 12/28/2016
 * Time: 3:38 PM
 */
class Flash
{
    public function flash($name = '', $message = '', $class = 'success fadeout-message')
    {
        //We can only do something if the name isn't empty
        if (!empty($name)) {
            //No message, create it
            if (!empty($message) && empty($_SESSION[$name])) {
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                if (!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;
            } //Message exists, display it
            elseif (!empty($_SESSION[$name]) && empty($message)) {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : 'success';
                $sName = $_SESSION[$name];
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
                return '<div class=" alert-box' . $class . ' radius" id="msg-flash">' . $_SESSION[$sName] . '<a href="#" class="close">&times;</a></div>';
            }
        }

    }

}