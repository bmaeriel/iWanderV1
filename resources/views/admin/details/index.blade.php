@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Details
            <a href="{{ route('admin.details.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($details) === 0)
              <p> There are no details! </p>
            @else
              <table id="table-details" class="table table-hover">
                <thead>
                  <th>Description</th>
                  <th>Website</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Minimum Price</th>
                  <th>Maximum Price</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($details as $detail)
                    <tr data-id="{{ $detail->id }}">
                      <td>{{ $detail->description }}</td>
                      <td>{{ $detail->website }}</td>
                      <td>{{ $detail->email }}</td>
                      <td>{{ $detail->phone }}</td>
                      <td>{{ $detail->min_price}}</td>
                      <td>{{ $detail->max_price }}</td>
                      <td>
                        <a href="{{ route('admin.details.show', $detail->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.details.edit', $detail->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.details.destroy', $detail->id)}}">
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
