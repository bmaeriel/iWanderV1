@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Restaurants
            <a href="{{ route('admin.restaurants.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($restaurants) === 0)
              <p> There are no restaurants! </p>
            @else
              <table id="table-restaurants" class="table table-hover">
                <thead>
                  <th>Restaurant Name</th>
                  <th>City</th>
                  <th>Establishment</th>
                  {{-- <th>View Count</th> --}}
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($restaurants as $restaurant)
                    <tr data-id="{{ $restaurant->id }}">
                      <td>{{ $restaurant->restaurant_name }}</td>
                      <td>{{ $restaurant->addresses->city->city_name }}</td>
                      <td>{{ $restaurant->establishments->establishment_name }}</td>
                      <td>
                        <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.restaurants.destroy', $restaurant->id)}}">
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
