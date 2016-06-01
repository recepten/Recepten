@extends('templates.default')


@section('content')


	@foreach($recepten as $recept)
	<?php $upvotes= \DB::table('upvotes')->where('receptId', $recept->receptId)->count(); ?>
		<div class="recept col-md-12">
		<div class="left">
			<div class="foto"></div>
		</div>
			<div class="right">
				<p class="title">{{ $recept->titel }}</p>
				<p class="ingredienten">{{$recept->ingredienten}}</p>
				<p class="beschrijving">{{$recept->beschrijving}}</p>
			<p class="upvotes">Upvotes:{{$upvotes}} </p>
			</div>

			<?php if(Auth::check()) : ?>
				<a href="{{ route('receptupvoten.index', $recept->receptId ) }}"><button id="Verwijderen" name="Verwijderen" class="btn btn-primary">
				Recept upvoten</button></a>
				<a href="{{ route('favoriettoevoegen.index', $recept->receptId ) }}"><button id="favoriet" name="favoriet" class="btn btn-primary">
				favoriet toevoegen</button></a>

				@if (session('status'))
    				<div class="alert alert-success">
        				{{ session('status') }}
    				</div>
				@endif
			<?php endif; ?>
			<?php if(Auth::id() == $recept->gebruikerId ) : ?>
				<a href="{{ route('receptedit.index', $recept->receptId ) }}"><button id="edit" name="edit" class="btn btn-primary">Recept bewerken</button></a>
				<a href="{{ route('receptverwijderen.index', $recept->receptId ) }}"><button id="Verwijderen" name="Verwijderen" class="btn btn-primary">Recept verwijderen</button></a>
			<?php endif; ?>

		</div>
	@endforeach
@endsection