<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    protected $fillable = ['titre','slug','sousTitre','description','prix'];

    public function getPrix(){
        $prix = $this->prix;
       
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories(){
        return $this->belongsToMany('\App\Models\categorie');
    }
}
