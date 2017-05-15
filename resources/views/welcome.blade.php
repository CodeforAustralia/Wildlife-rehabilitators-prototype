@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
                <h3>Welcome!</h3>
                
                @if (Auth::user()->org_name != NULL)
                    <h2>{{Auth::user()->org_name}}</h2>
                @else
                    <h2>{{Auth::user()->contact_person}}</h2>
                @endif
                
                <div id="welcome-msg">
                
                    <p>This is the <span style="font-weight: bold">beta version</span> of the <span style="font-weight: bold">Wildlife incidents and emergencies app</span> by DELWP.</p>
                    <p>Just to remind you that the idea is to start working together with the community in order to help Victorian wildlife in danger.</p>

                    <p>For that purpose we just require you to fill in some basic information in relation to your opening hours.</p>

                    <p>You may also give additional information regarding: </p>
                    <ol>
                        <li>Species you are skilled/experienced on</li>
                        <li>Converage area (km radius) in case you are willing to travel to pick up the animal</li>
                    </ol>

                   

                </div>

                 <a class="btn btn-link" href="{{ url('/timetable') }}">Let's get started</a>
            
        </div>
    </div>
</div>
@endsection