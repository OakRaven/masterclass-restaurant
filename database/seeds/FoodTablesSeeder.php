<?php

use App\Category;
use App\Food;
use Illuminate\Database\Seeder;

class FoodTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_drinks = Category::create(['name' => 'Drinks']);
        $category_appetizers = Category::create(['name' => 'Appetizers']);
        $category_entries = Category::create(['name' => 'Entries']);
        $category_desserts = Category::create(['name' => 'Desserts']);

        $category_drinks->food()->create([
            'name' => 'Coke',
            'description' => 'Cold can of Coke, 355 ml',
            'price' => 1.25,
        ]);

        $category_drinks->food()->create([
            'name' => 'Diet Coke',
            'description' => 'Cold can of Diet Coke, 355 ml',
            'price' => 1.25,
        ]);

        $category_drinks->food()->create([
            'name' => 'Smart Water',
            'description' => 'Cold bottle of mineral-free water, 640 ml',
            'price' => 3.50,
        ]);
    }
}
