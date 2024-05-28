<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    protected $fillable = ['chauffeur_id'];
    protected $dates = ['dateheure'];

    public function voiture()
    {
        return $this->belongsTo('App\Voiture');
    }
    public function chauffeur()
    {
        return $this->belongsTo('App\Chauffeur');
    }
}
