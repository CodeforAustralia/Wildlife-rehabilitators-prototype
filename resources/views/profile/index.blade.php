@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <div class="row">

                        <div class="form-group">
                            <label for="org_name" class="col-md-4 control-label">Organisation Name</label>

                            <div class="col-md-6">
                                <p>{{ Auth::user()->org_name}}</p>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="license_id" class="col-md-4 control-label">License ID</label>

                            <div class="col-md-6">
                                <p>{{Auth::user()->license_id}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="website" class="col-md-4 control-label">Website</label>

                            <div class="col-md-6">
                                <p>{{Auth::user()->website}}</p>

                            </div>
                        </div>

                         @if (Auth::user()->description != NULL) 
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                
                                <p>{{Auth::user()->description}}</p>
                                
                            </div>
                        </div>
                        @endif
                                    
                        <div class="form-group">
                            <label for="contact_person" class="col-md-4 control-label">Contact Person</label>

                            <div class="col-md-6">
                                <p>{{Auth::user()->contact_person}}</p>
                                    
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                         @if (Auth::user()->telephone != NULL) 
                        <div class="form-group">
                            <label for="telephone" class="col-md-4 control-label">Telephone</label>

                            <div class="col-md-6">
                                <p>{{ Auth::user()->telephone }}</p>
                                    
                            </div>
                        </div>
                        @endif

                        @if (Auth::user()->mobile != NULL)
                        <div class="form-group">
                            <label for="mobile" class="col-md-4 control-label">Mobile</label>

                            <div class="col-md-6">
                                <p>{{ Auth::user()->mobile }}</p>
                                
                            </div>
                        </div>
                         @endif 

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <p> {{ Auth::user()->address }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="suburb" class="col-md-4 control-label">Suburb</label>

                            <div class="col-md-6">
                                <p>{{ Auth::user()->suburb }}</p>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="postcode" class="col-md-4 control-label">Postcode</label>

                            <div class="col-md-6">
                                <p>{{ Auth::user()->postcode }}</p>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                <p>{{ Auth::user()->state }}</p>

                            </div>
                        </div>

                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                                <a class="btn btn-link" href="{{ url('/home') }}">Go back</a>
                            </div>
                            <div class="clearfix visible-xs-block"></div>
                        <div class="col-sm-12 col-md-4 col-md-offset-4">
                                <a class="btn btn-link" href="{{ route('profile.show') }}">Edit</a>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
