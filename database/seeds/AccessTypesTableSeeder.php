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
            'name' => 'FTP'
        ]);
        DB::table('access_types')->insert([
            'name' => 'SSH'
        ]);
        DB::table('access_types')->insert([
            'name' => 'MySQL'
        ]);
    }
}
