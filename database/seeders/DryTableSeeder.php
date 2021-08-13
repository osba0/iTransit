<?php

namespace Database\Seeders;

use App\Models\Dry;
use Illuminate\Database\Seeder;

class DryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory('App\Dry', 55)->create();
        Dry::factory()->times(55)->create();
    }
}
