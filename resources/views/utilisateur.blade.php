@extends('layouts/app')

@section('content')

@include('parchalse/header')

<br>

<div class="row">
	<div class="col-md-8"></div>
	<div class="col-md-4">
		<button type="button" class="btn ajouterbtn" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Ajouter un utilisateur</button>
	</div>
</div>

<br>

<div class="row">
	<div class="col-md-12">
		<table class="table table-light">
		  <thead class="tablehead">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nom & Prénom</th>
		      <th scope="col">Telephone</th>
		      <th scope="col">E-mail</th>
		      <th scope="col">Role</th>
		      <th scope="col">Menu</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $user)
		    <tr>
		      <th scope="row">{{ $i++ }}</th>
		      <td>{{ ucfirst($user->prenom) }} {{ ucfirst($user->nom) }}</td>
		      <td>{{ $user->telephone }}</td>
		      <td>{{ $user->email }}</td>
		      <td>
		      	@if($user->isAdmin == 1)
		      		Admin
		      	@elseif($user->isAdmin == 0)
		      		Agent
		      	@endif
		      </td>
		      <td>
		      	<button class="btn btn-warning" data-toggle="modal" data-target="#msg"><i class="fa fa-eye"></i></button>
		      	<button class="btn btn-success" data-toggle="modal" data-target="#msg"><i class="fa fa-edit"></i></button>
		      	<button class="btn btn-danger" data-toggle="modal" data-target="#msg"><i class="fa fa-trash"></i></button>
		      </td>
		    </tr>
		    <!-- Modal -->
			<div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header headdetaille">
			        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye"></i> Detaille message</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        
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