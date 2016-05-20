@extends('templates.default')

@section('content')
<div class="center">
    <h3>Registreren</h3>
    <div class="row">
        <div class="col-lg-8">
            <form class="form-vertical" role="form" method="post" action="{{ route('register.index') }}">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Naam</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ Request::old('name') ?: '' }}">
                    @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email Adres</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: '' }}">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Wachtwoord</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Registeer nu</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
@stop