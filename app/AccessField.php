<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessField extends Model
{
    public function accessType()
    {
        return $this->belongsTo('App\AccessType','id','access_type_id');
    }
}
