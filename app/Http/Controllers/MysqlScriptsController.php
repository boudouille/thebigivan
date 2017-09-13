<?php

namespace App\Http\Controllers;

use App\Mysql;
use App\MysqlScripts;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDO;

class MysqlScriptsController extends Controller
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

        $script = new MysqlScripts();

        $script->mysql_access_id = request('mysql_access_id');
        $script->name = request('name');
        $script->script = str_replace("\r\n", " ", request('script'));

        $script->save();
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MysqlScripts $mysqlScripts
     * @return \Illuminate\Http\Response
     */
    public function show(MysqlScripts $mysqlScripts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MysqlScripts $mysqlScripts
     * @return \Illuminate\Http\Response
     */
    public function edit(MysqlScripts $mysqlScripts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\MysqlScripts $mysqlScripts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MysqlScripts $mysqlScripts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MysqlScripts $mysqlScripts
     * @return \Illuminate\Http\Response
     */
    public function destroy(MysqlScripts $mysqlScripts)
    {
        //
    }

    public function execute($id)
    {

        $request = MysqlScripts::with('mysql_access')->find($id);

        $host = $request->mysql_access->host;
        $username = $request->mysql_access->username;
        $password = $request->mysql_access->password;
        $dbname = $request->mysql_access->dbname;

        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);

        $sth = $db->prepare($request->script);
        $sth->execute();

        //If this is a select type
        if (stripos($request->script, 'select') === 0) {
            $results = $sth->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                Excel::create(trim($request->name).'_'.date('Y-m-d'), function ($excel) use ($results) {

                    $excel->sheet('Sheetname', function ($sheet) use ($results) {

                        $cols = array_keys($results[0]);

                        $sheet->row(1, $cols);

                        $sheet->row(1, function ($row) {

                            // call cell manipulation methods
                            $row->setFontWeight('bold');

                        });

                        $i = 2;

                        foreach ($results as $result) {
                            $sheet->row($i, $result);

                            $i++;
                        }

                    });

                })->export('csv');
            }
        }


    }
}
