@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new business hour
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
            <form method="POST" action="{{ route('admin.businesshours.store') }}">
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
                <input type="text" class="form-control" id="day" name="day" value="{{ old('day') }}" />
              </div>
              <div class="form-group row">
                  <label for="open_time" class="col-md-4 col-form-label text-md-right">{{ __('Opening time') }}</label>
                  <div class="col-md-6">
                      <input id="open_time" type="time" class="form-control @error('open_time') is-invalid @enderror" name="open_time" value="{{ old('open_time') }}" required autocomplete="open_time" autofocus>
                      @error('open_time')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="close_time" class="col-md-4 col-form-label text-md-right">{{ __('Closing time') }}</label>
                  <div class="col-md-6">
                      <input id="close_time" type="time" class="form-control @error('close_time') is-invalid @enderror" name="close_time" value="{{ old('close_time') }}" required autocomplete="close_time" autofocus>
                      @error('close_time')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
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
