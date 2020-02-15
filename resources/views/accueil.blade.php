@extends('layouts/app')

@section('content')

<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand"><img src="{{ asset('image/logo.png') }}"></a>
  <form class="form-inline" method="POST" action="{{ url('/deconnexion') }}">
  	@csrf
    <button class="btn btn-danger" type="submit"><i class="fa fa-sign-out-alt"></i> Deconnexion</button>
  </form>
</nav>
<br><br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-6">
		<marquee><h1>Bienvenue a Nijma Niger</h1></marquee>
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