@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Cuisine:
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Cuisine</td>
                    <td>{{ $cuisine->cuisine_name }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.cuisines.index', $cuisine->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.cuisines.edit', $cuisine->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.cuisines.destroy', $cuisine->id)}}">
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
