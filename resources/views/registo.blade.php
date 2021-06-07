@extends('admin')

@section('main-content')
<meta name="csrf-token" content="{{csrf_token()}}"/>
<link href="{{asset('estilo.css')}}" rel="stylesheet">
<style rel="stylesheet">
h6{
		color:red;

}



</style>
<div class="card">
    <div class="card-header" style="background-color: yellowgreen"><b >Cadastrar Usuários</b></div>
    <div class="card-body">
<div class="centalizar">    

	<form name="CriarUsuer" id="cad" >
		@csrf
		
		<div class="form-group">
		<label>Nome</label>
		<input class="form-control" type="text" id="nome" name="nome" value="{{old('nome')}}">
		
		</div>
			<div class="form-group">
		<label>E-mail</label>
		<input class="form-control" type="text" class="form-control" name="email" id="email"  value="{{old('email')}}" >
			
		</div>
		<div class="form-group">
		<label>Palavra Passe</label><input class="form-control" type="password" name="senha" id="senha" >
		</div>
		<div class="form-group">
		<label>Confirmar Palavra Passe</label><input class="form-control" type="password"  name="confSenha" id="confSenha" >
		</div>
		
		<input type="submit" name="" value="Cadastrar" class="btn" >
		
		</div>		
</div>
</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/validate.js')}}" type="text/javascript" async="true" defer></script>
<script src="{{asset('js/jquery-ui.js')}}" type="text/javascript" async="true" defer></script>
<script src="{{asset('js/jquery.form.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/ajax.js')}}" type="text/javascript" async="true" defer></script>
@endsection