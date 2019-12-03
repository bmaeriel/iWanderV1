<?php

use Illuminate\Database\Seeder;
use App\MealType;

class MealTypeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $mealType = new MealType();
      $mealType->meal_type_name = 'Breakfast';
      $mealType->save();

      $mealType = new MealType();
      $mealType->meal_type_name = 'Brunch';
      $mealType->save();

      $mealType = new MealType();
      $mealType->meal_type_name = 'Lunch';
      $mealType->save();

      $mealType = new MealType();
      $mealType->meal_type_name = 'Dinner';
      $mealType->save();
    }
}
