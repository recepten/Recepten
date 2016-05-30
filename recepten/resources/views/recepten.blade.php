@extends('templates.default')


@section('content')
<div class="container">
                 @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif


	@foreach($recepten as $recept)

	<a href="{{ route('recept.index', $recept->receptId ) }}">
		<div class="recept col-md-12">
		<div class="left">
			<div class="foto"></div>
		</div>
			<div class="right">
				<p class="title">{{ $recept->titel }}</p>
			<p class="upvotes">Upvotes: {{$upvotes= \DB::table('upvotes')->where('receptId', $recept->receptId)->count()}}</p>
			</div>
		</div>
	</a>
	@endforeach

</div>
@endsection

