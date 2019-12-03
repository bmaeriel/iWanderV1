@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Dietary Restriction
            <a href="{{ route('admin.dietaryrestrictions.create')}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">
            @if (count($dietaryRestrictions) === 0)
              <p> There are no dietaryrestrictions! </p>
            @else
              <table id="table-dietaryrestrictions" class="table table-hover">
                <thead>
                  <th>Meal Type</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($dietaryRestrictions as $dietaryRestriction)
                    <tr data-id="{{ $dietaryRestriction->id }}">
                      <td>{{ $dietaryRestriction->dietary_restriction_name }}</td>
                      <td>
                        <a href="{{ route('admin.dietaryrestrictions.show', $dietaryRestriction->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.dietaryrestrictions.edit', $dietaryRestriction->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.dietaryrestrictions.destroy', $dietaryRestriction->id)}}">
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
