@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Cities
            <a href="{{ route('admin.municipalities.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($municipalities) === 0)
              <p> There are no municipalities! </p>
            @else
              <table id="table-municipalities" class="table table-hover">
                <thead>
                  <th>Municipality Name</th>
                  <th>City</th>
                  <th>About</th>
                  {{-- <th>View Count</th> --}}
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($municipalities as $municipality)
                    <tr data-id="{{ $municipality->id }}">
                      <td>{{ $municipality->municipality_name }}</td>
                      <td>{{ $municipality->city->city_name }}</td>
                      <td>{{ $municipality->about }}</td>
                      <td>
                        <a href="{{ route('admin.municipalities.show', $municipality->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.municipalities.edit', $municipality->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.municipalities.destroy', $municipality->id)}}">
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
