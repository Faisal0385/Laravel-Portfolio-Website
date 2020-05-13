<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //

    public $table        = 'visitor';
    public $primaryKey   = 'id';
    public $incrementing = true;
    public $keyType      = 'int';
    public  $timestamps  = false;

}
