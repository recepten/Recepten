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
		</div>
	@endforeach
@endsection