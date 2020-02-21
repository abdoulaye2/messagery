@extends('layouts/app')

@section('content')

@include('parchalse/header')

<br>

<div class="row">
	<div class="col-md-8">
		@if($errors->any())
		    <div class="alert alert-danger text-center ermsg" role="alert">
		          {{ $errors->first() }}
		    </div>
		@elseif(Session::get('error'))
		    <div class="alert alert-danger text-center ermsg" role="alert">
		          {{ Session::get('error') }}
		    </div>
		@elseif(Session::get('success'))
		    <div class="alert alert-success text-center ermsg" role="alert">
		          {{ Session::get('success') }}
		    </div>
		@endif
	</div>
	<div class="col-md-4">
		<button type="button" class="btn ajouterbtn" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Ajouter un utilisateur</button>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header headdetaille">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye"></i> Ajouter un utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/create-account') }}">
      <div class="modal-body">
    	@csrf
    	<div class="form-group">
    		<label class="label-control"><span class="ermsg">Nom</span></label>
    		<input type="text" name="nom" class="form-control" placeholder="Entrer le nom de l'utilisateur">
    	</div>
    	<div class="form-group">
    		<label class="label-control"><span class="ermsg">Prénom</span></label>
    		<input type="text" name="prenom" class="form-control" placeholder="Entrer le Prénom de l'utilisateur">
    	</div>
    	<div class="form-group">
    		<label class="label-control"><span class="ermsg">Téléphone</span></label>
    		<input type="text" name="telephone" class="form-control" placeholder="Entrer le numéro de téléphone de l'utilisateur">
    	</div>
    	<div class="form-group">
    		<label class="label-control"><span class="ermsg">E-mail</span></label>
    		<input type="text" name="email" class="form-control" placeholder="Entrer l'adress E-mail de l'utilisateur">
    	</div>
    	<div class="form-group">
    		<label class="label-control"><span class="ermsg">Role</span></label>
    		<select name="role" class="form-control">
    			<option value="">Sélectionner le rôle de l'utilisateur</option>
    			<option value="1">Admin</option>
    			<option value="0">Agent</option>
    		</select>
    	</div>
    	<div class="form-group">
    		<label class="label-control"><span class="ermsg">Pseudo</span></label>
    		<input type="text" name="username" class="form-control" placeholder="Entrer le pseudo de l'utilisateur">
    	</div>
    	<div class="form-group">
    		<label class="label-control"><span class="ermsg">Mot de passe</span></label>
    		<input type="password" name="password" class="form-control" placeholder="Entrer le mot de passe de l'utilisateur">
    	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fermer</button>
        <button class="btn btn-success"><i class="fa fa-save"></i> Enregistrer</button>
      </div>
      </form>
    </div>
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
		      <th scope="col">Téléphone</th>
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
		      	<button class="btn btn-dark" data-toggle="modal" data-target="#pro-{{ $user->id }}"><i class="fa fa-eye"></i></button>
		      	<button class="btn btn-success" data-toggle="modal" data-target="#mod-{{ $user->id }}"><i class="fa fa-edit"></i></button>
		      	@if($user->isAdmin == 0)
		      	@if($user->bloquer == 0)
		      	<button class="btn btn-danger" data-toggle="modal" data-target="#del-{{ $user->id }}"><i class="fa fa-lock"></i></button>
		      	@elseif($user->bloquer == 1)
		      	<button class="btn btn-warning" data-toggle="modal" data-target="#deldeb-{{ $user->id }}"><i class="fa fa-lock-open"></i></button>
		      	@endif
		      	@endif
		      </td>
		    </tr>
		    <!-- Modal -->
			<div class="modal fade" id="pro-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header headdetaille">
			        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye"></i> Profile utilisateur</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p><span class="ermsg">Nom & Nom & Prénom : </span> {{ ucfirst($user->prenom) }} {{ ucfirst($user->nom) }}</p>
			        <p><span class="ermsg">Téléphone : </span> {{ $user->telephone }}</p>
			        <p><span class="ermsg">E-mail : </span> {{ $user->email }}</p>
			        <p><span class="ermsg">Role : </span>
			        	@if($user->isAdmin == 1)
				      		Admin
				      	@elseif($user->isAdmin == 0)
				      		Agent
				      	@endif
			        </p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="mod-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header headdetaille">
			        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye"></i> Profile utilisateur</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <form method="POST" action="{{ url('/gestion-des-utilisateurs') }}">
			      <div class="modal-body">
		        	@csrf
					<input type="hidden" name="id" value="{{ $user->id }}">
		        	<div class="form-group">
		        		<label class="label-control"><span class="ermsg">Nom</span></label>
		        		<input type="text" name="nom" class="form-control" value="{{ $user->nom }}" placeholder="Entrer le nom de l'utilisateur">
		        	</div>
		        	<div class="form-group">
		        		<label class="label-control"><span class="ermsg">Prénom</span></label>
		        		<input type="text" name="prenom" class="form-control" value="{{ $user->prenom }}" placeholder="Entrer le Prénom de l'utilisateur">
		        	</div>
		        	<div class="form-group">
		        		<label class="label-control"><span class="ermsg">Téléphone</span></label>
		        		<input type="text" name="telephone" class="form-control" value="{{ $user->telephone }}" placeholder="Entrer le numéro de téléphone de l'utilisateur">
		        	</div>
		        	<div class="form-group">
		        		<label class="label-control"><span class="ermsg">E-mail</span></label>
		        		<input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Entrer l'adress E-mail de l'utilisateur">
		        	</div>
		        	<div class="form-group">
		        		<label class="label-control"><span class="ermsg">Role</span></label>
		        		<select name="role" class="form-control">
		        			@if($user->isAdmin == 1)
		        			<option value="1" selected="">Admin</option>
		        			<option value="0">Agent</option>
		        			@elseif($user->isAdmin == 0)
		        			<option value="0" selected="">Agent</option>
		        			<option value="1">Admin</option>
		        			@endif
		        		</select>
		        	</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fermer</button>
			        <button class="btn btn-success"><i class="fa fa-save"></i> Enregistrer</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="del-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header headdetaille">
			        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye"></i> Confirmation</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p>Êtes-vous sur de vouloir bloquer le compte de cet utilisateur ?</p>
			      </div>
			      <form method="POST" action="{{ url('/bloquer') }}">
			      @csrf
			      <div class="modal-footer">
			      	<input type="hidden" name="id" value="{{ $user->id }}">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
			        <button class="btn btn-danger">Oui</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="deldeb-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header headdetaille">
			        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye"></i> Confirmation</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p>Êtes-vous sur de vouloir débloquer le compte de cet utilisateur ?</p>
			      </div>
			      <form method="POST" action="{{ url('/debloquer') }}">
			      @csrf
			      <div class="modal-footer">
			      	<input type="hidden" name="id" value="{{ $user->id }}">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
			        <button class="btn btn-success">Oui</button>
			      </div>
			      </form>
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