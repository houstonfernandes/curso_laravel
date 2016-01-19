<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->truncate();
/* utilizando loop
        for($i = 1; $i<=15; $i++){
            Category::create([
                'name' => 'category seed' . $i,
                'description' => 'description seed '.$i
            ]);
        }
*/

/*utilizando faker
            Category::create([
                'name' => $faker->word,
                'description' => $faker->sentence
            ]);
*/

//utilizando factory (definir criaçao em factory\ModelFactory)
        factory('CodeCommerce\Category',15)->create();
    }
}