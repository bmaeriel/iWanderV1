@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Address: {{$address->address1}}
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Address  1</td>
                    <td>{{ $address->address1 }}</td>
                  </tr>
                  <tr>
                    <td>Address  2</td>
                    <td>{{ $address->address2}}</td>
                  </tr>
                  <tr>
                    <td>Address  3</td>
                    <td>{{ $address->address3 }}</td>
                  </tr>
                  <tr>
                    <td>Municipality</td>
                    <td>{{ $address->municipality->municipality_name }}</td>
                  </tr>
                  <tr>
                    <td>District</td>
                    <td>{{ $address->city->city_name }}</td>
                  </tr>
                  <tr>
                    <td>District</td>
                    <td>{{ $address->district->district_name }}</td>
                  </tr>
                  <tr>
                    <td>Postal code</td>
                    <td>{{ $address->postal_code }}</td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td>{{ $address->country->country_name }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.addresses.index', $address->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.addresses.edit', $address->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.addresses.destroy', $city->id)}}">
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
