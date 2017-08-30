<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessType extends Model
{
    //
    public function accessFields()
    {
        return $this->hasMany('App\AccessField','access_type_id','id')->orderBy('id','asc');
    }
}
