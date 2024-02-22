<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    const COMPETITIONS = [
        'Liga 1',
        'Puchar Bydgoszczy'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::COMPETITIONS as $competition) {
            Competition::create(['name' => $competition]);
        }
    }
}
