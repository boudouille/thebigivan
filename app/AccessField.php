<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessField extends Model
{
    //
    public function accessValue()
    {
        return $this->belongsTo('App\AccessValue','id','access_field_id');
    }
}
