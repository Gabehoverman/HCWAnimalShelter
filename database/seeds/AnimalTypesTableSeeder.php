<?php

use Illuminate\Database\Seeder;

class AnimalTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_types')->insert(array(
            array('name' => 'Dog'),
            array('name' => 'Cat'),
            array('name' => 'Other')
        ));
    }
}
