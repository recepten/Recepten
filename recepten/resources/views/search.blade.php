@extends('templates.default')

@section('content')
<div class="container">
    @if (count($recepten) === 0)
    Geen recepten gevonden
    @elseif (count($recepten) >= 1)
        @foreach($recepten as $recept)
		<a href="{{ route('recept.index', $recept->receptId ) }}">
		<div class="recept col-md-12">
		<div class="left">
			<div class="foto"></div>
		</div>
			<div class="right">
				<p class="title">{{ $recept->titel }}</p>
			<p class="upvotes">Upvotes: {{$recept->upvotes}}</p>
			</div>
		</div>
	</a>
        @endforeach
    @endif
</div>
@endsection