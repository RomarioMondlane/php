<html>
<head>
  
	<title>
	Autenticacao
	</title>
<link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('estilo.css')}}" rel="stylesheet">
</head>


<body>

<div class="form">
	@csrf
	<form name="requisicao" action="\validar" method="POST" >
				
		<div class="form-group">
		<label>Email</label>

		<input class="form-control" type="text" value="{{ old('name') }}"  name="name" placeholder="digite o email">
		
		
		</div>
		<div class="form-group">
		<label>Palavra Passe</label>

		<input class="form-control" type="password" name="password" placeholder="digite a palavra passe">
		
		
		</div>
		<input type="submit" name="" class="btn">

</form>
</div>