<?php

namespace App\Http\Controllers;

use App\Mysql;
use Illuminate\Http\Request;
use PDO;

class MysqlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd(request()->all());

        Mysql::create(request()->all());

        return  back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mysql $mysql
     * @return \Illuminate\Http\Response
     */
    public function show(Mysql $mysql)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mysql $mysql
     * @return \Illuminate\Http\Response
     */
    public function edit(Mysql $mysql)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Mysql $mysql
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mysql $mysql)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mysql $mysql
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mysql $mysql)
    {
        //
    }

    public function testConnection()
    {

        $host = request('host');
        $user = request('username');
        $pass = request('password');
        $dbname = request('dbname');

        try {
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Charset à utf-8
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Gestion des erreurs
                PDO::ATTR_PERSISTENT => false
            );
            $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass, $options);
            $db->exec("SET lc_time_names = 'fr_FR'");
            $db->exec("SET CHARACTER SET utf8");
        } catch (\PDOException $e) {
            //Mysql connection impossible
            return 0;
        }

        return 1;
    }
}
