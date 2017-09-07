<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MysqlScripts extends Model
{
    //
    protected $fillable = ['name','mysql_access_id','script'];

    public function mysql_acess()
    {
        return $this->belongsTo('App\Mysql','id','mysql_access_id');
    }
}
