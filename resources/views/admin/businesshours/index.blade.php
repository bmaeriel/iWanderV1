@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Business Hour
            <a href="{{ route('admin.businesshours.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($businessHours) === 0)
              <p> There are no business hours! </p>
            @else
              <table id="table-features" class="table table-hover">
                <thead>
                  <th>Restaurant</th>
                  <th>Day</th>
                  <th>Opening Time</th>
                  <th>Closing Time</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($businessHours as $businessHour)
                    <tr data-id="{{ $businessHour->id }}">
                      <td>{{ $businessHour->restaurant->restaurant_name}}</td>
                      <td>{{ $businessHour->day }}</td>
                      <td>{{ $businessHour->open_time }}</td>
                      <td>{{ $businessHour->close_time }}</td>
                      <td>
                        <a href="{{ route('admin.businesshours.show', $businessHour->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.businesshours.edit', $businessHour->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.businesshours.destroy', $businessHour->id)}}">
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
