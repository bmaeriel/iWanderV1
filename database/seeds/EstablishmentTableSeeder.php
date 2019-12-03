<?php

use Illuminate\Database\Seeder;
use App\Establishment;

class EstablishmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $establishment = new Establishment();
      $establishment->establishment_name = 'Restaurants';
      $establishment->save();

      $establishment = new Establishment();
      $establishment->establishment_name = 'Quick Bites';
      $establishment->save();

      $establishment = new Establishment();
      $establishment->establishment_name = 'Dessert';
      $establishment->save();

      $establishment = new Establishment();
      $establishment->establishment_name = 'Coffee & Tea';
      $establishment->save();

      $establishment = new Establishment();
      $establishment->establishment_name = 'Bakeries';
      $establishment->save();

      $establishment = new Establishment();
      $establishment->establishment_name = 'Bars & Pubs';
      $establishment->save();

      $establishment = new Establishment();
      $establishment->establishment_name = 'Specialty Food & Market';
      $establishment->save();
    }
}
