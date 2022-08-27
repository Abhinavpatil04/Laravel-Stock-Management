<?php

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $randomNumber = rand(123, 789);

            $team = Team::factory()->create([
                'name' => "Library $randomNumber",
            ]);

        }
    }
}
