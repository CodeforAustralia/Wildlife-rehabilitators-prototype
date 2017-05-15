@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update your profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update') }}">
                        {{ csrf_field() }}

                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('license_id') ? ' has-error' : '' }}">
                            <label for="license_id" class="col-md-4 control-label">License ID</label>

                            <div class="col-md-6">
                                <input id="license_id" type="text" class="form-control" name="license_id" value="{{ $user->license_id }}" required>

                                @if ($errors->has('license_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('license_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('org_name') ? ' has-error' : '' }}">
                            <label for="org_name" class="col-md-4 control-label">Organisation Name</label>

                            <div class="col-md-6">
                                <input id="org_name" type="text" class="form-control" name="org_name" value="{{ $user->org_name }}" required autofocus>

                                @if ($errors->has('org_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('org_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label">Website</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ $user->website != NULL ? $user->website : '' }}">

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                
                                <textarea id="description" class=" form-control materialize-textarea" name="description" value="{{ $user->description != NULL ? $user->description : '' }}"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                    
                        <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
                            <label for="contact_person" class="col-md-4 control-label">Contact Person</label>

                            <div class="col-md-6">
                                <input id="contact_person" type="text" class="form-control" name="contact_person" value="{{ $user->contact_person }}" required>

                                @if ($errors->has('contact_person'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_person') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <label for="telephone" class="col-md-4 control-label">Telephone</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control" name="telephone" value="{{ $user->telephone != NULL ? $user->telephone : '' }}">

                                @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $user->mobile != NULL ? $user->mobile : '' }}">

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('suburb') ? ' has-error' : '' }}">
                            <label for="suburb" class="col-md-4 control-label">Suburb</label>

                            <div class="col-md-6">
                                <input id="suburb" type="text" class="form-control" name="suburb" value="{{ $user->suburb }}" required>

                                @if ($errors->has('suburb'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('suburb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                            <label for="postcode" class="col-md-4 control-label">Postcode</label>

                            <div class="col-md-6">
                                <input id="postcode" type="text" class="form-control" name="postcode" value="{{ $user->postcode }}" required>

                                @if ($errors->has('postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                <select id="state" name="state" required>
                                    <option @if($user->state == 'ACT') { selected } @endif>ACT</option>
                                    <option @if($user->state == 'NT' ) { selected } @endif>NT</option>
                                    <option @if($user->state == 'NSW') { selected } @endif>NSW</option>
                                    <option @if($user->state == 'QLD') { selected } @endif>QLD</option>
                                    <option @if($user->state == 'SA') { selected } @endif>SA</option>
                                    <option @if($user->state == 'TAS') { selected } @endif>TAS</option>
                                    <option @if($user->state == 'VIC') { selected } @endif>VIC</option>
                                    <option @if($user->state == 'WA') { selected } @endif>WA</option>
                                </select>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-6 col-md-offset-4">
                                 <input type="checkbox" id="accept_terms" name="accept_terms" checked="$user->accept_terms != NULL ? $user->accept_terms : ''" /><label for="accept_terms">I agree to share my contact details (telephone, mobile and website only) with other foster carers and wildlife groups</label>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>

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
                    </form>

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection