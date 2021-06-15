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




     @foreach( $Requerente as $requerente  )

    <p valign="right"><b>{{$requerente->Ministerio}}</b></p></br>
    <p valign="right"><b>Exmo Senhor Diretor</b></p><br>
    
     
<p>{{$requerente->nome}} de número  de BI {{$requerente->BI}} de nacionalidade {{$requerente->Nacionalidade}}
    residente em {{$requerente->Residencia}}, vem por este meio apresentar a sua {{$requerente->tipoPeticao}} para a {{$requerente->Instituicao}}				
	na seguinte ação: {{$requerente->sugestao}}, ciente de que esta carta merecerá uma atenção da V.EXICIA.
    <br><br>
</p>
<p style="text-align:center">{{$requerente->nome}}</p>
<p style="text-align:center">____________________________________</p>

<p style="text-align:center">{{$requerente->DatadeEnvio}}</p>
<footer><br><br>
<p>Contato</p>
<p valign="right"><b>+{{$requerente->Tel}}</b></p>
</footer>

</div>
</body>


@endforeach






















</html>
