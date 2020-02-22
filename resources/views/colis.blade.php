@extends('layouts/app')

@section('content')

@include('parchalse/header')

@if($errors->any())
	<br>
    <div class="alert alert-danger text-center ermsg" role="alert">
          {{ $errors->first() }}
    </div>
@elseif(Session::get('error'))
	<br>
    <div class="alert alert-danger text-center ermsg" role="alert">
          {{ Session::get('error') }}
    </div>
@elseif(Session::get('success'))
	<br>
    <div class="alert alert-success text-center ermsg" role="alert">
          {{ Session::get('success') }}
    </div>
@else
	<br><br>
@endif

<div class="row">
	<div class="col-md-2">
		<i class="fa fa-user-alt text-center po"></i> 
		<br>
		<b class="po">{{ ucfirst(Auth::user()->prenom) }} {{ ucfirst(Auth::user()->nom) }}</b>
	</div>
	<div class="col-md-2"></div>
	<div class="col-md-4">
		<form method="POST" action="{{ url('/colis') }}">
			@csrf
			<input type="text" name="num" class="form-control" placeholder="Entrer les numéros séparés par une virgule." value="{{ Session::get('lastval') }}">
			<br>
			<textarea class="form-control text" name="msg">Bonsoir, Nous vous informions que votre colis est bien venu a destination veuillez le recuppere munis de votre piece d'identite.</textarea>
			<br>
			<button class="btn btn-dark sendbtn"><i class="fa fa-paper-plane"></i> Envoyer</button>
		</form>
	</div>
	<div class="col-md-4">
		<h3 class="msg">MESSAGE COLIS</h3>
	</div>
</div>

<br><br>

<div class="row">
	<div class="col-md-12">
		<table class="table table-light">
		  <thead class="tablehead">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nombre de numéro</th>
		      <th scope="col">Date et heure d'envoie</th>
		      <th scope="col">Menu</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($messages as $message)
		    <tr>
		      <th scope="row">{{ $i++ }}</th>
		      <td>{{ $message->nbr_numero }}</td>
		      <td>{{ $message->date_env }} {{ $message->heur }}</td>
		      <td><button class="btn btn-success" data-toggle="modal" data-target="#msg-{{ $message->id }}"><i class="fa fa-eye"></i></button></td>
		    </tr>
		    <!-- Modal -->
			<div class="modal fade" id="msg-{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header headdetaille">
			        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye"></i> Detaille message</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p><span class="ermsg">Nombre de numéro :</span> {{ $message->nbr_numero }}</p>
			        <p><span class="ermsg">Les numero :</span> {{ str_replace(',', ' , ', $message->numero) }}</p>
			        <p><span class="ermsg">Date et heure d'envoie :</span> {{ $message->date_env }} <span class="ermsg">à</span> {{ $message->heur }}</p>
			        <p><span class="ermsg">Envoyer par :</span> {{ ucfirst($message->user->prenom) }} {{ ucfirst($message->user->nom) }}</p>
			        <hr>
			        <p><span class="ermsg">Message :</span> <br> {{ $message->message }}</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>
		    @endforeach
		  </tbody>
		</table>
	</div>
</div>

<br><br>

@include('parchalse/footer')

@endsection