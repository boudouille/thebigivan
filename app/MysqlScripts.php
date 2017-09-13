<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MysqlScripts extends Model
{
    //
    protected $fillable = ['name','mysql_access_id','script'];

    public function mysql_access()
    {
        return $this->belongsTo('App\Mysql','mysql_access_id','id');
    }
}
