<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mysql extends Model
{
    //
    protected $fillable = ['name','site_id','host','username','password','dbname'];
    protected $table = 'mysql_accesses';

    public function site()
    {
        return $this->belongsTo('App\Site','id','site_id');
    }

    public function mysqlScripts()
    {
        return $this->hasMany('App\MysqlScripts','mysql_access_id','id');
    }
}
