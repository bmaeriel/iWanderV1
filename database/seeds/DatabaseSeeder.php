<?php
# @Author: maerielbenedicto
# @Date:   2019-08-27T22:26:48+01:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-10-22T00:46:42+01:00




use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(DistrictSeederTable::class);
        $this->call(CitySeederTable::class);
        $this->call(MunicipalitySeederTable::class);
        $this->call(CategorySeederTable::class);
        $this->call(EstablishmentTableSeeder::class);
        $this->call(MealTypeSeederTable::class);
        $this->call(DietaryRestrictionSeederTable::class);
        $this->call(FeatureSeederTable::class);
        $this->call(CuisineSeederTable::class);

    }
}
