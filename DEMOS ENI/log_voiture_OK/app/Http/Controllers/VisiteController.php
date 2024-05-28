<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visite;
use App\Voiture;
use App\Chauffeur;
use Carbon\Carbon;

use App\Http\Requests;

class VisiteController extends Controller
{
	public function list()
	{
		$visites = Visite::get();
		$datedef1 = Carbon::now();
		$datedef2 = Carbon::now();
		$text = '';
		$pilote = Chauffeur::all();
    	return view('visites-liste', ['tsidika' => $visites,'text'=> $text,'default1' => $datedef1,'default2' => $datedef2]);
	}

	public function check(Request $request)
	{
		$from = $request->input('dateto');
		$to = $request->input('datefrom').' 23:59:59';
		$visites = Visite::whereBetween('dateheure', [$from, $to])->where('mouvement','E')->get();
		$datedef1 = $from;
		$datedef2 = $to;
		$nbVisites = count(Visite::whereBetween('dateheure',[$from,$to])->where('mouvement','E')->get());
		$text = ' : '.$nbVisites;
		

    	return view('visites-liste', ['tsidika' => $visites,'text'=> $text,'default1' => $datedef1,'default2' => $datedef2]);
		
	}


	public function show($id)
	{
		$visite = Visite::where('id', $id)->first();
		return view('visite-voir',['tsidika' => $visite]);
	}


	public function edit($id)
	{
		$visite = Visite::where('id', $id)->first();
		$pilotes = Chauffeur::get();
		$pilote = Chauffeur::where('id', ($visite->chauffeur_id))->first();
    	return view('visite-modification', ['tsidika' => $visite, 'pilotes' => $pilotes, 'pilote' => $pilote]);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
	        'chauffeur_id' => 'required|max:100|min:1',
	    ]);

		$input = $request->all(); 
		$voiture = Voiture::findOrFail($id);
		$visite = Visite::findOrFail($id); 
		// if ($visite == null)
		// {
		// 	return view('we-are-rip');
		// }

		$voiture->update($input);
		$visite->update($input);

    	return view('visite-voir', ['tsidika' => $visite])->withSuccess(['Success Message here!']); 
	}

	public function delete($id)
	{
		Visite::findOrFail($id)->delete();

		$visites = Visite::get();
    	return view('visites-liste', ['tsidika' => $visites]);
	}
}
