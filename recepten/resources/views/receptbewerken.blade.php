@extends('templates.default')

@section('content')

<form action="{{ route('recepteditsave.index', $recept->receptId) }}" enctype="multipart/form-data" method="POST" class="form-horizontal">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<fieldset>

<!-- Form Name -->
<legend>Recept bewerken</legend>

@if ($errors->any())
    <div class="alert alert-success">
        {{ $errors->first() }}
    </div>
@endif

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Titel">Titel</label>
  <div class="col-md-4">
  <input id="Titel" name="Titel" type="text" value="{{ old('Titel') ?: $recept->titel}}" placeholder="Titel" class="form-control input-md" required="">

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="catagorieId">Catagorie</label>
  <div class="col-md-4">
    <select id="catagorieId" name="catagorieId" class="form-control">
      <option <?php if($recept->catagorieId == '1'){echo("selected");}?> value="1">Voorgerechten</option>
      <option <?php if($recept->catagorieId == '2'){echo("selected");}?> value="2">Hoofdgerechten</option>
      <option <?php if($recept->catagorieId == '3'){echo("selected");}?> value="3">Nagerechten</option>
      <option <?php if($recept->catagorieId == '4'){echo("selected");}?> value="4">Tussengerechten</option>
      <option <?php if($recept->catagorieId == '5'){echo("selected");}?> value="5">Cake,gebak en taart</option>
      <option <?php if($recept->catagorieId == '6'){echo("selected");}?> value="6">Overig</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="beschrijving" >Beschrijving</label>
  <div class="col-md-4">
    <textarea class="form-control" id="beschrijving" name="beschrijving">{{ old('beschrijving') ?: $recept->beschrijving}}</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Ingredienten">Ingredienten</label>
  <div class="col-md-4">
  <input id="Ingredienten" name="Ingredienten" value="{{ old('Titel') ?:$recept->ingredienten}}" type="text" placeholder="Ingredienten" class="form-control input-md" required="">

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
    <button id="Toevoegen" name="Toevoegen" class="btn btn-primary">Recept bewerken</button>
  </div>
</div>

</fieldset>
</form>



@endsection