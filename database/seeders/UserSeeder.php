<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kreirajte 2 admina
        User::factory()->count(2)->admin()->create();

        // Kreirajte 3 obična korisnika
        User::factory()->count(3)->create();
    }
}
