<?php

use Illuminate\Database\Seeder;
use App\DietaryRestriction;

class DietaryRestrictionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dietaryRestriction = new DietaryRestriction();
      $dietaryRestriction->dietary_restriction_name = 'Vegetarian Friendly';
      $dietaryRestriction->save();

      $dietaryRestriction = new DietaryRestriction();
      $dietaryRestriction->dietary_restriction_name = 'Vegan Options';
      $dietaryRestriction->save();

      $dietaryRestriction = new DietaryRestriction();
      $dietaryRestriction->dietary_restriction_name = 'Gluten Free Options';
      $dietaryRestriction->save();

      $dietaryRestriction = new DietaryRestriction();
      $dietaryRestriction->dietary_restriction_name = 'Halal';
      $dietaryRestriction->save();

      $dietaryRestriction = new DietaryRestriction();
      $dietaryRestriction->dietary_restriction_name = 'Kosher';
      $dietaryRestriction->save();
    }
}
