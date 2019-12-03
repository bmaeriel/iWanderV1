<?php

use Illuminate\Database\Seeder;
use App\City;
use App\District;

class CitySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Retrieve Dublin from district table
      $district_dub = District::where('district_name', 'County Dublin')->value('id');

      $city_dub01 = new City();
      $city_dub01->city_name = "Dun Laoghaire";
      $city_dub01->district_id = $district_dub;
      $city_dub01->district()->associate($district_dub);
      $city_dub01->about = "Dun Laoghaire is a popular tourist spot due to its vast selection of activities. A visitor can relax in one of its many restaurants or pubs, or take a walk along one of the piers. ";
      $city_dub01->save();

      $city_dub02 = new City();
      $city_dub02->city_name = "Dalkey";
      $city_dub02->district_id = $district_dub;
      $city_dub02->district()->associate($district_dub);
      $city_dub02->about = "Dalkey is a coastal suburb and resort located 13km (8 miles) south-east of Dublin City Centre.";
      $city_dub02->save();

      //Retrieve Paris from district table
      $district_ile = District::where('district_name', 'Île-de-France')->value('id');

      $city_ile01 = new City();
      $city_ile01->city_name = "Paris";
      $city_ile01->district_id = $district_ile;
      $city_ile01->district()->associate($district_ile);
      $city_ile01->about = "A beautiful and romantic city fit for any itinerary, Paris brims with historic associations and remains vastly influential in the realms of culture, art, fashion, food and design. ";
      $city_ile01->save();

      $city_ile02 = new City();
      $city_ile02->city_name = "Saint-Cloud";
      $city_ile02->district_id = $district_ile;
      $city_ile02->district()->associate($district_ile);
      $city_ile02->about = "There’s boundless parkland and golf courses, and the centre of Saint-Cloud is so unhurried it’s been nicknamed “Le Village”. Go exploring and take a peek at the mansions behind gates on leafy, hilly streets, and amble up to the lookouts over the Seine.";
      $city_ile02->save();


    }
}
