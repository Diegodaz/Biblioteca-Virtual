<?php

namespace Database\Seeders;

use App\Models\Paper;
use Illuminate\Database\Seeder;

class PaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paper::factory(20)->create()->each(function (Paper $paper) {
            $paper->tags()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);
            $paper->authors()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);
        });
    }
}
