@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            District: {{$district->district_name}}
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>District Name</td>
                    <td>{{ $district->district_name }}</td>
                  </tr>
                  <tr>
                    <td>Country Name</td>
                    <td>{{ $country->country_name }}</td>
                  </tr>
                  <tr>
                    <td>About</td>
                    <td>{{ $district->about }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.districts.index', $district->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.districts.edit', $district->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.districts.destroy', $district->id)}}">
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
