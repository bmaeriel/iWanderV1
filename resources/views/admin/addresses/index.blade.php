@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Addresses
            <a href="{{ route('admin.addresses.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($addresses) === 0)
              <p> There are no address! </p>
            @else
              <table id="table-addresses" class="table table-hover">
                <thead>
                  <th>Address 1</th>
                  <th>Address 2</th>
                  <th>Address 3</th>
                  <th>Municipality</th>
                  <th>City</th>
                  <th>District</th>
                  <th>Postal code</th>
                  <th>Country</th>
                  {{-- <th>View Count</th> --}}
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($addresses as $address)
                    <tr data-id="{{ $address->id }}">
                      <td>{{ $address->address1 }}</td>
                      <td>{{ $address->address2 }}</td>
                      <td>{{ $address->address3 }}</td>
                      <td>{{ $address->municipality->municipality_name }}</td>
                      <td>{{ $address->city->city_name }}</td>
                      <td>{{ $address->district->district_name }}</td>
                      <td>{{ $address->postal_code }}</td>
                      <td>{{ $address->country->country_name }}</td>
                      <td>
                        <a href="{{ route('admin.addresses.show', $address->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.addresses.edit', $address->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.addresses.destroy', $address->id)}}">
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
