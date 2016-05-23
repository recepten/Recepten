@extends('templates.default')


@section('content')
<div class="container">

	@foreach($recepten as $recept)
	<div class="recept col-md-12">
		<h5>{{ $recept->titel }}</h5>
		<p>{{$recept->upvotes}}</p>
	</div>
	@endforeach

</div>
@endsection

