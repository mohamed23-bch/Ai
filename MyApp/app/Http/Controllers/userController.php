<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function Afficher()
    // {
    //     //
    //     $user = User::where('isAdmin','!=',true)->get();
    //     return view('admin.Afficher',['user' => $user]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'Prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'digits:10'],
            'dateNaissance' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            
        ]);
        $user = new User();
        $user -> name = $request->name;
        $user -> Prenom = $request->Prenom;
        $user -> dateNaissance = $request->dateNaissance;
        $user -> telephone = $request->telephone;
        $user -> annexe = $request->annexe;
        $user -> email = $request->email;
        $user -> password = Hash::make($request->nom . '2021');
        $user->save();

        return redirect()->back()->with('succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // public function show($id)
    // {
    //     // $user = User::find($id);
    //     return view('user.index');
    // }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = User::find($id);
        // return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // Trouver l'utilisateur par son ID
        $user = User::findOrFail($id);
    
        // Valider les champs
        $validateData = $request->validate([
            'name' => ['string', 'max:255'],
            'Prenom' => ['string', 'max:255'],
            'telephone' => ['regex:/^[0-9]{10}$/'], // Vérifier que le téléphone est un nombre de 10 chiffres
            'dateNaissance' => ['date'],
            'email' => ['string', 'email', 'max:255', 'email'],
        ]);
    
        // Mettre à jour les données de l'utilisateur
        $user->update($validateData);
    
        return redirect('/user')->with('success', 'Contact mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
