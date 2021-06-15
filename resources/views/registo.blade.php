@extends('admin')

@section('main-content')
<meta name="csrf-token" content="{{csrf_token()}}"/>
<link href="{{asset('estilo.css')}}" rel="stylesheet">
<style rel="stylesheet">
h6{
		color:red;

}
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
<div id="a">
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
	</form>		
</div>
</div>
      <div class="card">
            <div class="card-header" style="background-color: yellowgreen"><b >Criar Ministério</b></div>
                <div class="card-body">
                    <div class="centalizar">    

	                    <form name="CriarMini" >
		              @csrf
		
	 	                      <div class="form-group">
		                      <label>Nome</label>
		                      <input class="form-control" type="text" id="nome" name="nome" value="{{old('nome')}}">
		
		                      <label>Sigla</label>
		                      <input class="form-control" type="text" class="form-control" name="sigla" id="sigla"  value="{{old('sigla')}}" >
		                      <input type="submit" name="" value="Cadastrar" class="btn" >
		
		                      </div>
	                    </form>			
                    </div>
                    </div>                
<div class="card">
    <div class="card-header" style="background-color: yellowgreen"><b >Criar Instituição</b></div>
    <div class="card-body">
<div class="centalizar">    

	<form name="CriarInst" >
		@csrf
		
	 	<div class="form-group">
		<label>Nome</label>
		<input class="form-control" type="text" id="nome" name="nome" value="{{old('nome')}}">
		
		<label>ID_Ministerio</label>
		<input class="form-control" type="text" class="form-control" name="id_mini" id="id_mini"  value="{{old('id_mini')}}" >
		<input type="submit" name="" value="Cadastrar" class="btn" >
		
		</div>
	</form>			
</div>
</div>
</div>
</div>

</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/validate.js')}}" type="text/javascript" async="true" defer></script>
<script src="{{asset('js/jquery-ui.js')}}" type="text/javascript" async="true" defer></script>
<script src="{{asset('js/jquery.form.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/ajax.js')}}" type="text/javascript" async="true" defer></script>
<script  type="text/javascript" >

$(function(){
  $('form[name="CriarUsuer"]').submit(function(event){

  event.preventDefault();
  
  
  $.ajax({
    url:"criar",
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
       Swal.fire({


          title:'Aviso',
          text:response,
          icon:'Success',
          confirmButtonText:'OK'
          

      })},
    
    error: function(){

      Swal.fire({
        title:'Aviso',
        text:'Erro ao enviar! Provavelmente o email ja foi registado',
        icon:'error',
        confirmButtonText:'OK'
    })

    }

  });
  }
  )

});
$(function(){
  $('form[name="CriarInst"]').submit(function(event){

  event.preventDefault();
  
  $.ajax({
    url:"criarInst",
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
       Swal.fire({


          title:'Aviso',
          text:response,
          icon:'Success',
          confirmButtonText:'OK'
          

      })},
    
    error: function(){

      Swal.fire({
        title:'Aviso',
        text:'Erro ao criar',
        icon:'error',
        confirmButtonText:'OK'
    })

    }

  });
  }
  )

});

$(function(){
  $('form[name="CriarMini"]').submit(function(event){

  event.preventDefault();
  
  
  $.ajax({
    url:"criarMini",
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
       Swal.fire({


          title:'Aviso',
          text:response,
          icon:'Success',
          confirmButtonText:'OK'
          

      })},
    
    error: function(){

      Swal.fire({
        title:'Aviso',
        text:'Erro ao Cadastrar',
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