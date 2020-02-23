@extends('layouts/app')

@section('content')

@include('parchalse/header')

<br>

<div class="row">
	<div class="col-md-12">
		<h1 class="text-center notfind">Nombre de message envoyé</h1>
	</div>
</div>

<br>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Message Enveloppe</h5>
        <a href="" class="btn statbtn">( {{ $sumenv }} ) envoyés </a>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Message Sachet</h5>
        <a href="" class="btn statbtn">( {{ $sumsach }}) envoyés </a>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Message Carton</h5>
        <a href="" class="btn statbtn">( {{ $sumcar }}) envoyés </a>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Message Colis</h5>
        <a href="" class="btn statbtn">( {{ $sumcol }} ) envoyés </a>
      </div>
    </div>
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
		      <th scope="col">Type</th>
		      <th scope="col">Date et heure d'envoie</th>
		      <th scope="col">Envoyer par</th>
		      <th scope="col">Role</th>
		      <th scope="col">Menu</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($messages as $message)
		    <tr>
		      <th scope="row"><span class="badge badge-pill badge-dark">{{ $i++ }}</span></th>
		      <td class="td">{{ $message->nbr_numero }}</td>
		      <td class="td">{{ ucfirst($message->type) }}</td>
		      <td class="td">{{ $message->date_env }} {{ $message->heur }}</td>
		      <td class="td">{{ ucfirst($message->user->prenom) }} {{ ucfirst($message->user->nom) }}</td>
		      <td class="td">
		      	@if($message->user->isAdmin == 1)
		      	<span class="badge badge-pill badge-dark">Admin</span>
		      	@elseif($message->user->isAdmin == 0)
		      	<span class="badge badge-pill badge-dark">Agent</span>
		      	@endif
		      </td>
		      <td><button class="btn btn-success" data-toggle="modal" data-target="#stat-{{ $message->id }}"><i class="fa fa-eye"></i></button></td>
		    </tr>
		    <!-- Modal -->
			<div class="modal fade" id="stat-{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
			        <p><span class="ermsg">Type du message :</span> {{ ucfirst($message->type) }}</p>
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

@include('parchalse/footer')

@endsection