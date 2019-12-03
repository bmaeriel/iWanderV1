<?php

use Illuminate\Database\Seeder;
use App\District;
use App\Country;

class DistrictSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Retrieve Ireland from Country table
        $country_Ireland = Country::where('country_name', 'Ireland')->value('id');
        // dd($country_Ireland);

        $district_ire01 = new District();
        $district_ire01->district_name = "County Dublin";
        $district_ire01->country_id = $country_Ireland;
        $district_ire01->country()->associate($country_Ireland);
        $district_ire01->about = "A history spanning over a thousand years, vibrant nightlife, and a mix of Georgian and modern architecture make Dublin a popular European tourist destination. To experience the garrulous locals and their culture in a relaxed and friendly atmosphere, spend some time in a traditional pub--a staple of Dublin's social life and a favorite stop for the majority of the city's foreign visitors.";
        $district_ire01->save();

        $district_ire02= new District();
        $district_ire02->district_name = "County Wexford";
        $district_ire02->country_id = $country_Ireland;
        $district_ire02->country()->associate($country_Ireland);
        $district_ire02->about = "In the southeast of the province of Leinster, County Wexford brings to life traditional Irish singing and the weeks-long Wexford Opera Festival. Many of the region's traditional songs tell the story of the rebellion of 1798, in which the Irish fought against British rule in the country. The county also sports popular beaches and sand dunes regions, which support a rich wildlife and plant life. County Wexford also provides insight into the Irish sport of hurling. County Wexford is in Province of Leinster. ";
        $district_ire02->save();

        $district_ire03 = new District();
        $district_ire03->district_name = "County Wicklow";
        $district_ire03->country_id = $country_Ireland;
        $district_ire03->country()->associate($country_Ireland);
        $district_ire03->about = "Referred to as The Garden of Ireland, County Wicklow presents a pleasant change of pace and scenery from nearby Dublin. Hugging the east coast just south of the capital city, the county encourages visitors to engage with nature. Discover an impressive mountain range, thick woodlands, and the scenic coastline.";
        $district_ire03->save();

        $district_ire04 = new District();
        $district_ire04->district_name = "County Galway";
        $district_ire04->country_id = $country_Ireland;
        $district_ire04->country()->associate($country_Ireland);
        $district_ire04->about = "A major hub for visitors exploring Ireland's western regions, Galway serves as a city of art and culture, renowned for its vibrant lifestyle and numerous festivals. The city's many pubs, a major draw for bohemian crowds from around the world, offer live music and outdoor seats, ideal for observing street performers and ordinary natives going about their business. Deeply respectful of its traditions and rich heritage, Galway is one of the few areas where Irish remains a thriving language in everyday use.";
        $district_ire04->save();

        $district_ire04 = new District();
        $district_ire04->district_name = "County Kildare";
        $district_ire04->country_id = $country_Ireland;
        $district_ire04->country()->associate($country_Ireland);
        $district_ire04->about = "Landlocked in Ireland's mid-east region, County Kildare churns out champion racehorses from some of the best agricultural land in the country. For everything equestrian, County Kildare delivers, whether it's the desire to ride a horse, to catch a race, or to visit a small saddlery workshop established in 1880. The workshop, which is well-known in equestrian circles, produces some of the world's best saddles. The county is named for the town of Kildare and has many small towns and villages dotted across the lowland. ";
        $district_ire04->save();

        //Retrieve France from Country table
        $country_France = Country::where('country_name', 'France')->value('id');

        $district_fra01 = new District();
        $district_fra01->district_name = "Île-de-France";
        $district_fra01->country_id = $country_France;
        $district_fra01->country()->associate($country_France);
        $district_fra01->about = "Île-de-France is a region in north-central France. It surrounds the nation’s famed capital, Paris, an international center for culture and cuisine with chic cafes and formal gardens.";
        $district_fra01->save();

        $district_fra02 = new District();
        $district_fra02->district_name = "Brittany";
        $district_fra02->country_id = $country_France;
        $district_fra02->country()->associate($country_France);
        $district_fra02->about = "The capital city of the modern Brittany region is Rennes, located in the central eastern part of the region; most of the major lines of communication between Brittany and Paris pass through Rennes, which is a large industrial and university city.";
        $district_fra02->save();

        $district_fra03 = new District();
        $district_fra03->district_name = "Normandy";
        $district_fra03->country_id = $country_France;
        $district_fra03->country()->associate($country_France);
        $district_fra03->about = "Normandy is one of the great historic regions of France. ";
        $district_fra03->save();



    }
}
