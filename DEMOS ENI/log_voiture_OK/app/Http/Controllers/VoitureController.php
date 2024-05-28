<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voiture;
use App\Visite;
use App\Chauffeur;
use Carbon\Carbon;

use App\Http\Requests;

class VoitureController extends Controller
{
	public function list()
	{
		$voitures = Voiture::get();
		$titrement = '';
    	return view('voitures-liste', ['titrement' => $titrement, 'bolide' => $voitures]);
	}

	public function listParking()
	{
		$voitures = Voiture::where('etat', 'E')->get();
		$titrement = 'au Parking';
		$text = '';
    	return view('voitures-liste', ['titrement' => $titrement, 'bolide' => $voitures]);
	}

	public function listDispo()
	{
		$voitures = Voiture::where('entreprise', 'relais')->Where('etat', 'E')->get();
		$titrement = 'disponible au Relais';
		$text = '';
    	return view('voitures-liste', ['titrement' => $titrement, 'bolide' => $voitures]);
	}
	
	public function listDeRelais()
	{
		$voitures = Voiture::where('entreprise', 'relais')->get();
		$titrement = 'appartenant au Relais';
		$text = '';
    	return view('voitures-liste', ['titrement' => $titrement, 'bolide' => $voitures]);
	}

	public function show($id)
	{
		$voiture = Voiture::where('id', $id)->first();
		$nbr_visite = count(Visite::where('voiture_id', $voiture->id)->where('mouvement','E')->get());

		return view('voiture-voir', ['nbrvisite' => $nbr_visite, 'bolide' => $voiture]);
	}

	public function edit($id){
		$voiture = Voiture::where('id', $id)->first();

		$pilotes = Chauffeur::get();
		$pilote = Chauffeur::where('id', ($voiture->chauffeur_id))->first();

		return view('voiture-modification', ['bolide' => $voiture, 'pilotes' => $pilotes, 'pilote' => $pilote]);
	}

	public function update(Request $request, $id)
	{
		
		$this->validate($request, [
	        'entreprise' => 'required|max:20|min:3',
	        'chauffeur_id' => 'required|max:100|min:1',
	        // 'commentaire' => 'required|max:20|min:3',
	        // 'etat' => 'required|max:20|min:3',
	    ]);

		$input = $request->all();
		$voiture = Voiture::findOrFail($id);
		$visite = Visite::findOrFail($id); 

		// if($voiture == null)
		// {
		// 	return view('we-are-rip');
		// }

		$voiture->update($input);
		$visite->update($input);

		$nbr_visite = count(Visite::where('voiture_id', $voiture->id)->where('mouvement','E')->get());

		return view('voiture-voir', ['nbrvisite' => $nbr_visite, 'bolide' => $voiture])->withSuccess(['Success Message here!']); 
		//ca marche pas du tout
	}

	public function delete($id)
	{
		Voiture::findOrFail($id)->delete();
		$titrement = '';
		$voitures = Voiture::get();
    	return view('voitures-liste', ['titrement' => $titrement, 'bolide' => $voitures]);

	}
}
