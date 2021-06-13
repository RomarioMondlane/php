<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\models\requerente;
use App\HTTP\Requests\StoreRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use routes\web;
use App\Notifications\NotificationsClass;
use Illuminate\Notifications\Notification;

class RequerenteController extends Controller
{   




  public   function store(Request $request)
  {
    
    $contato="258".$request->input('tel');
                  
            $estado="PENDENTE";

            $requerente = new requerente();
            $requerente->nome = $request->input('nome');
            $requerente->BI=$request->input('BI');
            $requerente->Nacionalidade=$request->input('Nacionalidade');
            $requerente->Residencia=$request->input('Residencia');
            $requerente->tel=$contato;
            
            $requerente->Instituicao=$request->input('Instituicao');
            $requerente->Ministerio=$request->input('ministerio');
            $requerente->DatadeEnvio = now();
            $requerente->tipoPeticao=$request->input('tipoPeticao');
            $requerente->sugestao=$request->input('sugestao');
            $requerente->Estado=$estado;
            $requerente->save();
            //$this->Sms();
            $this->notificar();
            return json_encode("Enviado com sucesso");
         	
           
    }
    

    public function Sms(){

      $reque=DB::table('requerentes')->orderBy('id','DESC')->first();
      $co=$reque->Tel;
      
      $basic  = new \Vonage\Client\Credentials\Basic("f98a5cce", "jJGikOj5QIAAPpb4");
      $client = new \Vonage\Client($basic);
  
  
      $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS($co, 'Peticoes', 'Saudacoes Sr(a) '.$reque->nome.' a sua sua peticao foi sumbetida com sucesso. Use o codigo '.$reque->id.' para ver o andamento')
      );
      
      $message = $response->current();
      
  }

  public function notificar(){
  
  $ordem= DB::table('users')->orderBy('id','DESC')->first();
 
$limite=$ordem->id;

$cont=1;
 
while($cont<=$limite){
  $user=User::find($cont);

  if($user){
    User::find($cont)->notify(new NotificationsClass);
  
 }
 $cont=$cont+1;
}
}

public function marcarComoLida(){

  $ordem= DB::table('users')->orderBy('id','DESC')->first();
 
$limite=$ordem->id;

$cont=1;
 
 
while($cont<=$limite){
  $user=User::find($cont);
  if($user){
    $user->notifications()->delete();
   // $user->unreadNotifications->markAsRead();
  }
 $cont=$cont+1;
}

return redirect()->back();
}



    public function autocomplete(Request $request){

      $instituicao=requerente::select("Instituicao")->where("Instituicao","LIKE","%($request->Instituicao)")->get();
      return response()->json($instituicao);
    }
    public function ResidenciaAutocomplete(Request $request){

      $Re=requerentedados_autocompletes::select("Residencia")->where("Residencia","LIKE","%($request->Residencia)")->get();
      return response()->json($Re);
    }
    public function NacaoAutocomplete(Request $request){

      $Na=requerentedados_autocompletes::select("Nacionalidade")->where("Nacionalidade","LIKE","%($request->Residencia)")->get();
      return response()->json($Na);
    }

    
}
