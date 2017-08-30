<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollaboratorAccess extends Model
{
    //
    public function collaborator()
    {
        return $this->belongsTo('App\Collaborator','collaborator_id','id');
    }
}
