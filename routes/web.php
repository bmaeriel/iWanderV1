<?php
# @Author: maerielbenedicto
# @Date:   2019-08-27T22:26:48+01:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T17:54:10+00:00




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/About', 'PageController@about')->name('about');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');

//Countries
Route::get('/admin/countries', 'Admin\CountryController@index')->name('admin.countries.index');
Route::get('/admin/countries/create', 'Admin\CountryController@create')->name('admin.countries.create');
Route::get('/admin/countries/{id}', 'Admin\CountryController@show')->name('admin.countries.show');
Route::post('/admin/countries/store', 'Admin\CountryController@store')->name('admin.countries.store');
Route::get('/admin/countries/{id}/edit', 'Admin\CountryController@edit')->name('admin.countries.edit');
Route::put('/admin/countries/{id}', 'Admin\CountryController@update')->name('admin.countries.update');
Route::delete('/admin/countries/{id}', 'Admin\CountryController@destroy')->name('admin.countries.destroy');

//Districts
Route::get('/admin/districts', 'Admin\DistrictController@index')->name('admin.districts.index');
Route::get('/admin/districts/create', 'Admin\DistrictController@create')->name('admin.districts.create');
Route::get('/admin/districts/{id}', 'Admin\DistrictController@show')->name('admin.districts.show');
Route::post('/admin/districts/store', 'Admin\DistrictController@store')->name('admin.districts.store');
Route::get('/admin/districts/{id}/edit', 'Admin\DistrictController@edit')->name('admin.districts.edit');
Route::put('/admin/districts/{id}', 'Admin\DistrictController@update')->name('admin.districts.update');
Route::delete('/admin/districts/{id}', 'Admin\DistrictController@destroy')->name('admin.districts.destroy');

//Cities
Route::get('/admin/cities', 'Admin\CityController@index')->name('admin.cities.index');
Route::get('/admin/cities/create', 'Admin\CityController@create')->name('admin.cities.create');
Route::get('/admin/cities/{id}', 'Admin\CityController@show')->name('admin.cities.show');
Route::post('/admin/cities/store', 'Admin\CityController@store')->name('admin.cities.store');
Route::get('/admin/cities/{id}/edit', 'Admin\CityController@edit')->name('admin.cities.edit');
Route::put('/admin/cities/{id}', 'Admin\CityController@update')->name('admin.cities.update');
Route::delete('/admin/cities/{id}', 'Admin\CityController@destroy')->name('admin.cities.destroy');

//Municipalities
Route::get('/admin/municipalities', 'Admin\MunicipalityController@index')->name('admin.municipalities.index');
Route::get('/admin/municipalities/create', 'Admin\MunicipalityController@create')->name('admin.municipalities.create');
Route::get('/admin/municipalities/{id}', 'Admin\MunicipalityController@show')->name('admin.municipalities.show');
Route::post('/admin/municipalities/store', 'Admin\MunicipalityController@store')->name('admin.municipalities.store');
Route::get('/admin/municipalities/{id}/edit', 'Admin\MunicipalityController@edit')->name('admin.municipalities.edit');
Route::put('/admin/municipalities/{id}', 'Admin\MunicipalityController@update')->name('admin.municipalities.update');
Route::delete('/admin/municipalities/{id}', 'Admin\MunicipalityController@destroy')->name('admin.municipalities.destroy');

//Addresses
Route::get('/admin/addresses', 'Admin\AddressController@index')->name('admin.addresses.index');
Route::get('/admin/addresses/create', 'Admin\AddressController@create')->name('admin.addresses.create');
Route::get('/admin/addresses/{id}', 'Admin\AddressController@show')->name('admin.addresses.show');
Route::post('/admin/addresses/store', 'Admin\AddressController@store')->name('admin.addresses.store');
Route::get('/admin/addresses/{id}/edit', 'Admin\AddressController@edit')->name('admin.addresses.edit');
Route::put('/admin/addresses/{id}', 'Admin\AddressController@update')->name('admin.addresses.update');
Route::delete('/admin/addresses/{id}', 'Admin\AddressController@destroy')->name('admin.addresses.destroy');


//Details
Route::get('/admin/details', 'Admin\DetailController@index')->name('admin.details.index');
Route::get('/admin/details/create', 'Admin\DetailController@create')->name('admin.details.create');
Route::get('/admin/details/{id}', 'Admin\DetailController@show')->name('admin.details.show');
Route::post('/admin/details/store', 'Admin\DetailController@store')->name('admin.details.store');
Route::get('/admin/details/{id}/edit', 'Admin\DetailController@edit')->name('admin.details.edit');
Route::put('/admin/details/{id}', 'Admin\DetailController@update')->name('admin.details.update');
Route::delete('/admin/details/{id}', 'Admin\DetailController@destroy')->name('admin.details.destroy');

//Categories
Route::get('/admin/categories', 'Admin\CategoryController@index')->name('admin.categories.index');
Route::get('/admin/categories/create', 'Admin\CategoryController@create')->name('admin.categories.create');
Route::get('/admin/categories/{id}', 'Admin\CategoryController@show')->name('admin.categories.show');
Route::post('/admin/categories/store', 'Admin\CategoryController@store')->name('admin.categories.store');
Route::get('/admin/categories/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
Route::put('/admin/categories/{id}', 'Admin\CategoryController@update')->name('admin.categories.update');
Route::delete('/admin/categories/{id}', 'Admin\CategoryController@destroy')->name('admin.categories.destroy');

//Restaurants
Route::get('/admin/restaurants', 'Admin\RestaurantController@index')->name('admin.restaurants.index');
Route::get('/admin/restaurants/create', 'Admin\RestaurantController@create')->name('admin.restaurants.create');
Route::get('/admin/restaurants/{id}', 'Admin\RestaurantController@show')->name('admin.restaurants.show');
Route::post('/admin/restaurants/store', 'Admin\RestaurantController@store')->name('admin.restaurants.store');
Route::get('/admin/restaurants/{id}/edit', 'Admin\RestaurantController@edit')->name('admin.restaurants.edit');
Route::put('/admin/restaurants/{id}', 'Admin\RestaurantController@update')->name('admin.restaurants.update');
Route::delete('/admin/restaurants/{id}', 'Admin\RestaurantController@destroy')->name('admin.restaurants.destroy');

//Establishment
Route::get('/admin/establishments', 'Admin\EstablishmentController@index')->name('admin.establishments.index');
Route::get('/admin/establishments/create', 'Admin\EstablishmentController@create')->name('admin.establishments.create');
Route::get('/admin/establishments/{id}', 'Admin\EstablishmentController@show')->name('admin.establishments.show');
Route::post('/admin/establishments/store', 'Admin\EstablishmentController@store')->name('admin.establishments.store');
Route::get('/admin/establishments/{id}/edit', 'Admin\EstablishmentController@edit')->name('admin.establishments.edit');
Route::put('/admin/establishments/{id}', 'Admin\EstablishmentController@update')->name('admin.establishments.update');
Route::delete('/admin/establishments/{id}', 'Admin\EstablishmentController@destroy')->name('admin.establishments.destroy');


Route::get('/user/restaurants', 'User\RestaurantController@index')->name('user.restaurants.index');
Route::get('/user/restaurants/{id}', 'User\RestaurantController@show')->name('user.restaurants.show');
