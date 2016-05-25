@extends('templates.default')

@section('content')
<div class="container">
    @if (count($recepten) === 0)
    Geen recepten gevonden
    @elseif (count($recepten) >= 1)
    RESULTATEN:
        @foreach($recepten as $recept)
        	{{$recept->titel}}
        @endforeach
    @endif
</div>
@endsection
