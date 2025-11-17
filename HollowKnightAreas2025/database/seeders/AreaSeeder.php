<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\Boss;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        $areas = ([
            [
                'name' => 'Dirtmouth',
                'description' => 'A desolate town with a handful of residents. Includes multiple shop npcs and the entrance to the underground.',
                'rooms' => 1,
                'connections' => 3,
                'image' => 'dirtmouth.png',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'name' => 'Kings Pass',
                'description' => 'Easy tutorial area where the player can learn the controls.',
                'rooms' => 4,
                'connections' => 2,
                'image' => 'kingspass.png',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'name' => 'City of Tears',
                'description' => 'A populated town where it constantly rains. Lurien the Watcher resides here.',
                'rooms' => 37,
                'connections' => 7,
                'image' => 'cityoftears.png',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'name' => 'The Abyss',
                'description' => 'The deep, dark bottom of the world.',
                'rooms' => 6,
                'connections' => 1,
                'image' => 'theabyss.png',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'name' => 'Crystal Peak',
                'description' => 'A crystal covered mountain, containing many still populated mineshafts.',
                'rooms' => 26,
                'connections' => 5,
                'image' => 'crystalpeak.png',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ]
        ]);

        foreach ($areas as $areaData)
        {
            $area = Area::create(array_merge($areaData, ['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]));

            $bosses = Boss::inRandomOrder()->take(2)->pluck('id');

            $area->bosses()->attach($bosses);
        }
    }
}
