@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Features
            <a href="{{ route('admin.features.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($features) === 0)
              <p> There are no features! </p>
            @else
              <table id="table-features" class="table table-hover">
                <thead>
                  <th>Features</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($features as $feature)
                    <tr data-id="{{ $feature->id }}">
                      <td>{{ $feature->feature_name }}</td>
                      <td>
                        <a href="{{ route('admin.features.show', $feature->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.features.destroy', $feature->id)}}">
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
