@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Countries
            <a href="{{ route('admin.countries.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($countries) === 0)
              <p> There are no countries! </p>
            @else
              <table id="table-countries" class="table table-hover">
                <thead>
                  <th>Country Name</th>
                  <th>About</th>
                  <th>Continent</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($countries as $country)
                    <tr data-id="{{ $country->id }}">
                      <td>{{ $country->country_name }}</td>
                      <td>{{ $country->about }}</td>
                      <td>{{ $country->continent }}</td>
                      <td>
                        <a href="{{ route('admin.countries.show', $country->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.countries.destroy', $country->id)}}">
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
