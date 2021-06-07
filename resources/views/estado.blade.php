@extends('comunidade')
@section('main-content')
<link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('estilo.css')}}" rel="stylesheet">
<meta name="csrf-token" content="{{csrf_token()}}"/>
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

<body>
<div class="centalizar">

<div class="card">
    <div class="card-header" style=" background-color: yellowgreen"><h3>Minhas Peticoes</h3></div>
    <div class="card-title breadcrumb titulo titulo-for-mobile" style="text-align:center"><h4  >Estado da Peticao</h4>
    </div>
    <div class="card-body">
    
  <div class="input-group rounded">
      <form  name="formulario" class="pesquisa">
     @csrf
  <input name="pesquisa" value="{{csrf_token()}}" id="pesquisa" type="number" class="form-control rounded" placeholder="Search" aria-label="Search"
    aria-describedby="search-addon" >
  <button type="submit"  id="btn" ><span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span></button>
  </form>
  </div>
</div>
<div class="centalizar">

<div id="preencher">

</div>  
  </div>    
  </div>    

</div>
</div>
</div>




<script src="{{asset('js/ajax.js')}}" type="text/javascript" async="true" defer></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('js/jquery.form.min.js')}}" type="text/javascript" ></script>



@endsection



</body>
