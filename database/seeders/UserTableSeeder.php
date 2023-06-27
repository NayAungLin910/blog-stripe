<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'type' => User::ADMIN,
        ])->profile()->save(Profile::factory()->make());

        User::factory()->create([
            'name' => 'Writer User',
            'email' => 'writer@example.com',
            'password' => bcrypt('password'),
            'type' => User::WRITER,
        ])->profile()->save(Profile::factory()->make());

        User::factory()->create([
            'name' => 'MOD User',
            'email' => 'mod@example.com',
            'password' => bcrypt('password'),
            'type' => User::MODERATOR,
        ])->profile()->save(Profile::factory()->make());

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'type' => User::DEFAULT,
        ])->profile()->save(Profile::factory()->make());

        User::factory(10)->create()->each(function ($user) {
            $user->profile()->save(Profile::factory()->make());
        });
    }
}
