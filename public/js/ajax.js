
$.ajaxSetup({
    Headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')


    }



});



$(function(){
    $('form[name="formulario"]').submit(function(event){

    event.preventDefault();
  //   alert("ola");
 
   // var p=$(this).find('input#pesquisa').val();
    //alert(p);
    $.ajax({
      url:"pesquisar",
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
          document.getElementById("preencher").innerHTML = `   
          <p ><b>Data de Submissao:</b>${object.DatadeEnvio}</p>
          <p><b>Requerente:</b>${object.nome}</p>
          <p><b>Tipo de Peticao:</b>${object.tipoPeticao}</p>
          <p><b>Estado:</b>${object.Estado}</p>  
          
          
          
          
          `
          
        });
            
        //$("#preencher").html(response);
      //return response;
      },
      error: function(response){
        //alert(response);
        console.log(response);
        document.getElementById("preencher").innerHTML = `   
       <p ><b>Codigo nao existe</b></p>
        
        
              
        `
       



      }



    });
    



    }
    )



});



$("#envio").validate({
	errorElement: 'h6',
	rules:{
		nome:"required",
		BI:"required", length:13,
		Nacionalidade:"required",
		Residencia:"required",minlength:5, 
		tel:"required",
		sugestao:"required",

	},
	messages:{
		nome:"Campo obrigatorio",
		BI:"Formato invalido",
		Nacionalidade:"Campo obrigatorio",
		Residencia:"Campo obrigatorio", 
		tel:"Formato invalido",
		sugestao:"Campo obrigatorio",



	}

});
  
$("#cad").validate({
	errorElement: 'h6',
	rules:{
		nome:{required:true},
		email:{required:true,
      email:true}, 
		senha:{required:true, rangelength:[6-10]},
		confSenha:{required:true,equalTo:"#senha"} 
		
	},
	messages:{
		nome:"Campo obrigatorio",
		email:"Campo Obrigatorio ou formato invalido",
		senha:"A deve conter 6 a 10 caracteres",
    confSenha:"A confirmacao e diferente de senha acima"


	}

});





$(function(){
    $('form[name="requisicao"]').submit(function(event){
    //  console.log(document.getElementById("nome"));        
  
event.preventDefault();
    $.ajax({
      url:"store",
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
          text:'Enviado com sucesso',
          icon:'Success',
          confirmButtonText:'OK'
          

      })},

      error: function(response){
       
        Swal.fire({
          title:'Aviso',
          text:'Erro ao enviar',
          icon:'error',
          confirmButtonText:'OK'
          

      })

      }



    });
    



    }
    )



});



$(function(){
  $('form[name="peticao"]').submit(function(event){
  event.preventDefault();
  $.ajax({
    url:"pesqui",
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
        document.getElementById("mini").innerHTML = `   
        <div class="tabela" >
	<table class="table ">
		<thead class="thead-dark">
		
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
		
		<tr>
			<td>${object.nome}</td>
			<td>${object.BI}</td>
			<td>${object.Nacionalidade}</td>
			<td>${object.Residencia}</td>
			<td>${object.Instituicao}</td>
				
			<td>${object.tipoPeticao}</td>
			<td>${object.sugestao}</td>
			<td>${object.DatadeEnvio}</td>
			<td><a href="/imprimir/${object.id}">
			<i class="bi bi-printer" ></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
</svg></td>

		</tr>
	
			</tbody>





		</thead>
		


	</table>

        
        
        `
        
      });
          
      //$("#preencher").html(response);
    //return response;
    },
    error: function(response){
      console.log(response);
    
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
