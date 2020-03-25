<?php

use Illuminate\Database\Seeder;

class JobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_types')->insert([
            'name' => 'fulltime'
        ]);

        DB::table('job_types')->insert([
            'name' => 'parttime'
        ]);

        DB::table('job_types')->insert([
            'name' => 'internship'
        ]);
    }
}
