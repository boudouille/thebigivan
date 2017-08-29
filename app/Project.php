<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Project extends Model
{
    //
    protected $fillable = ['name','user_id','description'];

    public function creator()
    {
       return $this->belongsTo('App\User', 'user_id','id');
    }

    public function sites()
    {
        return $this->hasMany('App\Site', 'project_id', 'id');
    }

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class)->orderBy('admin','desc');
    }
}
