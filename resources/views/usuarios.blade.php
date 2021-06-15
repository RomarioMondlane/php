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




</style>

<div class="card">
    <div class="card-header" style="background-color:yellowgreen">Lista dos Usuários</div>
    <div class="card-body">
    <table class="table">
    <thead >
		
			<tr>
			<th scope="col"><b>Nome</b></th>
			<th scope="col"><b>E-mail</b></th>
			
			</tr>
		</thead>
        <tbody>
    @isset($user)
    @foreach( $user as $users  )
		<tr>
		<td>{{$users->name}}</td>
			<td>{{$users->email}}</td>
			<td><p id="codigo">	<td><a href="{{url('apagar', ['id'=>$users->id])}}" ></p>
			
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></td>
        </tr>
    @endforeach
    @endisset
    
        </tbody>
    
    </table>
    </div>
</div>
<div id="a" class="">
<div class="card">
    <div class="card-header" style="background-color:yellowgreen">Lista dos ministerios</div>
    <div class="card-body">
    <table class="table">
    <thead >
		
			<tr>
            
			<th scope="col"><b>Código</b></th>
			<th scope="col"><b>Nome</b></th>
			<th scope="col"><b>Sigla</b></th>
						</tr>
		</thead>
        <tbody>
    @isset($ministerio)
    @foreach( $ministerio as $ministerios  )
		<tr>
        <td>{{$ministerios->id}}</td>
		<td>{{$ministerios->nome}}</td>
			<td>{{$ministerios->sigla}}</td>
			<td><p id="codigo">	<td><a href="{{url('apagarm', ['id'=>$ministerios->id])}}" ></p>
			
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></td>
        </tr>
    @endforeach
    @endisset
    
        </tbody>
    
    </table>
    </div>
</div>
<div class="card">
    <div class="card-header" style="background-color:yellowgreen">Lista das Instituições</div>
    <div class="card-body">
    <table class="table">
    <thead >
		
			<tr>
			<th scope="col"><b>Nome</b></th>
			<th scope="col"><b>ID_Ministerio</b></th>
						</tr>
		</thead>
        <tbody>
    @isset($inst)
    @foreach( $inst as $insts  )
		<tr>
		<td>{{$insts->nome}}</td>
			<td>{{$insts->id_ministerio}}</td>
			<td><p id="codigo">	<td><a href="{{url('apagarI', ['id'=>$insts->id])}}" ></p>
			
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></td>
        </tr>
    @endforeach
    @endisset
    
        </tbody>
    
    </table>
    </div>
</div>

</div>




@endsection