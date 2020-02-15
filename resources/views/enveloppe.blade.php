@extends('layouts/app')

@section('content')

@include('parchalse/header')

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<br>
		<p class="copy">Formulaire d'envoyer message</p>
		<form>
			<input type="text" name="numero" class="form-control" placeholder="Entrer les numéros séparés par une virgule.">
			<br>
			<textarea class="form-control text">Bonsoir, Nous vous informions que votre colis est bien venu a destination veuillez le recuppere munis de votre piece d'identite.</textarea>
			<br>
			<button class="btn btn-dark sendbtn"><i class="fa fa-paper-plane"></i> Envoyer</button>
		</form>
	</div>
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