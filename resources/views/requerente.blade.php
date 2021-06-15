@extends('comunidade')


@section('main-content')
	</title>
<script language="javascript" type="text/javascript">






</script>
<link href="{{asset('estilo.css')}}" rel="stylesheet">
<style rel="stylesheet">
h6{
		color:red;

}



</style>
<div class="container" style="padding: top 70px;" >
	
<div class="card">
    <div class="card-header" style="background-color: yellowgreen"><b>Preencha o Formulário abaixo</b></div>
<div class="formulario">

	<form name="requisicao" id="envio" data-funcoes-url="popular">
		@csrf
				
		<div class="form-group">
		<label>Nome</label>
		<input class="form-control" type="text" id="nome" name="nome" placeholder="digite o nome" value="{{old('nome')}}">
		
		</div>
			<div class="form-group">
		<label>Número BI</label>
		<input class="form-control" type="text" class="form-control" name="BI" placeholder="digite o numero do BI" value="{{old('BI')}}" >
			
		</div>
		<div class="form-group">
		<label>Nacionalidade</label><input class="form-control" type="text" name="Nacionalidade" id="Nacionalidade" placeholder="digite sua Nacionalidade" value="{{old('Nacionalidade')}}">
		</div>
		<div class="form-group">
		<label>Residência</label><input class="form-control" type="text" value="{{old('Residencia')}}" name="Residencia" id="Residencia" placeholder="digite sua residencia">
		</div>
		
		
		<div class="form-group">
		<label>Telefone</label><input class="form-control" type="text" name="tel" placeholder="digite seu contato de Telefone" value="{{old('Telefone')}}">
		</div>
		<div class="form-group">
		<label>Ministério</label>
		@isset($ministerio)
		<select id="selecao" name="ministerio" class="form-control"  aria-label=".form-select-lg example"> 
		<option >-Selecionar Ministerio-</option>
		@foreach($ministerio as $ministerios)
		
		<option value={{$ministerios->sigla}}>{{$ministerios->nome}}</option>
		
		@endforeach
		</select>
		@endisset		
		</div>
		<div class="form-group">
		<label>Instituição</label>
		<select id="insituto" name="insituto" class="form-control"  aria-label=".form-select-lg example"> 
		<div id="p">
		</div>	
		</select>
		</div>
		
		<div  class="form-group">
		<select name="tipoPeticao" class="form-control"  aria-label=".form-select-lg example"> 
		<option value="Sugestao">Sugestao</option>
		<option value="Exposicao">Exposicao</option>
		<option value="Denuncia">Denuncia</option>
		<option value="Reclamacao">Reclamacao</option>
		<option value="Queixa">Queixa</option>
		<option value="Requerimento">Requerimento</option>
			<textarea name="sugestao" value="{{old('sugestao')}}" rows="6" cols="50" class="form-control">
				
			</textarea>
		</div>
		<input type="submit" name="" value="Enviar" class="btn" >

</form>
</div>
</div>
</div>
@endsection
<script src="{{asset('js/jquery-3.6.0.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/validate.js')}}" type="text/javascript" async="true" defer></script>
<script src="{{asset('js/jquery-ui.js')}}" type="text/javascript" async="true" defer></script>
<script src="{{asset('js/jquery.form.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/select.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/ajax.js')}}" type="text/javascript" async="true" defer></script>
<script  type="text/javascript" >




var path="{{('autocomplete')}}";
var resi="{{('residenciaAutocomplete')}}";
var na="{{('nacaoAutocomplete')}}";


$('#Instituicao').typeahead({
	source: function(terms,process){
return $.get(path,(terms:terms), function(data){


	return process(data);
})
	}

});

$('#Residencia').typeahead({
	source: function(terms,process){
return $.get(resi,(terms:terms), function(data){


	return process(data);
}),
	}

});

$('#Nacionalidade').typeahead({
	source: function(terms,process){
return $.get(na,(terms:terms), function(data){


	return process(data);
})
	}

});














</script>
