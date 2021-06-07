<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class ImprimirController extends Controller
{
    


    public function imprimir($id){
        if(Auth::check()){

        $Requerente=DB::table('requerentes')->where('id','=',$id)->get();
        
        
        return PDF::loadVIEW('relatorio', compact('Requerente'))->setPaper('a4','landscape')
        ->stream();
        
        //download('relatorio.pdf');

    }}
}
