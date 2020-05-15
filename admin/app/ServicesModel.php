<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesModel extends Model
{
    //Services Table Model
    public $table        = 'services';
    public $primaryKey   = 'id';
    public $incrementing = true;
    public $keyType      = 'int';
    public $timestamps   = false;   
}
