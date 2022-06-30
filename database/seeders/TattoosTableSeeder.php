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
        $category3 = Tattoo::create([
            'name' => 'Full Shade',
            'price' => 2000,
            'tattoos_categories_id' => 1
        ]);
        $category4 = Tattoo::create([
            'name' => 'One Hour Tattoo',
            'price' => 1000,
            'tattoos_categories_id' => 1
        ]);
        $category5 = Tattoo::create([
            'name' => '30 Minutes Tattoo',
            'price' => 500,
            'tattoos_categories_id' => 1
        ]);
        $category6 = Tattoo::create([
            'name' => 'Quick Small Tattoo',
            'price' => 2000,
            'tattoos_categories_id' => 1
        ]);
    }
}
