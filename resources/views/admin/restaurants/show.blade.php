@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Restaurant: {{$restaurant->restaurant_name}}
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Restaurant</td>
                    <td>{{ $restaurant->restaurant_name }}</td>
                  </tr>
                  <tr>
                    <td>Details</td>
                    <td>{{ $restaurant->details->description}} </br>
                        {{ $restaurant->details->website}}</br>
                        {{ $restaurant->details->email}}</br>
                        {{ $restaurant->details->phone}}
                    </td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>{{ $restaurant->addresses->address1 }}
                        {{ $restaurant->addresses->address2 }}
                        {{ $restaurant->addresses->address3 }} </br>
                        {{ $restaurant->addresses->municipality_name }}
                        {{ $restaurant->addresses->city->city_name }}</br>
                        {{ $restaurant->addresses->district->district_name }}
                        {{ $restaurant->addresses->postal_code}}
                        {{ $restaurant->addresses->country->country_name }}</br>
                    </td>
                  </tr>
                  <tr>
                    <td>Establishment</td>
                    <td>{{ $establishment->establishment_name }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.restaurants.index', $restaurant->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.restaurants.edit', $restaurant->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.restaurants.destroy', $restaurant->id)}}">
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
