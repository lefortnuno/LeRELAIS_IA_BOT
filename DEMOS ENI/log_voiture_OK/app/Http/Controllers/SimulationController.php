<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Simulation;
use App\Visite;
use App\Voiture;
use Carbon\Carbon;
use App\Http\Requests;
Use Response;

class SimulationController extends Controller
{
    public function create()
    {

        // return view('FormulaireSimulation');
		return response()->json(['name' => '_token', 'value' => csrf_token() ]);
    }

    public function store(Request $request)
	{
		//Validation
		//if (!$request->input('numero'))
		//{
		//	return redirect()->back();
		//}

		$this->validate($request, [
	        'numero' => 'required|max:10|min:4',
	        'mouvement' => 'required|max:1|min:1',
	    ]);



		$voiture = Voiture::where('numero',$request->input('numero'))->first();
		if ($voiture == False)
		{
			$voiture = new Voiture();
			$voiture->numero = $request->input('numero');
			$voiture->etat = $request->input('mouvement'); //E
			$voiture->chauffeur_id = 1;
			$voiture->save();
		}else
		{
			if ($voiture->etat == $request->input('mouvement'))
			{
				//nothing to do
				return response()->json(['Enregistrement' => 'NO! ECHOUER!', 'numero' => $voiture->numero, 'mouvement' => $voiture->etat]);
			}else
			{
				$voiture->etat = $request->input('mouvement');
				$voiture->update();
			}			
		}


		$info = new Visite();
		$info->dateheure = Carbon::now();
		$info->mouvement = $request->input('mouvement');
		$info->voiture_id = $voiture->id;
		$info->chauffeur_id = 1;
		$info->save();
    	// return redirect()->back()->with('message','Enregistrement Reussit !');
		return response()->json(['Enregistrement' => 'OK! REUSSI!', 'numero' => $voiture->numero, 'mouvement' => $voiture->etat]);
	}
}
