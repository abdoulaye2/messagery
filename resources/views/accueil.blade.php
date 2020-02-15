@extends('layouts/app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="{{ asset('image/logo.png') }}"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link l" href="#" style="color: #080808;">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link l" href="#" style="color: #080808;">Enveloppe</a>
      </li>
      <li class="nav-item">
        <a class="nav-link l" href="#" style="color: #080808;">Sachet</a>
      </li>
      <li class="nav-item">
        <a class="nav-link l" href="#" style="color: #080808;">Carton</a>
      </li>
      <li class="nav-item">
        <a class="nav-link l" href="#" style="color: #080808;">Colis</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle l" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #080808;">
          Administration
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item l" href="#">Gestion des utilisateurs</a>
          <a class="dropdown-item l" href="#">Statistique</a>
        </div>
      </li>
    </ul>
    <form class="form-inline" method="POST" action="{{ url('/deconnexion') }}">
  	@csrf
    <button class="btn btn-danger" type="submit"><i class="fa fa-sign-out-alt"></i> Deconnexion</button>
  </form>
  </div>
</nav>


<br><br>
<div class="row">
	<div class="col-md-2">
		<i class="fa fa-user-alt text-center"></i> 
		<br>
		<b>{{ ucfirst(Auth::user()->prenom) }} {{ ucfirst(Auth::user()->nom) }}</b>
	</div>
	<div class="col-md-6">
		<marquee><h1>Bienvenue à Nijma Niger</h1></marquee>
	</div>
</div>

<br><br>

<div class="row">
	<div class="col-md-2"></div>
	<a href="#" class="col-md-3 car" style="text-decoration: none;">
		<br><br>
		<h3 class="text-center carh1">Enveloppe</h3>
	</a>
	<div class="col-md-2"></div>
	<a href="#" class="col-md-3 car" style="text-decoration: none;">
		<br><br>
		<h3 class="text-center carh1">Sachet</h3>
	</a>
</div>

<br><br>

<div class="row">
	<div class="col-md-2"></div>
	<a href="#" class="col-md-3 car" style="text-decoration: none;">
		<br><br>
		<h3 class="text-center carh1">Carton</h3>
	</a>
	<div class="col-md-2"></div>
	<a href="#" class="col-md-3 car" style="text-decoration: none;">
		<br><br>
		<h3 class="text-center carh1">Colis</h3>
	</a>
</div>

<br><br><br><br>

<footer>
	<div class="row">
		<div class="col-md-12">
			<p class="text-center copy">Copyright &copy; by M2ATECH</p>
		</div>
	</div>
</footer>

@endsection