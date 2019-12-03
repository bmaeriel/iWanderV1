@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit business hours
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
            <form method="POST" action="{{ route('admin.businesshours.update', $businessHour->id) }}">
              <input type="hidden" name="_method" value="PUT"/>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group">
                <label for="restaurant_id">Restaurant</label>
                <select name="restaurant_id" class="form-control">
                  <option value="">Select Restaurant</option>
                  @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">
                      {{$restaurant->restaurant_name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="day">Day</label>
                <input type="text" class="form-control" id="day" name="day" value="{{ old('day', $businessHour->day) }}" />
              </div>
              <div class="form-group ">
                      <label for="open_time"> Opening time </label>
                      <input id="open_time" type="time" class="form-control" name="open_time" value="{{ old('open_time', $businessHour->open_time) }}" autocomplete="open_time" autofocus>
              </div>
              <div class="form-group ">
                      <label for="close_time"> Closing time </label>
                      <input id="close_time" type="time" class="form-control" name="close_time" value="{{ old('close_time', $businessHour->close_time) }}" autocomplete="close_time" autofocus>
              </div>
              <a href="{{ route('admin.businesshours.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
