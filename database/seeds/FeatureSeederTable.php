<?php

use Illuminate\Database\Seeder;
use App\Feature;

class FeatureSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $feature = new Feature();
      $feature->feature_name = 'Accepts Credit Cards';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Beach';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Buffet';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Delivery';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Dog Friendly';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Family Style';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Free WiFi';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Non-smoking Restaurants';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Outdoor Seating';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Parking Available';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Private Dining';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Reservations';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Serves Alcohol';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Table Service';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Takeout';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Television';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Waterfront';
      $feature->save();

      $feature = new Feature();
      $feature->feature_name = 'Wheelchair Accessible';
      $feature->save();
    }
}
