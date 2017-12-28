<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['Politics','Sports'];

        foreach ($categories as $category) {

            // Create a new role
            \App\Models\Category::create([
                'name' => $category
            ]);
        }
    }
}
