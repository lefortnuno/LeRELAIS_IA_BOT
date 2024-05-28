<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chauffeur;
use App\Voiture;
use App\Visite;

use App\Http\Requests;

class ChauffeurController extends Controller
{
	public function list()
	{
		$chauffeurs = Chauffeur::get();

		if (count($chauffeurs) == 0)
		{
			$chauffeur = new Chauffeur();
			$chauffeur->nom = 'Inconnu';
			$chauffeur->save();
			$chauffeurs[] = $chauffeur;
		}
    	return view('chauffeurs-liste', ['pilote' => $chauffeurs]);
	}

	public function show($id)
	{
		$chauffeur = Chauffeur::where('id', $id)->first();

    	return view('chauffeur-voir', ['pilote' => $chauffeur]);
	}

	public function create()
	{
		
    	return view('chauffeur-creation');
	}

	public function store(Request $request)
	{
		if (!$request->input('nom'))
		{
			return redirect()->back()->withInput();
		}
		if (!$request->input('prenom'))
		{
			return redirect()->back();
		}
		$input = $request->all();
		$chauffeur = Chauffeur::create($input);

    	return view('chauffeur-voir', ['pilote' => $chauffeur]);
	}

	public function edit($id)
	{
		$chauffeur = Chauffeur::where('id', $id)->first();
		if( !$chauffeur )
		{
			return view('we-are-rip');
		}		
		
    	return view('chauffeur-modification', ['pilote' => $chauffeur]);
	}

	public function update(Request $request, $id)
	{
		if (!$request->input('nom'))
		{
			return redirect()->back()->withInput();
		}
		if (!$request->input('prenom'))
		{
			return redirect()->back();
		}

		$input = $request->all(); // Recupere les posts 
		$chauffeur = Chauffeur::findOrFail($id); //Cherche dans la base l'id du chauffeur
		if ($chauffeur == null)
		{
			return view('we-are-rip');
		}

		$chauffeur->update($input);

    	return view('chauffeur-voir', ['pilote' => $chauffeur]);
	}

	public function delete($id)
	{
		$chauffeur1 = Chauffeur::find($id);

		$chercheVo = Voiture::where('chauffeur_id',$chauffeur1->id);
		if (!$chercheVo){
			$chauffeur1->delete();
		}
		else{
			$chercheVo->update(['entreprise'=>'inconnu']);
			$chercheVo->update(['chauffeur_id'=>1]);	
			$chauffeur1->delete();
		}

		$chercheVi = Visite::where('chauffeur_id',$chauffeur1->id);
		if (!$chercheVi){
			$chauffeur1->delete();
		}
		else{
			$chercheVi->update(['chauffeur_id'=>1]);	
			$chauffeur1->delete();
		}


		$chauffeurs = Chauffeur::get();
    	return view('chauffeurs-liste', ['pilote' => $chauffeurs]);
	}

}

