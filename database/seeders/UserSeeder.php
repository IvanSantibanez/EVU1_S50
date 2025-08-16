<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Rojas',
            'email' => 'juan@correo.com',
            'password' => 'Passwordtest01',
        ]);

        User::create([
            'name' => 'Maria Paz',
            'email' => 'maria@correo.com',
            'password' => 'Passwordtest02',
        ]);
    }
}
