@extends('templates.default')

@section('content')

<form action="{{ url('/recept/opslaan') }}" enctype="multipart/form-data" method="POST" class="form-horizontal">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<fieldset>

<!-- Form Name -->
<legend>Recept toevoegen</legend>

@if ($errors->any())
    <div class="alert alert-success">
        {{ $errors->first() }}
    </div>
@endif

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Titel">Titel</label>
  <div class="col-md-4">
  <input id="Titel" name="Titel" type="text" placeholder="Titel" class="form-control input-md" required="" value="{{old('Titel')}}">

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="catagorieId">Catagorie</label>
  <div class="col-md-4">
    <select id="catagorieId" name="catagorieId" class="form-control">
      <option value="1">Voorgerechten</option>
      <option value="2">Hoofdgerechten</option>
      <option value="3">Nagerechten</option>
      <option value="4">Tussengerechten</option>
      <option value="5">Cake,gebak en taart</option>
      <option value="6">Overig</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="beschrijving">beschrijving</label>
  <div class="col-md-4">
    <textarea class="form-control" id="beschrijving" name="beschrijving">{{ old('beschrijving') }}</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Ingredienten">Ingredienten</label>
  <div class="col-md-4">
  <input id="Ingredienten" name="Ingredienten" type="text" placeholder="Ingredienten" class="form-control input-md" required="" value="{{ old('Ingredienten') }}">

  </div>
</div>

<div class="form-group">
<label class="col-md-4 control-label" for="foto">foto</label>
  <input type="file" name="file">
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Toevoegen"></label>
  <div class="col-md-4">
    <button id="Toevoegen" class="btn btn-primary">Recept toevoegen</button>
  </div>
</div>

</fieldset>
</form>



@endsection