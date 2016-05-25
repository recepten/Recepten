@extends('templates.default')


@section('content')

	@foreach($recepten as $recept)
	<a href="{{ route('recept.index', $recept->receptId ) }}">
		<div class="recept col-md-12">
		<div class="left">
			<div class="foto">(foto)</div>
		</div>
			<div class="right">
				<h5 class="title">{{ $recept->titel }}</h5>
				<p class="ingredienten">{{$recept->ingredienten}}</p>
				<p class="beschrijving">{{$recept->beschrijving}}</p>
			<p class="upvotes">Upvotes: {{$recept->upvotes}}</p>
			</div>
		</div>
	</a>
	@endforeach
@endsection