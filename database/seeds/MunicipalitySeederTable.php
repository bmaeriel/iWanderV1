<?php

use Illuminate\Database\Seeder;
use App\Municipality;
use App\City;

class MunicipalitySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Retrieve Paris from district table
      $city_paris = City::where('city_name', 'Paris')->value('id');

      $municipality_paris01 = new Municipality();
      $municipality_paris01->municipality_name = "Louvre";
      $municipality_paris01->city_id = $city_paris;
      $municipality_paris01->city()->associate($city_paris);
      $municipality_paris01->about = "This arrondissement is situated principally on the right bank of the River Seine. The arrondissement is one of the oldest in Paris, the Île de la Cité having been the heart of the city of Lutetia. ";
      $municipality_paris01->save();

      $municipality_paris01 = new Municipality();
      $municipality_paris01->municipality_name = "Élysée";
      $municipality_paris01->city_id = $city_paris;
      $municipality_paris01->city()->associate($city_paris);
      $municipality_paris01->about = "The arrondissement, called Élysée, is situated on the right bank of the River Seine and centred on the Champs-Élysées. The 8th is, together with the 1st, 9th, 16th, and 17th arrondissements, one of Paris's main business districts.";
      $municipality_paris01->save();
    }
}
