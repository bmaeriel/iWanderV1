@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Detail:
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Description</td>
                    <td>{{ $detail->description }}</td>
                  </tr>
                  <tr>
                    <td>Website</td>
                    <td>{{ $detail->website}}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $detail->email }}</td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td>{{ $detail->phone }}</td>
                  </tr>
                  <tr>
                    <td>Minimum price</td>
                    <td>{{ $detail->min_price }}</td>
                  </tr>
                  <tr>
                    <td>Maximum price</td>
                    <td>{{ $detail->max_price }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.details.index', $detail->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.details.edit', $detail->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.details.destroy', $detail->id)}}">
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
