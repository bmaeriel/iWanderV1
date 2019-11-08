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
                <label for="title">Restaurant Name</label>
                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" value="{{ old('restaurant_name') }}" />
              </div>
              <div class="form-group">
                <label for="author">Establishment</label>
                <select class="form-control" id="establishment_type_id" name="establishment_type_id">
                    <option value="">Select Establishment</option>
                    {{-- @foreach ($establishments as $establishment)
                      <option value="{{$establishment}}"?{{}}
                    @endforeach --}}
                </select>
              <a href="{{ route('admin.restaurants.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
