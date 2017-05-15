@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <h4>{{Auth::user()->org_name}}</h4>
            
            <div class="panel panel-default">
                 <div class="panel-body">Dashboard</div>
            </div>
                                      
            <div class="panel panel-default">
                <div class="panel-heading">Opening hours</div>
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                        @if (Auth::user()->work_on_holidays == 1) 
                            <p>** The centre does not open on public holidays </p>    
                        @endif
                        
                                        <table>
                                            <thead>
                                              <tr>
                                                  <th>Day</th>
                                                  <th>Start</th>
                                                  <th>Finish</th>
                                              </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($timetable as $day)
                                                                        
                                                <tr>
                                                    <td>{{ $day->day_of_week }}</td>
                                                    <td>{{$day->starttime }}</td>
                                                    <td>{{$day->finishtime }}</td>
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                        </table>
                                        </div>
                                       
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                        <h6>Closure period</h6>
                                        
                                        @if (!isset($holidays))
                                            <p>There are no holidays/ closure periods recorded yet!</p>
                                        @else
                                                <ul>
                                                @foreach($holidays as $holiday)
                                                    
                                                        <li>{{ $holiday->startdate }} to {{$holiday->finishdate }})</li>
                                                    
                                                @endforeach
                                                </ul>
                                        @endif
                                        </div>

                                        <div class="clearfix visible-xs-block visible-sm-block visible-md-block visible-lg-block"></div>
                                        
                                <div class="col-sm-12 col-md-3 col-md-offset-9 col-lg-3 col-md-offset-9">
                                    <a class="btn btn-link" href="{{ url('/timetable') }}">Edit</a> 
                                </div>
                                             
                        
                    </div>
                </div>  

                </div> 
                <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">List of species</div>
                            <div class="panel-body">
                        
                            @if (!isset($species))
                                <p>If you are skilled/specialized in some specific species, please
                                <a class="btn btn-link" href="{{ url('/species_exp') }}">tell us more</a>
                                </p>
                            @else
                            
                                <ul>
                                @foreach($species as $specie)
                                    
                                        <li>{{ $specie->species_name }} ({{$specie->category }})</li>
                                    
                                @endforeach
                                </ul>
                                <a class="btn btn-link" href="{{ url('/species_exp') }}">Edit</a>
                            @endif
                        </div>
                    </div>
                    </div>

                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div class="panel panel-default">
                        <div class="panel-heading">Coverage area</div>
                            <div class="panel-body">
                        
                            @if (Auth::user()->coverage_area == null)
                                <p>If you are willing to pick up and transport animals, please
                                <a class="btn btn-link" href="{{ url('/coverage_area') }}">tell us more</a>
                                </p>
                            @else
                                
                                <p>Area in km radius: {{ Auth::user()->coverage_area }}</p>
                                <div id="map" style="width: 400px; height: 400px;">{!! Mapper::render() !!}</div>
                                <a class="btn btn-link" href="{{ url('/coverage_area') }}">Edit</a>
                            @endif
                        </div>
                    </div>
                   </div>                

                </div>
                @if($other_centres->isEmpty() != TRUE)
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Other centres</div>
                            <div class="panel-body">
                                <table>
                                            <thead>
                                              <tr>
                                                  <th>Organisation</th>
                                                  <th>Contact number</th>
                                                  <th>Location</th>
                                              </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($other_centres as $centre)
                                                                        
                                                <tr>
                                                    <td>{{ $centre->org_name }}</td>
                                                    <td>@if ($centre->telephone == NULL)
                                                            {{ $centre->mobile }}
                                                        @elseif ($centre->mobile == NULL)
                                                            {{ $centre->telephone }}
                                                        @elseif ($centre->telephone != NULL && $centre->mobile != NULL)
                                                            {{ $centre->telephone . " / ". $centre->mobile }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $centre->suburb .", ". $centre->postcode }}</td>
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
