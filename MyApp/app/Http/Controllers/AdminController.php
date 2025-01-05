<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::where('isAdmin','!=',true)->get();
        return view('admin.index');
    }

    public function showAfficher()
    {
        // $user = User::where('isAdmin', '!=', true)->get();
        // Récupérer les rendmenets ici
        return view('admin.Afficher', compact('user', 'rendmenets'));
    }
    


    public function Afficher()
    {
        //
        $rendmenets = \App\Models\Rendmenet::all();
        $user = User::where('isAdmin','!=',true)->get();
        return view('admin.Afficher',['user' => $user,'rendmenets' => $rendmenets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     // return view('admin.create');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'affectation_id' => [ 'string']
            
        ]);
        $rendmenetParts = explode(' - ', $request->affectation_id);
            $nom = $rendmenetParts[0];
            $groupe = substr($nom, 0, 2); // A1, A2, ou A3
            
            $affectation = \App\Models\Rendmenet::firstOrCreate(
                ['nom' => $nom],
                ['groupe' => $groupe]
            );
          
            $user = new User();
            $user->name = $request->name;
            $user->Prenom = $request->Prenom;
            $user->dateNaissance = $request->dateNaissance;
            $user->telephone = $request->telephone;
            $user->annexe = $request->annexe;
            $user->email = $request->email;
            $user->affectation_id = $affectation->id; // Utiliser l'ID du rendmenet trouvé ou créé
            $user->password = Hash::make($request->name);
            $user->save();
        
            return redirect()->back()->with('succes', 'Utilisateur ajouté avec succès');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id) {
        // $user = User::find($id);  // Remplacez User par votre modèle réel
        // return response()->json($user);

    //     $admin = Admin::findOrFail($id);
    //     return view('admin.edit', compact('admin'));
    // }
//     public function edit($id)
// {
//     $user = User::find($id);
//     if ($user) {
//         return response()->json($user);
//     } else {
//         return response()->json(['error' => 'Utilisateur non trouvé'], 404);
//     }
// }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user'));
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

    return redirect('/admin')->with('success', 'Contact mis à jour avec succès');
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
        $user = User::findOrFail($id);
        $user -> delete();
        return redirect('/admin')->with('success', 'user supprime avec succès');
    }
}
