<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\models\requerente;
use App\Models\models\ministerio;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use routes\web;
class HomeController extends Controller
{
    use HasFactory;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // Role::create(['name'=>'acao']);
       // Permission::create(['name'=>'opcoes']);
        
        $email=Auth::user()->email;

        list($nome,$descricao)=explode("@",$email);
        list($mini,$co)=explode(".",$descricao);
               

       // auth()->user()->givePermissionTo('publicar');

       
        if(Auth::check()){
            if($mini=="admin"){
            
                return view('admin');
        
                }else{
            $Requerente=DB::table('requerentes')->where('Ministerio','=',$mini)->get();                    
       
            auth()->user()->givePermissionTo('opcoes');
       


            return view('ministerio',['ministerio'=>$Requerente]);

                }
        }
    
    	

    }
   
    public function actualizar(){

        if(Auth::check()){
            
        $email=Auth::user()->email;

        list($nome,$descricao)=explode("@",$email);
        list($mini,$co)=explode(".",$descricao);
              
       // auth()->user()->givePermissionTo('publicar');

       $Requerente=DB::table('requerentes')->where('Ministerio','=',$mini)->get();
        return view('actualizar',['ministerio'=>$Requerente]);   
        }else{
            return view('lay');


        }

    }

    public function autocomplete(){

        
      $N=requerente::select("nome")->get();
      return response()->json($N);
     //   dd($N);
    }

    public function procurar(Request $request){
        $codigo=$request->input('pesquisa');
        $peticao=requerente::find($codigo);
        
        if($peticao){
        
        if(Auth::check()){
            $email=Auth::user()->email;

            list($nome,$descricao)=explode("@",$email);
            list($mini,$co)=explode(".",$descricao);
         
       
            $estado=DB::table('requerentes')->where('id','=',$codigo)->where('Ministerio','=',$mini)->get();
        
         
            return json_encode($estado);  
        }else{
            return view('lay');


        }}else{
            return json_encode("O codigo nao existe");

        }

    }

public function ver(Request $request){
    $codigo=$request->input('pesquisa');
        $peticao=requerente::find($codigo);
        
        if($peticao){
        
        if(Auth::check()){
            $email=Auth::user()->email;

            list($nome,$descricao)=explode("@",$email);
            list($mini,$co)=explode(".",$descricao);
             
            $estado=DB::table('requerentes')->where('id','=',$codigo)->where('Ministerio','=',$mini)->get();
        
        }
       
        return json_encode($estado);

}else{
    return json("O codigo nao existe");
}   

}

public function listar(){

    if(Auth::check()){

        $user=DB::table('users')->get();
        $mini=DB::table('ministerios')->get();
        $inst=DB::table('instituicaos')->get();
        
        return view('usuarios',['user'=>$user,'ministerio'=>$mini,'inst'=>$inst]);
    }


}
public function apagar($codigo){

    if(Auth::check()){
        $user=DB::table('users')->where('id','=',$codigo)->delete();
        
        return redirect()->back();
    }


}
public function apagarm($codigo){

    if(Auth::check()){
        $user=DB::table('ministerios')->where('id','=',$codigo)->delete();
        
        return redirect()->back();
    }


}

public function apagarI($codigo){

    if(Auth::check()){
        $user=DB::table('instituicaos')->where('id','=',$codigo)->delete();
        
        return redirect()->back();
    }


}
public function criar(Request $request){

    $pass=Hash::make($request->input('senha'));
    
    $user = new User();
    $user->name = $request->input('nome');
    $user->email=$request->input('email');
    $user->password=$pass;
    $user->save();   
    
    return json_encode("Cadatrado com sucesso");

}

public function criarM(Request $request){

    $mini = new Ministerio();
    $mini->nome = $request->input('nome');
    $mini->sigla=$request->input('sigla');
  
    $mini->save();   
    
    return json_encode("Criado com sucesso");

}

}
