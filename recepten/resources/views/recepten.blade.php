@extends('templates.default')


@section('content')
<div class="container">
<div class="recept col-md-12">
	@foreach($recepten as $recept)
		<h5>{{ $recept->titel }}</h5>
		<p>{{$recept->upvotes}}</p>
	@endforeach
</div>
</div>
@endsection

