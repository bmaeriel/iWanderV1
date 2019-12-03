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
                    <td>Address</td>
                    <td>{{ $address->address1 }} </br>
                        {{ $address->address2}}</br>
                        {{ $address->address3 }}</td>
                  </tr>
                  {{-- <tr>
                    <td>Municipality</td>
                    <td>{{ $address->municipality->municipality_name }}</td>
                  </tr> --}}
                  <tr>
                    <td>District</td>
                    <td>{{ $address->city->city_name }}</td>
                  </tr>
                  <tr>
                    <td>City</td>
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
              <form style="display:inline-block" method="POST" action="{{ route('admin.addresses.destroy', $address->id)}}">
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
