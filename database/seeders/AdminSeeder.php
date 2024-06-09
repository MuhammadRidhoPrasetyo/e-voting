<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'nis' => '12345678',
            'password' => Hash::make('12345678')
        ]);

        $role = Role::where('name','admin')->first();
        $user->assignRole($role);
    }
}
