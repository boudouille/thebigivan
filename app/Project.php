<?php

namespace App;

use User;

use Illuminate\Database\Eloquent\Model;
class Project extends Model
{
    //
    protected $fillable = ['name','user_id','description'];

    public function creator()
    {
       return $this->belongsTo('App\User', 'user_id','id');
    }

    public function collaborators()
    {
        return $this->belongsToMany('App\User','collaborators','project_id','user_id');
    }
}
