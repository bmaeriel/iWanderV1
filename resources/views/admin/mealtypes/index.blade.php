@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Meal Type
            <a href="{{ route('admin.mealtypes.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($mealtypes) === 0)
              <p> There are no mealtypes! </p>
            @else
              <table id="table-mealtypes" class="table table-hover">
                <thead>
                  <th>Meal Type</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($mealtypes as $mealType)
                    <tr data-id="{{ $mealType->id }}">
                      <td>{{ $mealType->meal_type_name }}</td>
                      <td>
                        <a href="{{ route('admin.mealtypes.show', $mealType->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.mealtypes.edit', $mealType->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.mealtypes.destroy', $mealType->id)}}">
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
