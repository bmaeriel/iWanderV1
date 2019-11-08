@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit country
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
            <form method="POST" action="{{ route('admin.countries.update', $country->id) }}">
              <input type="hidden" name="_method" value="PUT"/>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group">
                <label for="title">Country Name</label>
                <input type="text" class="form-control" id="country_name" name="country_name" value="{{ old('country_name', $country->country_name) }}" />
              </div>
              <div class="form-group">
                <label for="author">About</label>
                <input type="text" class="form-control" id="about" name="about" value="{{ old('about', $country->about) }}" />
              </div>
              <div class="form-group">
                <label for="publisher">Continent</label>
                <input type="text" class="form-control" id="continent" name="continent" value="{{ old('continent', $country->continent) }}" />
              </div>

              <a href="{{ route('admin.countries.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
