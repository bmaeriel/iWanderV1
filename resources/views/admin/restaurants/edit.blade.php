@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit address
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
            <form method="POST" action="{{ route('admin.addresses.update', $address->id) }}">
              <input type="hidden" name="_method" value="PUT"/>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group">
                <label for="address1">Address 1</label>
                <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1', $address->address1) }}" />
              </div>
              <div class="form-group">
                <label for="address2">Address 2</label>
                <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2', $address->address2) }}" />
              </div>
              <div class="form-group">
                <label for="address3">Address 3</label>
                <input type="text" class="form-control" id="address3" name="address3" value="{{ old('address3', $address->address3) }}" />
              </div>
              <div class="form-group">
                <label for="municipality_id">Municipality</label>
                <select name="municipality_id" class="form-control">
                  <option value="">Select Municipality</option>
                  @foreach($municipalities as $municipality)
                    <option value="{{ $municipality->id }}"  selected>
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
                    <option value="{{ $city->id }}" selected>
                      {{$city->city_name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="district_id">District</label>
                <select name="district_id" class="form-control">
                  <option value="">Select District</option>
                  @foreach($districts as $district)
                    <option value="{{ $district->id }}" selected>
                      {{$district->district_name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="postal_code">Postal_code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $address->postal_code) }}" />
              </div>
              <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control">
                  <option value="">Select Country</option>
                  @foreach($countries as $country)
                    <option value="{{ $country->id }}" selected>
                      {{$country->country_name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <a href="{{ route('admin.addresses.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
