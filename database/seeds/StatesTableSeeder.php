<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(array(
            array('id' => 1, 'name' => 'Alabama', 'abbreviation' => 'AL'),
            array('id' => 2, 'name' => 'Alaska', 'abbreviation' => 'AK'),
            array('id' => 3, 'name' => 'Arizona', 'abbreviation' => 'AZ'),
            array('id' => 4, 'name' => 'Arkansas', 'abbreviation' => 'AR'),
            array('id' => 5, 'name' => 'California', 'abbreviation' => 'CA'),
            array('id' => 6, 'name' => 'Colorado', 'abbreviation' => 'CO'),
            array('id' => 7, 'name' => 'Connecticut', 'abbreviation' => 'CT'),
            array('id' => 8, 'name' => 'Delaware', 'abbreviation' => 'DE'),
            array('id' => 9, 'name' => 'Florida', 'abbreviation' => 'FL'),
            array('id' => 10, 'name' => 'Georgia', 'abbreviation' => 'GA'),
            array('id' => 11, 'name' => 'Hawaii', 'abbreviation' => 'HI'),
            array('id' => 12, 'name' => 'Idaho', 'abbreviation' => 'ID'),
            array('id' => 13, 'name' => 'Illinois', 'abbreviation' => 'IL'),
            array('id' => 14, 'name' => 'Indiana', 'abbreviation' => 'IN'),
            array('id' => 15, 'name' => 'Iowa', 'abbreviation' => 'IA'),
            array('id' => 16, 'name' => 'Kansas', 'abbreviation' => 'KS'),
            array('id' => 17, 'name' => 'Kentucky', 'abbreviation' => 'KY'),
            array('id' => 18, 'name' => 'Louisiana', 'abbreviation' => 'LA'),
            array('id' => 19, 'name' => 'Maine', 'abbreviation' => 'ME'),
            array('id' => 20, 'name' => 'Maryland', 'abbreviation' => 'MD'),
            array('id' => 21, 'name' => 'Massachusetts', 'abbreviation' => 'MA'),
            array('id' => 22, 'name' => 'Michigan', 'abbreviation' => 'MI'),
            array('id' => 23, 'name' => 'Minnesota', 'abbreviation' => 'MN'),
            array('id' => 24, 'name' => 'Mississippi', 'abbreviation' => 'MS'),
            array('id' => 25, 'name' => 'Missouri', 'abbreviation' => 'MO'),
            array('id' => 26, 'name' => 'Montana', 'abbreviation' => 'MT'),
            array('id' => 27, 'name' => 'Nebraska', 'abbreviation' => 'NE'),
            array('id' => 28, 'name' => 'Nevada', 'abbreviation' => 'NV'),
            array('id' => 29, 'name' => 'New Hampshire', 'abbreviation' => 'NH'),
            array('id' => 30, 'name' => 'New Jersey', 'abbreviation' => 'NJ'),
            array('id' => 31, 'name' => 'New Mexico', 'abbreviation' => 'NM'),
            array('id' => 32, 'name' => 'New York', 'abbreviation' => 'NY'),
            array('id' => 33, 'name' => 'North Carolina', 'abbreviation' => 'NC'),
            array('id' => 34, 'name' => 'North Dakota', 'abbreviation' => 'ND'),
            array('id' => 35, 'name' => 'Ohio', 'abbreviation' => 'OH'),
            array('id' => 36, 'name' => 'Oklahoma', 'abbreviation' => 'OK'),
            array('id' => 37, 'name' => 'Oregon', 'abbreviation' => 'OR'),
            array('id' => 38, 'name' => 'Pennsylvania', 'abbreviation' => 'PA'),
            array('id' => 39, 'name' => 'Rhode Island', 'abbreviation' => 'RI'),
            array('id' => 40, 'name' => 'South Carolina', 'abbreviation' => 'SC'),
            array('id' => 41, 'name' => 'South Dakota', 'abbreviation' => 'SD'),
            array('id' => 42, 'name' => 'Tennessee', 'abbreviation' => 'TN'),
            array('id' => 43, 'name' => 'Texas', 'abbreviation' => 'TX'),
            array('id' => 44, 'name' => 'Utah', 'abbreviation' => 'UT'),
            array('id' => 45, 'name' => 'Vermont', 'abbreviation' => 'VT'),
            array('id' => 46, 'name' => 'Virginia', 'abbreviation' => 'VA'),
            array('id' => 47, 'name' => 'Washington', 'abbreviation' => 'WA'),
            array('id' => 48, 'name' => 'West Virginia', 'abbreviation' => 'WV'),
            array('id' => 49, 'name' => 'Wisconsin', 'abbreviation' => 'WI'),
            array('id' => 50, 'name' => 'Wyoming', 'abbreviation' => 'WY'),
            array('id' => 51, 'name' => 'Washington DC', 'abbreviation' => 'DC'),
            array('id' => 52, 'name' => 'Puerto Rico', 'abbreviation' => 'PR'),
            array('id' => 53, 'name' => 'U.S. Virgin Islands', 'abbreviation' => 'VI'),
            array('id' => 54, 'name' => 'American Samoa', 'abbreviation' => 'AS'),
            array('id' => 55, 'name' => 'Guam', 'abbreviation' => 'GU'),
            array('id' => 56, 'name' => 'Northern Mariana Islands', 'abbreviation' => 'MP')
        ));
    }
}
