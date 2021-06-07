<?php

namespace App\Http\Controllers;
use App\Models\models\requerente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;
use Response;

class EstadoController extends Controller
{   
        public function actualizar(Request $request, $id){
       // dd($request->input('estado'));
        $peticao=requerente::find($id);
        //  dd($peticao);
       $estado= $request->input('estado');
        if($peticao){

            $peticao->Estado=$estado;
            $peticao->save();
        
        }

        return redirect('actualizar');
    }


    public function ver(Request $request){
        //Permission::create(['name'=>'estado']);
        
            $codigo=$request->input('pesquisa');
        $peticao=requerente::find($codigo);
            
        if($peticao){
            
            $estado=DB::table('requerentes')->where('id','=',$codigo)->get();
        
        }
        //dd(Response::json($estado));
        
        //return response()->json($estado);
        //$visao= view('estado',compact('requerente'))->render();
        return json_encode($estado);
       //return Response::json($estado);
        //return view('estado',['estado'=>$Requerente]);  
        //return json($estado);

    
        }
        
}
