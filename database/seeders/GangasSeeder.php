<?php

namespace Database\Seeders;

use App\Models\Ganga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GangasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ganga::factory()->count(3)->create();
    }
}
