<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mike Hatfield',
            'email' => 'oakraven13@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
