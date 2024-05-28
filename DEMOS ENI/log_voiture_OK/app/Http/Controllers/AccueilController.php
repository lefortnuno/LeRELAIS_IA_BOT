<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Visite;
use App\Voiture;
use App\Chauffeur;
use App\Http\Requests;

class AccueilController extends Controller
{
	public function listAccueil()
	{
		$visites = Visite::orderBy('id', 'DESC')->get();
		$voitures = Voiture::where('etat', 'E')->orderBy('id', 'DESC')->get();
		$floattes = Voiture::where('entreprise', 'relais')->Where('etat', 'E')->get();
    	return view('welcome', ['tsidika' => $visites, 'bolide' => $voitures, 'floatte' => $floattes]);
	}
}
