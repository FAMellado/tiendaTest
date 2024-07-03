<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@123',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@123',
            'password' => Hash::make('12345678'),
        ]);
    }
}
