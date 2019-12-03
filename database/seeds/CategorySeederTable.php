<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $category = new Category();
      $category->category_name = 'Concerts & Shows';
      $category->save();

      $category = new Category();
      $category->category_name = 'Museums';
      $category->save();

      $category = new Category();
      $category->category_name = 'Sights & Landmarks';
      $category->save();

      $category = new Category();
      $category->category_name = 'Shopping';
      $category->save();

      $category = new Category();
      $category->category_name = 'Fun & Games';
      $category->save();
    }
}
