<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Municipality;
use App\Models\User;
use App\Models\State;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        State::factory(5)->create()->each(function ($row) {
            $row->districts()->saveMany(District::factory(3)->make());
        });

        District::factory(5)->create()->each(function ($row) {
            $row->municipalities()->saveMany(Municipality::factory(3)->make());
        });

        Municipality::factory(5)->create();
    }
}
