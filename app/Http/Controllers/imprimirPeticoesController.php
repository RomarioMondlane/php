<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class imprimirPeticoesController extends Controller
{
 
 
    public function imprimir(){
        if(Auth::check()){

        $email=Auth::user()->email;
        list($nome,$descricao)=explode("@",$email);
        list($mini,$co)=explode(".",$descricao);

        $Requerente=DB::table('requerentes')->where('Ministerio','=',$mini)->get();
        
        
        return PDF::loadVIEW('lista', compact('Requerente'))->setPaper('a4','landscape')
        ->stream();
        
        //download('relatorio.pdf');

        }}
 
 
}
