<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeRating extends Model
{

    use HasFactory;
    protected $fillable = ['recipe_ratings'];
}
