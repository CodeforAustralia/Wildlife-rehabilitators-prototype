@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Opening Hours</h2>
            
            <form class="form-horizontal" role="form" method="POST" action="{{ url('timetable') }}">
                    {{ csrf_field() }}

                         <div class="form-group">
                            @if(count($errors))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div id="schedule_period">
                            <p>Please specify your regular schedule</p>

                              <ul id="timetable">
                        <li>
                            
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <input type="checkbox" id="monday" name="monday" />
                                        <label for="monday">Monday</label>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        From <div class="input-field inline">
                                            
                                            <input id="monday_from" name="monday_from" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        To <div class="input-field inline">
                                            
                                            <input id="monday_to" name="monday_to" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                    
                                </div>
                            
                        </li>
                        <li>

                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <input type="checkbox" id="tuesday" name="tuesday" />
                                        <label for="tuesday">Tuesday</label>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        From <div class="input-field inline">
                                            
                                            <input id="tuesday_from" name="tuesday_from" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        To <div class="input-field inline">
                                            
                                            <input id="tuesday_to" name="tuesday_to" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                </div>
                            
                        </li>
                        <li>
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <input type="checkbox" id="wednesday" name="wednesday" />
                                        <label for="wednesday">Wednesday</label>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        From <div class="input-field inline">
                                            <input id="wednesday_from" name="wednesday_from" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        To <div class="input-field inline">
                                            <input id="wednesday_to" name="wednesday_to" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                </div>
                            
                        </li>
                        <li>
                          
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <input type="checkbox" id="thursday" name="thursday" />
                                        <label for="thursday">Thursday</label>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        From <div class="input-field inline">
                                            <input id="thursday_from" name="thursday_from" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        To <div class="input-field inline">
                                            <input id="thursday_to" name="thursday_to" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                </div>
                            
                        </li>
                        <li>
                          
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <input type="checkbox" id="friday" name="friday" />
                                        <label for="friday">Friday</label>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        From <div class="input-field inline">
                                            <input id="friday_from" name="friday_from" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        To <div class="input-field inline">
                                            <input id="friday_to" name="friday_to" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                </div>
                            
                        </li>
                        <li>
                          
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <input type="checkbox" id="saturday" name="saturday" />
                                        <label for="saturday">Saturday</label>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        From <div class="input-field inline">
                                            <input id="saturday_from" name="saturday_from" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        To <div class="input-field inline">
                                            <input id="saturday_to" name="saturday_to" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                </div>
                            
                        </li>
                        <li>
                            
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <input type="checkbox" id="sunday" name="sunday" />
                                        <label for="sunday">Sunday</label>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        From <div class="input-field inline">
                                            <input id="sunday_from" name="sunday_from" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        To <div class="input-field inline">
                                            <input id="sunday_to" name="sunday_to" class="timepicker" type="time" disabled>
                                        </div>
                                    </div>
                                </div>
                            
                        </li>
                      </ul> 
                            
                      </div>

                      <div class="row">

                       <div class="col s12 m12 l12">
                                <input type="checkbox" id="public_holidays" name="public_holidays" />
                                <label for="public_holidays">Do you open on public holidays?</label>
                        </div>
                            
                        <div class="col s12 m12 l12">
                            <input type="checkbox" id="closure_periods" name="closure_periods" />
                            <label for="closure_periods">Would you like to notify some closure periods?</label>

                            
                            <div id="closed_period">
                                <p>Please specify the period of time the organisation will be closed:</p>
                                <div class="col s6">
                                    <label for="holidays_from">From</label>
                                    <input type="date" class="datepicker" name="startdate">
                                </div>
                                <div class="col s6">
                                    <label for="holidays_to">To</label>
                                    <input type="date" class="datepicker" name="finishdate">
                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="form-group">
                            <div class="col s12 m6 offset-m2 l6 offset-l2">
                            @if(Auth::user()->updated_at != Auth::user()->created_at)
                                <a class="btn btn-link" href="{{ url('/home') }}">Go back</a>
                            @endif
                            </div>
                            <div class="col s12 m6 offset-m2 l6 offset-l2">
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