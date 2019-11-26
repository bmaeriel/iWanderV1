@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Establishment
            <a href="{{ route('admin.establishments.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($establishments) === 0)
              <p> There are no establishments! </p>
            @else
              <table id="table-establishments" class="table table-hover">
                <thead>
                  <th>Establishment</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($establishments as $establishment)
                    <tr data-id="{{ $establishment->id }}">
                      <td>{{ $establishment->establishment_name }}</td>
                      <td>
                        <a href="{{ route('admin.establishments.show', $establishment->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.establishments.edit', $establishment->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.establishments.destroy', $establishment->id)}}">
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
