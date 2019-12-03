@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Business Hour:
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Restaurant</td>
                    <td>{{ $businessHour->restaurant->restaurant_name }}</td>
                  </tr>
                  <tr>
                    <td> Day </td>
                    <td>{{ $businessHour->day }}</td>
                  </tr>
                  <tr>
                    <td>Opening time</td>
                    <td>{{ $businessHour->open_time }}</td>
                  </tr>
                  <tr>
                    <td>Closing time</td>
                    <td>{{ $businessHour->close_time }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.businesshours.index', $businessHour->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.businesshours.edit', $businessHour->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.businesshours.destroy', $businessHour->id)}}">
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
