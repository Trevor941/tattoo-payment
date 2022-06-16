<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tattoo;
class TattoosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Tattoo::create([
            'name' => 'Tint',
            'price' => 1500,
            'tattoos_categories_id' => 1
        ]);
        $category2 = Tattoo::create([
            'name' => 'Lining',
            'price' => 1000,
            'tattoos_categories_id' => 1
        ]);
        $category1 = Tattoo::create([
            'name' => 'Full Shade',
            'price' => 2000,
            'tattoos_categories_id' => 1
        ]);
    }
}
