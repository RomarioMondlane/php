
@extends('lay')
@section('main-content')
  
  <title>
  Actualizar Peticoes
  </title>
  <link href="{{asset('estilo.css')}}" rel="stylesheet">
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



</head>


<body>
<div class="card">
    <div class="card-header" style="background-color: yellowgreen"><b >Actualizar Estado</b></div>
    <div class="card-body">
  
<div >

<div >
  
<form  name="pesquisar" class="pesquisa">
     @csrf
  <input name="pesquisa" value="{{csrf_token()}}" id="pesquisa"  type="number" class="form-control rounded" placeholder="Search" aria-label="Search"
    aria-describedby="search-addon" >
  <button type="submit" id="btn"   ><span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span></button>
  </form>
</div>

<div id="pr" >
  <table class="table">
      <thead class="thead-dark">
      
          <tr>
          
              <th scope="col">Código</th>
              <th scope="col">Nome</th>
              <th scope="col">Data de Envio</th>
              <th scope="col">Estado</th>
              <th scope="col">Definir Estado</th>
          </tr>
      </thead>
      <tbody>
      </tbody>
      
          @foreach( $ministerio as $requerente  )
      <div  >
      <tr>
      
          <td>{{$requerente->id}}</td>
          <td>{{$requerente->nome}}</td>
          <td>{{$requerente->DatadeEnvio}}</td>
          <td>
          <form name="estado" method="post" action="{{url('actu', ['id'=>$requerente->id])}}">
          @csrf
          <div class="form-group">
            <div style="width: 200px;font-size:small;">
          <select name="estado" class="form-control"  aria-label=".form-select-lg example" > 
		<option value="PENDENTE">PENDENTE</option>
		<option value="EM TRAMITAÇÃO">EM TRAMITAÇÃO</option>
		<option value="CONCLUIDO">CONCLUIDO</option>
</div>      
  </td>
        <td><button type="submit" class="btn btn-primary">
        Actualizar
        </button>
        </td>
         </div>

          </form>  
        


      </tr>
       @endforeach
       </div>
          </tbody>





      </thead>
      


  </table>

  


  </div></div>
</div>
</div>
</div>

<script src="{{asset('js/jquery-3.6.0.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/jquery.form.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/ajax.js')}}" type="text/javascript" async="true" defer></script>

<script language="javascript" type="text/javascript">
$(function(){
  $('form[name="pesquisar"]').submit(function(event){
  event.preventDefault();

  $.ajax({
    url:"pesquisaa",
    type:"post",
    beforeSend:function(xhr){
          var token=$('meta[name="csrf_token"]').attr('content');
          if(token){

              return xhr.setRequestHeader('X-CSRF-TOKEN',token);
          }
  

    },
    data: $(this).serialize(),
    dataType: 'json',
    success: function(response){
      //alert(response["nome"]);  
      $.each(response, function(key,object){
        document.getElementById("pr").innerHTML = ` 

        <table class="table ">
      <thead class="thead-dark">
      
          <tr>
          
              <th scope="col">Codigo</th>
              <th scope="col">Nome</th>
              <th scope="col">DatadeEnvio</th>
              <th scope="col">Definir Estado</th>
              <th scope="col">Estado</th>
          </tr>
      </thead>
      <tbody>
      </tbody>
  


        <tr>
      
          <td>${object.id}</td>
          <td>${object.nome}</td>
          <td>${object.DatadeEnvio}</td>
          <td>
          <form name="estado" method="post" href="/actu/${object.id}])}}">
          @csrf
          <div class="form-group">
            <div style="width: 200px;font-size:small;">
          <select name="estado" class="form-control"  aria-label=".form-select-lg example" > 
		<option value="PENDENTE">PENDENTE</option>
		<option value="EM TRAMITAÇÃO">EM TRAMITAÇÃO</option>
		<option value="CONCLUIDO">CONCLUIDO</option>
</div>      
  </td>
        <td><button type="submit" class="btn btn-primary">
        Actualizar
        </button>
        </td>
         </div>

          </form>  
        


      </tr>
        






        `
        
      });
          
      //$("#preencher").html(response);
    //return response;
    },
    error: function(response){
      //console.log("Codigo nao existe");
     // document.getElementById("preencher").innerHTML = `   
      //<p ><b>Codigo nao existe</b></p>
      
      
      
      
     // `
     Swal.fire({
      title:'Aviso',
      text:'Codigo nao encontrado',
      icon:'error',
      confirmButtonText:'OK'
      

  })



    }



  });
  



  }
  )



});
</script>
@endsection