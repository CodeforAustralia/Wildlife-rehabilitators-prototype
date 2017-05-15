@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Coverage Area</h2>
            
            <form class="form-horizontal" role="form" method="POST" action="{{ url('coverage_area') }}">
                    {{ csrf_field() }}

                {{ method_field('PUT') }}

                <p>Please edit the circle in the map to set a coverage area value</p>

                <div id="map">{!! Mapper::render() !!}</div>
                <div id="defined-radius"><span style="font-weight: bold">Radius(km): </span><span id="distance">{{$km_radius}}</span> </div>

                <input type="hidden" id="coverage_area" name="coverage_area" value="">

                <div class="form-group">
                            <div class="col s12 m3 l3 ">
                            
                                <a class="btn btn-link" href="{{ url('/home') }}">Go home</a>
                            
                            </div>
                            <div class="col s12 m3 offset-m3 l1 offset-l6">
                                <button type="submit" class="btn btn-primary" >
                                    Next
                                </button>
                            </div>
                </div>
            </form>       
        </div>
    </div>
</div>
@endsection