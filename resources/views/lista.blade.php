<html>
<head>

<style type="text/css">
.config{
	margin-top: 20px;
	margin-left: 80px;
	margin-right: 80px;
	
    font-family: Arial, Helvetica, sans-serif;
	font-size: medium;	
	color: black;
    
    line-height:1.5;
    word-spacing: 1.5;
    text-align:justify;
    
}




</style>
</head>


<body>
<div class="config">



<table >
		<thead >
		
			<tr>
	
				<th scope="col">Nome</th>
				<th scope="col">BI</th>
				<th scope="col">Nacionalidade</th>
				<th scope="col">Residencia</th>
				<th scope="col">Instituicao</th>
				
				<th scope="col">Peticao</th>
				<th scope="col">Sugestao/Reclamacao</th>
				<th scope="col">DatadeEnvio</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		
			@foreach( $Requerente as $requerente  )
		<tr>
	
			<td>{{$requerente->nome}}</td>
			<td>{{$requerente->BI}}</td>
			<td>{{$requerente->Nacionalidade}}</td>
			<td>{{$requerente->Residencia}}</td>
			<td>{{$requerente->Instituicao}}</td>
		
			<td>{{$requerente->tipoPeticao}}</td>
			<td>{{$requerente->sugestao}}</td>
			<td>{{$requerente->DatadeEnvio}}</td>
	


		</tr>
		 @endforeach

			</tbody>





		</thead>
		


	</table>

	



</div>


</div>
</body>






















</html>