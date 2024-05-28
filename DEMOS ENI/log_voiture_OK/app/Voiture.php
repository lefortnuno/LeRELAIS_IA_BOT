<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    protected $fillable = ['numero', 'entreprise', 'etat','chauffeur_id', 'commentaire'];
	
    public function visite()
	{
	    return $this->hasMany('App\Visite', 'voiture_id');
	}
    public function chauffeur()
    {
        return $this->belongsTo('App\Chauffeur');
    }
}
