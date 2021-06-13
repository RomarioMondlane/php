@extends('lay')

@section('main-content')

<style rel="stylesheet">
.pesquisa{
	display:flex;


}
#btn{
	border:none;

}
#pesquisa{

	border-top-right-radius:0px !important;
	border-bottom-right-radius:0px !important;
}

</style>
<div class="input-group rounded">
  
<form  name="peticao" class="pesquisa">

     @csrf
  <input name="pesquisa" value="" id="pes" type="text" class="form-control rounded" placeholder="Search" aria-label="Search"
    aria-describedby="search-addon" >
 
  <button type="submit" id="btn"   ><span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span></button>
  </form>

</div>
<ui></ui>
<div class="card-header" style="background-color: yellowgreen"><b>Lista de Petições  recebidas</b></div>
    <div id="mini">
<div  >
	<table class="table " >
		<thead class="thead-dark">
		
			<tr>
			<th scope="col">Código </th>
				<th scope="col">Nome</th>
							
				<th scope="col">Instituição</th>				
				<th scope="col">Petição</th>
				<th scope="col">Conteúdo</th>
				<th scope="col">DatadeEnvio</th>
				<th scope="col">Estado</th>
				<th scope="col">Ação</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		
			@foreach( $ministerio as $requerente  )
		<tr>
		<td >{{$requerente->id}}</td>
			<td>{{$requerente->nome}}</td>
			<td>{{$requerente->Instituicao}}</td>
				
			<td>{{$requerente->tipoPeticao}}</td>
			<td>{{$requerente->sugestao}}</td>
			<td>{{$requerente->DatadeEnvio}}</td>
			<td>{{$requerente->Estado}}</td>
		<p id="codigo">	<td><a href="{{url('imprimir', ['id'=>$requerente->id])}}" ></p>
			<i class="bi bi-printer" ></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
</svg></td>



		</tr>
		 @endforeach

			</tbody>





		</thead>
		


	</table>


</div></div>
@endsection


<script src="{{asset('js/jquery-3.6.0.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/jquery.form.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/Pesquisa.js')}}" type="text/javascript" async="true" defer></script>
