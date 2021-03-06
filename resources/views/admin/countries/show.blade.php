@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Country: {{$country->country_name}}
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Country Name</td>
                    <td>{{ $country->country_name }}</td>
                  </tr>
                  <tr>
                    <td>About</td>
                    <td>{{ $country->about }}</td>
                  </tr>
                  <tr>
                    <td>Continent</td>
                    <td>{{ $country->continent }}</td>
                  </tr>

                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.countries.index', $country->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.countries.edit', $country->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.countries.destroy', $country->id)}}">
                <input type="hidden" name="_method" value="DELETE"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <button type="submit" class="form-control btn btn-danger">Delete</a>
              </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
