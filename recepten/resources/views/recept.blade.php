@extends('templates.default')


@section('content')

	@foreach($recepten as $recept)
		<div class="recept col-md-12">
		<div class="left">
			<div class="foto"></div>
		</div>
			<div class="right">
				<p class="title">{{ $recept->titel }}</p>
				<p class="ingredienten">{{$recept->ingredienten}}</p>
				<p class="beschrijving">{{$recept->beschrijving}}</p>
			<p class="upvotes">Upvotes: {{$recept->upvotes}}</p>
			</div>
			<?php if(Auth::id() == $recept->gebruikerId ) : ?>


				<button id="Verwijderen" name="Verwijderen" class="btn btn-primary">Recept verwijderen</button>


				<a href="{{ route('receptverwijderen.index', $recept->receptId ) }}"></a>
			<?php endif; ?>
		</div>
	@endforeach
@endsection