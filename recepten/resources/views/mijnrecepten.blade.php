@extends('templates.default')


@section('content')
<div class="container">

    @if (count($recepten) === 0)
    u heefd nog geen eigen recepten.
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
				<h5 class="title">{{ $recept->titel }}</h5>
			<p class="upvotes">Upvotes: {{$upvotes= \DB::table('upvotes')->where('receptId', $recept->receptId)->count()}}</p>
							<p class="upvotes"> Categorie: <?php $categorie = \DB::table('categorieen')->select('catagorieNaam')->where('catagorieId', $recept->catagorieId)->get(); echo $categorie[0]->catagorieNaam; ?></p>
			</div>
		</div>
	</a>
	@endforeach

</div>
@endsection

