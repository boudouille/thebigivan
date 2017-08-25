<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $fillable = ['project_id','email'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function user()
    {
//        return User::where('email','=',$this->email)->first();
        return $this->belongsTo(User::class,'email','email');
    }

    //

}
