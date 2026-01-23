<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    public function formulaire()
    {
        $id = null;
        return view('form', compact('id'));
    }

    public function listeStagiaire()
    {
        $Stagiaires = Stagiaire::all();
        return view('liste')->with('Stagiaires', $Stagiaires);
    }


    public function addStagiaire(request $request)
    {
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
        );
        $stagiaire = new Stagiaire();
        $stagiaire->nom = $request->nom;
        $stagiaire->prenom = $request->prenom;
        $stagiaire->email = $request->email;
        $stagiaire->telephone = $request->telephone;
        $stagiaire->filiere = $request->filiere;
        $stagiaire->date_debut_stage = $request->date_debut_stage;
        $stagiaire->date_fin_stage = $request->date_fin_stage;

        if ($stagiaire->save()) {
            return redirect()->route('stagiaire.liste')->with('msg', 'Ajouté avec success');
        } else {
            return 'error d\'ajout';
        }
    }

    public function deleteStagiaire($id)
    {
        $Stagiaire = Stagiaire::find($id);
        if ($Stagiaire->delete()) {
            return redirect(route('stagiaire.liste'))->with('msg', 'hetha stagiaire w rt7na mino');
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
        return view('form', compact('stagiaire', 'id'));
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
        return redirect()->route('stagiaire.liste')->with('msg', 'Stagiaire mis à jour avec succès');
    }

    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('liste', compact('stagiaires'));
    }


}
