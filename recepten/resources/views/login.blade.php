@extends('templates.default')


@section('content')


  <form class="form-horizontal">
  <fieldset>

  <!-- Form Name -->
  <legend>Inloggen</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Email</label>
    <div class="col-md-4">
    <input id="textinput" name="textinput" type="text" placeholder="Email" class="form-control input-md" required="">

    </div>
  </div>

  <!-- Password input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="Wachtwoord">wachtwoord</label>
    <div class="col-md-4">
      <input id="Wachtwoord" name="Wachtwoord" type="password" placeholder="Wachtwoord" class="form-control input-md" required="">

    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="login"></label>
    <div class="col-md-4">
      <button id="login" name="login" class="btn btn-primary">Login</button>
    </div>
  </div>

  </fieldset>
  </form>
@endsection