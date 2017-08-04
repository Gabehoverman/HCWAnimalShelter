<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            ['id' => 1,
                'email' => 'admin@hcwshelter.com',
                'password' => bcrypt(env("ADMIN_PASSWORD", "Kitty123")),
                'first_name' => 'Site',
                'last_name' => 'Admin',
                'created_at' => new \DateTime('now'),
                'updated_at' => new \DateTime('now'),
                'hidden_ind' => true
            ],
            ['id' => 2,
                'email' => 'hcw.animal.shelter.website@gmail.com',
                'password' => bcrypt(env("ADMIN_PASSWORD", "Kitty123")),
                'first_name' => 'HCW',
                'last_name' => 'Admin',
                'created_at' => new \DateTime('now'),
                'updated_at' => new \DateTime('now'),
                'hidden_ind' => false
            ]

        ));
    }
}
