@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Cuisines
            <a href="{{ route('admin.cuisines.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($cuisines) === 0)
              <p> There are no Cuisines! </p>
            @else
              <table id="table-cuisines" class="table table-hover">
                <thead>
                  <th>Cuisines</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($cuisines as $cuisine)
                    <tr data-id="{{ $cuisine->id }}">
                      <td>{{ $cuisine->cuisine_name }}</td>
                      <td>
                        <a href="{{ route('admin.cuisines.show', $cuisine->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.cuisines.edit', $cuisine->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.cuisines.destroy', $cuisine->id)}}">
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
