<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class selectController extends Controller
{
    public function combox(){
        $Requerente=DB::table('ministerios')->get();
      //  return view('requerente',['select'=>$Requerente]);  
     
      return json_encode($Requerente); 
    }
}
