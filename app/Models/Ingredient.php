<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'unit',
        'recipe_id'
    ];// Les attributs pouvant être remplis

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);// Relation avec la recette associée à l'ingrédient
    }

    public function getQuantityAttribute($value)
    {
        return $value . ' ' . $this->unit;// Retourne la quantité et l'unité
    }

    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = $value;
    }

}
