@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new Municipality
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
            <form method="POST" action="{{ route('admin.municipalities.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group">
                <label for="municipality_name">Municipality Name</label>
                <input type="text" class="form-control" id="municipality_name" name="municipality_name" value="{{ old('municipality_name') }}" />
              </div>
              <div class="form-group">
                <label for="city_id">City</label>
                <select name="city_id" class="form-control">
                  {{-- {{$districts = App\District::All()}} --}}
                  <option value="">Select City</option>
                  @foreach($cities as $city)
                    <option value="{{ $city->id }}">
                      {{$city->city_name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="about">About</label>
                <input type="text" class="form-control" id="about" name="about" value="{{ old('about') }}" />
              </div>

              <a href="{{ route('admin.municipalities.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
