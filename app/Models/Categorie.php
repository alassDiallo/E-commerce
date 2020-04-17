<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['nom','slug'];
    
    public function produits(){
        return $this->belongsToMany('\App\Models\produit');
    }
}
