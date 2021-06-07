<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class notificaoController extends Controller
{
    
  public function notification(Request $request){
    if(Auth::check()){
    $notifications=$request->user()->notifications;
    
    return response()->json(compact('notifications'));
    }
  }

}
