@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Cities
            <a href="{{ route('admin.cities.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($cities) === 0)
              <p> There are no cities! </p>
            @else
              <table id="table-cities" class="table table-hover">
                <thead>
                  <th>City Name</th>
                  <th>District Name</th>
                  <th>About</th>
                  {{-- <th>View Count</th> --}}
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($cities as $city)
                    <tr data-id="{{ $city->id }}">
                      <td>{{ $city->city_name }}</td>
                      <td>{{ $city->district->district_name }}</td>
                      <td>{{ $city->about }}</td>
                      <td>
                        <a href="{{ route('admin.cities.show', $city->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.cities.edit', $city->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.cities.destroy', $city->id)}}">
                          <input type="hidden" name="_method" value="DELETE"/>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                          <button type="submit" class="form-control btn btn-danger">Delete</a>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
