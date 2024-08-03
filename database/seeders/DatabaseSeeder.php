<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use App\Practice;
use App\Models\Movie;
use App\Models\Sheet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Practice::factory(10)->create();
        Genre::factory(10)->create();
        Movie::factory(1)->create();

        $sheetRows = ['a', 'b', 'c'];
        foreach($sheetRows as $row) {
            for($i = 1; $i <= 5; $i++) {
                Sheet::create([
                    'row' => $row,
                    'column' => $i,
                ]);
            }
        }
    }
}
