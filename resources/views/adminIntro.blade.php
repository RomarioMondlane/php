@extends('admin')

@section('main-content')
<style rel="stylesheet">

#a{
    display: flex;
}

.card{
    width: 100%;
}

.card+.card{
    margin-left: 30px;
}
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

<div class="card-header" style="background-color: red"><b>Sistema de Gestão de petições</b></div>
<div id="a" class="">
<div class="card">
    
    <div class="card-body">
    <div class="config">
    <h4>
    De acordo com o artigo 5 da Lei n.°26/2014, de 23 de Setembro, o direito a petição, 
    queixa e reclamação constituí prorrogativa dos cidadãos moçambicanos e não pode ser proibido ou impedido,
     limitado ou dificuldade no seu exercício por qualquer autoridade pública ou entidade privada. 

    
    </h4>
    </div>
    </div>
</div>
<div class="card">
     <div class="card-body">
     <div class="config">
     <h4>
    Segundo o artigo 8 da Lei n.°26/2014, de 23 de Setembro, o exercício de petição, queixa e reclamação obriga a entidade destinatária a receber e examinar as petições, 
    queixas e reclamações bem como comunicar por escrito as decisões que forem tomadas
    
    </h4>
    </div>
    </div>
</div>


</div>



@endsection