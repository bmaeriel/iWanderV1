@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Districts
            <a href="{{ route('admin.districts.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($districts) === 0)
              <p> There are no districts! </p>
            @else
              <table id="table-districts" class="table table-hover">
                <thead>
                  <th>District Name</th>
                  <th>Country Name</th>
                  <th>About</th>
                  {{-- <th>View Count</th> --}}
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($districts as $district)
                    <tr data-id="{{ $district->id }}">
                      <td>{{ $district->district_name }}</td>
                      <td>{{ $district->country->country_name}}</td>
                      <td>{{ $district->about }}</td>
                      <td>
                        <a href="{{ route('admin.districts.show', $district->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.districts.edit', $district->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.districts.destroy', $district->id)}}">
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
