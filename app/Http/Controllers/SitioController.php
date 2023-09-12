<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class SitioController extends Controller
{
    public function contactoForm($tipo = null){
        //existe $tipo
        //return view('contacto') -> with(['tipo' => $tipo]);
        return view('contacto', compact('tipo'));
    }

    public function contactoStore(Request $request){
        $request -> validate([
            'email' => 'required|email|unique:App\Models\Contacto',
            'comentario' => ['required', 'min:5', 'max:50']
        ]);
    
        $contacto = new Contacto();
        $contacto->email = $request->email;
        $contacto->comentario = $request->comentario;
        $contacto->save();

        return redirect() -> back();
    }
}
