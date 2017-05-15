@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Experience on species</h2>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('species_exp') }}">
                    {{ csrf_field() }}

                    

                    <ul id="filter">
					  <li class="current"><a href="#">All</a></li>
					  <li><a href="#">Land</a></li>
					  <li><a href="#">Water</a></li>
					  <li><a href="#">Air</a></li>
					</ul>

                    <ul id="species_list">

						@foreach($species as $specie)
                     	  <div class="col s12 m4">
                    	       <li class="all <?php echo strtolower($specie->category); ?>" ><input type="checkbox" id="{{ $specie->species_id }}" name="{{ $specie->species_id }}" @if($user_species->contains('species_id', $specie->species_id)) { checked } @endif /><label for="{{ $specie->species_id }}">{{ $specie->species_name }}</label></li>
                    	   </div>
                   	  	@endforeach
					</ul>
					
					<div class="form-group">

                            <div class="col s12 m4 l3 ">
                            
                                <a class="btn btn-link" href="{{ url('/home') }}">Go home</a>
                            
                            </div>
                            <div class="col s12 m4 offset-m2 l1 offset-l6">
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