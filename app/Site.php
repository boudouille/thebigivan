<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    protected $fillable = ['project_id','name','user_id','description'];

    public function project()
    {
        return $this->belongsTo('App\Project','project_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo('App\User','user_id', 'id');
    }
}
