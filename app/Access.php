<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $fillable = ['site_id','access_nature_id'];

    public function site()
    {
        return $this->belongsTo('App\Site','site_id','id');
    }

    public function collaboratorAccesses()
    {
        return $this->hasMany('App\CollaboratorAccess','access_id','id');
    }

    public function accessType()
    {
        return $this->belongsTo('App\AccessType','access_type_id','id');
    }
}
