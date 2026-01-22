<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    //
    public function formulaire()
    {

        return view('form');
    }

    public function listeStagiaire()
    {

        $Stagiaires = Stagiaire::all(); //njib tout les donnes mil base
        return view('liste')->with('Stagiaires', $Stagiaires); // ($Stagiaires c'est un tableau)
        // with..=> affiche $Stagiaires fil page liste(imchi lil liste w hez m3ak variable stagiaires ili fil donnes mta3 $stagiaires)
    }

    // b3d mnjib les doones il faut faire un affichage dans la page liste.blade.php

    public function addStagiaire(request $request)
    {
        // dd($request->all()) ;
        $request->validate(
            [
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'required|email',
                'telephone' => 'required',
                'filiere' => 'required',
                'date_debut_stage' => 'required|date',
                'date_fin_stage' => 'required|date|after:date_debut_stage'
            ]
        ); // le ne formulaire ne reste pas vide
        $c = new Stagiaire();
        $c->nom = $request->nom;
        $c->prenom = $request->prenom;
        $c->email = $request->email;
        $c->telephone = $request->telephone;
        $c->filiere = $request->filiere;
        $c->date_debut_stage = $request->date_debut_stage;
        $c->date_fin_stage = $request->date_fin_stage;

        if ($c->save()) {
            return redirect('/liste')->with('msg', 'ajouter avec success');
        } else {
            return 'error d\'ajout';
        }
    }

    public function deleteStagiaire($id)
    {

        $Stagiaire = Stagiaire::find($id);

        if ($Stagiaire->delete()) {
            return redirect(route('listeStagiaire'))->with('msg', 'hetha stagiaire w rt7na mino');
        } else {
            return 'error d\'ajout';
        }
    }

    public function edit($id = null)
    {
        $stagiaire = null;
        if ($id) {
            $stagiaire = Stagiaire::find($id);
            if (!$stagiaire)
                abort(404);
        }
        return view('form', compact('stagiaire', 'id')); //compact -> liste avec les donnees de stagiaire de la bdd
    }

    public function update(Request $request, $id = null)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'filiere' => 'required|string',
            'date_debut_stage' => 'required|date',
        ]);
        if ($id) {
            $stagiaire = Stagiaire::find($id);
            $stagiaire->update($data);
        } else {
            Stagiaire::create($data);
        }
        return redirect()->route('listeStagiaire')->with('msg', 'Stagiaire mis à jour avec succès');
    }

    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('liste', compact('stagiaires'));
    }


}
