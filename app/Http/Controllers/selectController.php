<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\instituicao;
use App\Models\ministerio;

class selectController extends Controller
{
    public function combox(){
       $mini=DB::table('ministerios')->orderBy('nome','ASC')->get();
       $inst=DB::table('instituicaos')->where('id','=',0)->get();
       return view('requerente',['ministerio'=>$mini,'inst'=>$inst]);
    }



    public function comboxInst(){
      $Requerente=DB::table('instituicaos')->get();
     
    return json_encode($Requerente); 
  }
    public function criarInstituicao(Request $request){

      $instituicao = new instituicao();
      $instituicao->nome = $request->input('nome');
      $instituicao->id_ministerio=$request->input('id_mini');
      $instituicao->save();
      return json_encode("Criado com sucesso");
      }

    public function carregar($nome){
     
     $queryy="Select id from ministerios where sigla='$nome'";
     $codigo=DB::select($queryy);
     
        foreach($codigo as $c){
          
        $sql="Select nome from instituicaos where id_ministerio ='$c->id'";
        $sql=$sql."order by nome";
        $funcao=DB::select($sql);
        }
        
     //  return view('requerenteAjax',['instituicao'=>$funcao]);
      echo   json_encode($funcao);
      
    
    }
}
