<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category;
        $param = [
            'name'=>'勉強',
        ];
        $category->fill($param)->save();

        $category = new Category;
        $param = [
            'name'=>'運動',
        ];
        $category->fill($param)->save();
        
        $category = new Category;
        $param = [
            'name'=>'食事',
        ];
        $category->fill($param)->save();
        
    }
}
