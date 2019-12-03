@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new restaurant
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('admin.restaurants.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group">
                <label for="restaurant_name">Restaurant Name</label>
                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" value="{{ old('restaurant_name') }}" />
              </div>

              {{-- DETAIL FORM --}}
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" />
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" />
              </div>
              <div class="form-group">
                <label for="min_price">Minimum price</label>
                <input type="text" class="form-control" id="min_price" name="min_price" value="{{ old('min_price') }}" />
              </div>
              <div class="form-group">
                <label for="max_price">Maximum price</label>
                <input type="text" class="form-control" id="max_price" name="max_price" value="{{ old('max_price') }}" />
              </div>

              {{-- ADDRESS FORM --}}
              <div class="form-group">
                <label for="address1">Address 1</label>
                <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1') }}" />
              </div>
              <div class="form-group">
                <label for="address2">Address 2</label>
                <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2') }}" />
              </div>
              <div class="form-group">
                <label for="address3">Address 3</label>
                <input type="text" class="form-control" id="address3" name="address3" value="{{ old('address3') }}" />
              </div>
              <div class="form-group">
                <label for="municipality_id">Municipality</label>
                <select name="municipality_id" class="form-control">
                  {{-- {{$districts = App\District::All()}} --}}
                  <option value="">Select Municipality</option>
                  @foreach($municipalities as $municipality)
                    <option value="{{ $municipality->id }}" {{ $municipality->id == $restaurant->addresses->municipality_id ? 'selected' : ""}}>
                      {{$municipality->municipality_name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="city_id">City</label>
                <select name="city_id" class="form-control">
                  <option value="">Select City</option>
                  @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ $city->id == $restaurant->addresses->city_id ? "selected":"" }}>
                      {{$city->city_name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="district_id">District</label>
                <select name="district_id" class="form-control">
                  {{-- {{$districts = App\District::All()}} --}}
                  <option value="">Select District</option>
                  @foreach($districts as $district)
                    <option value="{{ $district->id }}" {{ $district->id == $restaurant->addresses->district_id ? "selected":"" }}>
                      {{$district->district_name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="postal_code">Postal code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" />
              </div>
              <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control">
                  <option value="">Select Country</option>
                  @foreach($countries as $country)
                    <option value="{{ $country->id }}"  {{ $country->id == $restaurant->addresses->country_id ? "selected" : ""}}>
                      {{$country->country_name}}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="establishment_type_id">Establishment</label>
                <select name="establishment_type_id" class="form-control">
                  {{-- {{$districts = App\District::All()}} --}}
                  <option value="">Select Establishment</option>
                  @foreach($establishments as $establishment)
                    <option value="{{ $establishment->id }}" {{ $establishment->id == $restaurant->establishment_type_id ? "selected" : ""}}>
                      {{$establishment->establishment_name}}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="cuisine_id">Cuisine</label>
                <select name="cuisine_id" class="form-control">
                  <option value="">Select Cuisine</option>
                  @foreach($cuisines as $cuisine)
                    <option value="{{ $cuisine->id }}" {{ $cuisine->id == $restaurant->cuisine_id ? "selected" : ""}}>
                      {{$cuisine->cuisine_name}}
                    </option>
                  @endforeach
                </select>
              </div>

              <a href="{{ route('admin.restaurants.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
