<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Piercing;
class PiercingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Piercing::create([
            'name' => 'Ear Lobe',
            'price' => 150,
            'piercing_categories_id' => 1
        ]);
        $category2 = Piercing::create([
            'name' => 'Surface Tragus',
            'price' => 250,
            'piercing_categories_id' => 1
        ]);
        $category3 = Piercing::create([
            'name' => 'Tragus',
            'price' => 250,
            'piercing_categories_id' => 1
        ]);
        $category4 = Piercing::create([
            'name' => 'Daith',
            'price' => 300,
            'piercing_categories_id' => 1
        ]);
        $category5 = Piercing::create([
            'name' => 'Conch',
            'price' => 300,
            'piercing_categories_id' => 1
        ]);
        $category6 = Piercing::create([
            'name' => 'Rook',
            'price' => 300,
            'piercing_categories_id' => 1
        ]);
        $category7 = Piercing::create([
            'name' => 'Helix',
            'price' => 250,
            'piercing_categories_id' => 1
        ]);
        $category8 = Piercing::create([
            'name' => 'Industrial',
            'price' => 300,
            'piercing_categories_id' => 1
        ]);
        $category9 = Piercing::create([
            'name' => 'Labret',
            'price' => 300,
            'piercing_categories_id' => 2
        ]);
        $category10 = Piercing::create([
            'name' => 'Monroe',
            'price' => 400,
            'piercing_categories_id' => 2
        ]);
        $category11 = Piercing::create([
            'name' => 'Medusa',
            'price' => 300,
            'piercing_categories_id' => 2
        ]);
        $category12 = Piercing::create([
            'name' => 'Spider Bite',
            'price' => 300,
            'piercing_categories_id' => 2
        ]);
        $category13 = Piercing::create([
            'name' => 'Nostril',
            'price' => 300,
            'piercing_categories_id' => 2
        ]);
        $category14 = Piercing::create([
            'name' => 'Septum',
            'price' => 300,
            'piercing_categories_id' => 2
        ]);
        $category15 = Piercing::create([
            'name' => 'Eyebrow',
            'price' => 300,
            'piercing_categories_id' => 2
        ]);

        $category16 = Piercing::create([
            'name' => 'Tounge',
            'price' => 400,
            'piercing_categories_id' => 3
        ]);
        $category17 = Piercing::create([
            'name' => 'Smiley',
            'price' => 300,
            'piercing_categories_id' => 3
        ]);
        $category18 = Piercing::create([
            'name' => 'Snake Eyes',
            'price' => 600,
            'piercing_categories_id' => 3
        ]);

        $category19 = Piercing::create([
            'name' => 'Nipples',
            'price' => 600,
            'piercing_categories_id' => 4
        ]);
        $category20 = Piercing::create([
            'name' => 'Genital',
            'price' => 600,
            'piercing_categories_id' => 4
        ]);
        $category21 = Piercing::create([
            'name' => 'Belly',
            'price' => 400,
            'piercing_categories_id' => 4
        ]);
    }
}
