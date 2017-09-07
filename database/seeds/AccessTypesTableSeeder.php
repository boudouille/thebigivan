<?php

use Illuminate\Database\Seeder;

class AccessTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create accesses types
        DB::table('access_types')->insert([
            'name' => 'mysql',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('access_types')->insert([
            'name' => 'ftp',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('access_types')->insert([
            'name' => 'ssh',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);

        //For mysql fields
        DB::table('access_fields')->insert([
            'access_type_id' => 1,
            'field' => 'host',
            'required' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('access_fields')->insert([
            'access_type_id' => 1,
            'field' => 'username',
            'required' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('access_fields')->insert([
            'access_type_id' => 1,
            'field' => 'password',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('access_fields')->insert([
            'access_type_id' => 1,
            'field' => 'dbname',
            'required' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
