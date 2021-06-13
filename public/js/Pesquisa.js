
var dados=[];
var data=['romario','Monjane'];


$(document).ready(function(){
  $.ajax({
    url:"autocompletar",
    type:"get",
    dataType: 'json',
    
    success: function(response){
      var i=0;
      $.each(response, function(key,object){
        if(!dados.includes(object.nome))
        {dados[i]=object.nome;

        }
                i=i+1;
      });
    console.log(dados);
      

    },
    error: function(response){
      console.log("erro");
    }    

});});

document.getElementById('pes').addEventListener('input',(e)=>
{
  let completar=[];
  
  if(e.target.value){
    completar=dados.filter(dados => dados.toLowerCase().includes(e.target.value));
    completar=completar.map(dados =>`<ui>${dados}</ui></hr></br>`);

}
ver(completar);


}


  );

function ver(completar){
    const html=!completar.length?'':completar.join('');
    document.querySelector('ui').innerHTML=html;



};