@extends('templates.default')


@section('content')
<div class="container">
	@foreach($recepten as $recept)
		<h5>{{ $recept->titel }}</h5>
		<p>{{$recept->upvotes}}</p>
	@endforeach
</div>
@endsection

