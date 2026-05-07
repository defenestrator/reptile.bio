<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'contributor', 'label' => 'Contributor'],
            ['name' => 'moderator',   'label' => 'Moderator'],
            ['name' => 'admin',       'label' => 'Administrator'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }
    }
}
