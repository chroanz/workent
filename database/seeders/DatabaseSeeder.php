<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Room;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(12)
            ->has(Client::factory()->count(1))
            ->create();

        Room::factory(8)->create();
    }
}
