@extends('layouts/app')

@section('content')

@include('parchalse/header')

<br><br>

<div class="row">
	<div class="col-md-2">
		<i class="fa fa-user-alt text-center po"></i> 
		<br>
		<b class="po">{{ ucfirst(Auth::user()->prenom) }} {{ ucfirst(Auth::user()->nom) }}</b>
	</div>
	<div class="col-md-6">
		<marquee><h1 class="po">Bienvenue à Nijma Niger</h1></marquee>
	</div>
</div>

<br><br>

<div class="row">
	<div class="col-md-2"></div>
	<a href="{{ url('/enveloppe') }}" class="col-md-3 car" style="text-decoration: none;">
		<br><br>
		<h3 class="text-center carh1">Enveloppe</h3>
	</a>
	<div class="col-md-2"></div>
	<a href="{{ url('/sachet') }}" class="col-md-3 car" style="text-decoration: none;">
		<br><br>
		<h3 class="text-center carh1">Sachet</h3>
	</a>
</div>

<br><br>

<div class="row">
	<div class="col-md-2"></div>
	<a href="" class="col-md-3 car" style="text-decoration: none;">
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

@include('parchalse/footer')

@endsection