@extends('layouts/app')

@section('content')

@include('parchalse/header')

<br><br>

<div class="row">
	<div class="col-md-2">
		<i class="fa fa-user-alt text-center"></i> 
		<br>
		<b>{{ ucfirst(Auth::user()->prenom) }} {{ ucfirst(Auth::user()->nom) }}</b>
	</div>
	<div class="col-md-2"></div>
	<div class="col-md-4">
		<h3 class="msg">MESSAGE ENVELOPPE</h3>
		<br>
		@if($errors->any())
	        <div class="alert alert-danger" role="alert">
	              {{ $errors->first() }}
	        </div>
        @endif
        @if(Session::has('error'))
	        <div class="alert alert-danger" role="alert">
	              {{ Session::get('error') }}
	        </div>
        @endif
		<form method="POST" action="{{ url('/enveloppe') }}">
			@csrf
			<input type="text" name="num" class="form-control" placeholder="Entrer les numéros séparés par une virgule.">
			<br>
			<textarea class="form-control text" name="msg">Bonsoir, Nous vous informions que votre colis est bien venu a destination veuillez le recuppere munis de votre piece d'identite.</textarea>
			<br>
			<button class="btn btn-dark sendbtn"><i class="fa fa-paper-plane"></i> Envoyer</button>
		</form>
	</div>
	<div class="col-md-4"></div>
</div>

<br><br>

<div class="row">
	<div class="col-md-12">
		<table class="table table-light">
		  <thead class="tablehead">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Numéro</th>
		      <th scope="col">Date d'envoie</th>
		      <th scope="col">Menu</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">1</th>
		      <td>Otto</td>
		      <td>@mdo</td>
		      <td><button class="btn btn-success"><i class="fa fa-eye"></i></button></td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Thornton</td>
		      <td>@fat</td>
		      <td><button class="btn btn-success"><i class="fa fa-eye"></i></button></td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td>the Bird</td>
		      <td>@twitter</td>
		      <td><button class="btn btn-success"><i class="fa fa-eye"></i></button></td>
		    </tr>
		  </tbody>
		</table>
	</div>
</div>

<br><br>

@include('parchalse/footer')

@endsection