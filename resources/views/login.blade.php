@extends('layouts/app')

@section('content')

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<br><br><br><br><br>
		<div class="logincadre">
			<h3 class="text-center loginh1"><i class="fa fa-user"></i> Authentification</h3>
			<br>
			<form method="POST" action="{{ url('/') }}" id="form">
				@csrf
				@if($errors->any())
		        <div class="alert alert-danger ermsg" role="alert">
		              {{ $errors->first() }}
		        </div>
		        @endif
		        @if(Session::has('error'))
		        <div class="alert alert-danger ermsg" role="alert">
		              {{ Session::get('error') }}
		        </div>
		        @endif
				<input type="text" name="username" class="form-control logininp username" placeholder="Veuillez entrer votre nom d’utilisateur.">
				<br>
				<input type="password" name="password" class="form-control logininp password" placeholder="Veuillez entrer votre mot de passe.">
				<br>
				<button class="btn btn-default loginbtn"><i class="fa fa-sign-in-alt"></i>  Se connecter</button>
			</form>
		</div>
	</div>
</div>

    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>

@endsection