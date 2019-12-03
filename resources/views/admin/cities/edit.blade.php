@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit city
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
            <form method="POST" action="{{ route('admin.cities.update', $city->id) }}">
              <input type="hidden" name="_method" value="PUT"/>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group">
                <label for="city_name">City Name</label>
                <input type="text" class="form-control" id="city_name" name="city_name" value="{{ old('city_name', $city->city_name) }}" />
              </div>
              <div class="form-group">
                <label for="district_id">District</label>
                <select name="district_id" class="form-control">
                  <option value="">Select District</option>
                  @foreach($districts as $district)
                    <option value="{{ $district->id }}" {{ $district->id == $city->district_id ? "selected":"" }}>
                      {{$district->district_name}}
                    </option>
                  @endforeach
                </select>              </div>
              <div class="form-group">
                <label for="about">About</label>
                <textarea rows="5" type="text" class="form-control" id="about" name="about" value="{{ old('about', $city->about) }}" >{{$city->about}} </textarea>
              </div>
              <a href="{{ route('admin.cities.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
