<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    protected $table = 'categories'; // Nom de la table
    protected $primaryKey = 'id'; // Clé primaire

    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_categorie');
    }
}