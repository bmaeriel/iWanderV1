@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            City: {{$city->city_name}}
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>City Name</td>
                    <td>{{ $city->city_name }}</td>
                  </tr>
                  <tr>
                    <td>District</td>
                    <td>{{ $city->district->district_name }}</td>
                  </tr>
                  <tr>
                    <td>About</td>
                    <td>{{ $city->about }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.cities.index', $city->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.cities.edit', $city->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.cities.destroy', $city->id)}}">
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
