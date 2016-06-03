<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Recepten</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.1/js/formValidation.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.1/js/framework/bootstrap.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


	</head>
	<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">ReceptenApp</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">



<?php if(Auth::check()) : ?>
   <!-- gebruiker is ingelogd -->
   <li><a href="{{ route('recepttoevoegen.index')}}">Recept toevoegen</a></li>
   <li><a href="{{ route('mijnrecepten.index')}}">Mijn recepten</a></li>
   <li><a href="{{route('mijnfavorieten.index')}}">Mijn favorieten</a></li>
<?php else : ?>
  <li><a href="{{ route('login.index')}}">Login</a></li>
  <li><a href="{{ route('register.index')}} "> Registreren</a></li>
<?php endif; ?>

        <li><a href="/recepten">Recepten</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catagorieen <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('voorgerechten.index')}}">Voorgerechten</a></li>
            <li><a href="{{ route('hoofdgerechten.index')}}">Hoofdgerechten</a></li>
            <li><a href="{{ route('nagerechten.index')}}">Nagerechten</a></li>
            <li><a href="{{ route('tussengerechten.index')}}">Tussengerechten</a></li>
            <li><a href="{{ route('cake.index')}}">Cake,taart en gebak</a></li>
            <li><a href="{{ route('overig.index')}}">Overig</a></li>
          </ul>
        </li>
          <?php if (Auth::check()) : ?>
        <li><a href="{{ route('auth.signout')}}">Uitloggen</a></li>
      <?php endif; ?>

      </ul>
      <form class="navbar-form navbar-left" action="{{ url('/resultaten')}}" role="search" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Zoeken" id="search" name="search">
        </div>
        <button type="submit" class="btn btn-default">Zoeken</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




	 	<div class="container">
	        @yield('content')
    </div>
    </body>
</html>