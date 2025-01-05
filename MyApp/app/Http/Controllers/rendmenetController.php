<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rendmenetController extends Controller
{
    //
    public function create()
    {
        $rendmenets = \App\Models\Rendmenet::all(); // Récupère tous les rendmenets
        return view('admin.Afficher', compact('rendmenets'));
    }

    public function store(Request $request)
    {
        
        $user = new User();
        $user -> name = $request->name;
        $user -> Prenom = $request->Prenom;
        $user -> dateNaissance = $request->dateNaissance;
        $user -> telephone = $request->telephone;
        $user -> annexe = $request->annexe;
        $user -> email = $request->email;
        $user -> rendmenet_id = $request->rendmenet_id;
        $user -> password = $request->name;
        $user->save();

        return redirect()->back()->with('succes');
        }

}
