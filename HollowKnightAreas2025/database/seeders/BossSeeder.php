<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Boss;

class BossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Boss::insert([
            ['name' => 'False Knight', 'image' => 'falseknight.jpg', 'description' => 'Tutorial boss, a weak maggot protected by sturdy armor.', 'health' => 355],
            ['name' => 'Traitor Lord', 'image' => 'traitorlord.jpg', 'description' => 'Former lord of the mantis tribe, lost himself in search for power', 'health' => 800],
            ['name' => 'Pure Vessel', 'image' => 'purevessel.jpg', 'description' => 'The purest and strongest form a knight can take', 'health' => 1600],
            ['name' => 'Nightmare King Grimm', 'image' => 'nkg.jpg', 'description' => 'Nightmarish entertainer and leader of the Grimm Troupe', 'health' => 1500],
            ['name' => 'Broken Vessel', 'image' => 'brokenvessel.jpg', 'description' => 'Shattered corpse, reanimated by infected parasites', 'health' => 525],
            ['name' => 'Lost Kin', 'image' => 'lostkin.jpg', 'description' => 'Dreamt warrior of a shattered corpse', 'health' => 1200],
            ['name' => 'Enraged Guardian', 'image' => 'enragedguardian.jpg', 'dexcription' => 'Heavyset miner of the Crystal Peak overcome by crystal growth.', 'health' => 600],
        ]);
    }
}
