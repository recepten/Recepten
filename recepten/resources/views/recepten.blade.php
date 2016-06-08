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
		<?php if($recept->foto) : ?>
			<div class="foto"><img src="uploads/{{$recept->foto}}" alt=""></div>
		<?php endif; ?>

		</div>
			<div class="right">
				<p class="title">{{ $recept->titel }}</p>
				<p class="upvotes">Upvotes: {{$upvotes= \DB::table('upvotes')->where('receptId', $recept->receptId)->count()}}</p>
				<p class="upvotes"> Categorie: <?php $categorie = \DB::table('categorieen')->select('catagorieNaam')->where('catagorieId', $recept->catagorieId)->get(); echo $categorie[0]->catagorieNaam; ?></p>
			</div>
		</div>
	</a>
	@endforeach
	 {!! $recepten->render() !!}

</div>
@endsection

