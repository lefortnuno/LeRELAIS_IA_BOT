<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    protected $fillable = ['nom', 'prenom'];

    public function visite()
	{
	    return $this->hasMany('App\Visite', 'chauffeur_id');
	}
    public function voiture()
	{
	    return $this->hasMany('App\Voiture', 'chauffeur_id');
	}
}
