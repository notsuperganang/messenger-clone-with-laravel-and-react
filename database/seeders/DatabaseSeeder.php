<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ganang Setyo Hadi',
            'email' => 'ganangsetyohadi@gmail.com',
            'password' => bcrypt('kantong123'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Farhanaul Khair',
            'email' => 'farhankhair58@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::factory(10)->create();

        for ($i = 0; $i < 5; $i++) {
            $group = Group::factory()->create([
                'owner_id' => 1,
            ]);

            $users = User::inRandomOrder()->limit(rand(2, 5))->pluck('id');
            $group->users()->attach(array_unique([1, ...$users]));
        }
    }
}
