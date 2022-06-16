<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TattoosCategory;
class TattooCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = TattoosCategory::create([
            'name' => 'Tattoed Eyebrow'
        ]);
    }
}
