<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Category::create([
        //     'name' => 'Gaseosas',
        //     'description' => 'Productos para beber con gas'
        // ]);
        factory(App\Models\Category::class,20)->create();
    }
}
