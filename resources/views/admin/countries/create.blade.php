@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new country
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
            <form method="POST" action="{{ route('admin.countries.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group">
                <label for="title">Country Name</label>
                <input type="text" class="form-control" id="country_name" name="country_name" value="{{ old('country_name') }}" />
              </div>
              <div class="form-group">
                <label for="author">About</label>
                <input type="text" class="form-control" id="about" name="about" value="{{ old('about') }}" />
              </div>
              <div class="form-group">
                <label for="author">Continent</label>
                <input type="text" class="form-control" id="continent" name="continent" value="{{ old('continent') }}" />
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
