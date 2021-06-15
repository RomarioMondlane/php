
$(document).ready(function(){

    $.ajax({
      url:"select",
      type:"get",
      beforeSend:function(xhr){
            var token=$('meta[name="csrf_token"]').attr('content');
            if(token){
    
                return xhr.setRequestHeader('X-CSRF-TOKEN',token);
            }
    
    
      },
      data: $(this).serialize(),
      dataType: 'json',
      success: function(response){
          
        $.each(response, function(key,object){
          document.getElementById("selecao").innerHTML += `
        
              <option value="${object.sigla}">${object.nome}</option>
        
          `
          
        });
        
      },
      error: function(response){
      
    
      }
    
    
    });
    }
    );
    $(document).ready(function(){

      $.ajax({
        url:"selectIns",
        type:"get",
        beforeSend:function(xhr){
              var token=$('meta[name="csrf_token"]').attr('content');
              if(token){
      
                  return xhr.setRequestHeader('X-CSRF-TOKEN',token);
              }
      
      
        },
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response){
            
          $.each(response, function(key,object){
            document.getElementById("selecionar").innerHTML += `
          
                <option value="${object.nome}">${object.nome}</option>
          
            `
            
          });
          
        },
        error: function(response){
        
      
        }
      
      
      });
      }
      );
    