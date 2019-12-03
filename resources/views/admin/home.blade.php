@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{ Auth::user()->name }}
                    <br/>
                    <a href="{{route('admin.countries.index')}}">Countries</a>
                    <br/>
                    <a href="{{route('admin.districts.index')}}">Districts</a>
                    <br/>
                    <a href="{{route('admin.cities.index')}}">Cities</a>
                    <br/>
                    <a href="{{route('admin.municipalities.index')}}">Municipalities</a>
                    <br/>
                    <a href="{{route('admin.addresses.index')}}">Addresses</a>
                    <br/>
                    <a href="{{route('admin.details.index')}}">Details</a>
                    <br/>
                    <a href="{{route('admin.categories.index')}}">Categories</a>
                    <br/>
                    <a href="{{route('admin.establishments.index')}}">Establishments</a>
                    <br/>
                    <a href="{{route('admin.restaurants.index')}}">Restaurants</a>
                    <br/>
                    <a href="{{route('admin.mealtypes.index')}}">Meal Type</a>
                    <br/>
                    <a href="{{route('admin.dietaryrestrictions.index')}}">Dietary Restrictions</a>
                    <br/>
                    <a href="{{route('admin.features.index')}}"> Features</a>
                    <br/>
                    <a href="{{route('admin.cuisines.index')}}"> Cuisines</a>
                    <br/>
                    <a href="{{route('admin.businesshours.index')}}"> Business hours</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
