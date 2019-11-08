@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new district
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
            <form method="POST" action="{{ route('admin.districts.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group">
                <label for="district_name">District Name</label>
                <input type="text" class="form-control" id="district_name" name="district_name" value="{{ old('district_name') }}" />
              </div>
              <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control">
                  <option value="">Select Country</option>
                  @foreach($countries as $country)
                    <option value="{{ $country->id }}">
                      {{$country->country_name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="about">About</label>
                <input type="text" class="form-control" id="about" name="about" value="{{ old('about') }}" />
              </div>

              <a href="{{ route('admin.districts.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
