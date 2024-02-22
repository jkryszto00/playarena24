<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    const SEASONS = [
        '2023/2024',
        '2022/2023',
        '2021/2022'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::SEASONS as $season) {
            Season::create([
                'name' => $season,
                'start_date' => explode('/', $season)[0].'-09-01',
                'end_date' => explode('/', $season)[1].'-07-31'
            ]);
        }
    }
}
