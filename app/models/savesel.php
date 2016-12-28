<?php

/**
 * Created by PhpStorm.
 * User: djord
 * Date: 12/28/2016
 * Time: 12:26 PM
 */

use Illuminate\Database\Eloquent\Model as Eloquent;

class SaveSel extends Eloquent
{
    public $timestamps = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'email', 'orderId', 'saveSale', 'reason'];
}