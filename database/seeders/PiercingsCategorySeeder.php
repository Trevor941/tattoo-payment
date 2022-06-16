<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PiercingCategory;
class PiercingsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = PiercingCategory::create([
            'name' => 'Other Piercings'
        ]);
        $category2 = PiercingCategory::create([
            'name' => 'Facial Piercing'
        ]);
        $category3 = PiercingCategory::create([
            'name' => 'Oral Piercing'
        ]);
        $category4 = PiercingCategory::create([
            'name' => 'Private Body Piercing'
        ]);
    }
}
