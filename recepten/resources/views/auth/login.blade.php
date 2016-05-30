@extends('templates.default')

@section('content')
<div class="center">
                 @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
    <h3>Inloggen</h3>
    <div class="row">
        <div class="col-lg-8">
            <form class="form-vertical" role="form" method="post" action="{{ route('login.index') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Log nu in</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
            <p>Nog geen account? Registreer je hier:.</p>
            <a href="{{route('register.index')}}"><button type="submit" class="btn btn-default">Registreer</button></a>
        </div>
    </div>
</div>
@stop