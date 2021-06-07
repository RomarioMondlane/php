
function validar(){

  var inputs = {
    nome: /^[\w\s]+$/,
    telefone: /^[\d\s]+$/,
    email: /^[^@]+@[^@]+\.[^@]+/
  };
  
  
  $("form input").on("change", function() {
    var tipo = this.name;
    var regex = inputs[tipo];
  
    if (this.value.match(regex)) alert('O campo ' + tipo + ' está válido!');
    else alert('O campo ' + tipo + ' está inválido!')
  });



}
