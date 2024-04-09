<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['body'];// Les attributs pouvant être remplis
    protected $appends = ['selfMessage'];// Les attributs à ajouter



    public function user()
    {
        return $this->belongsTo(User::class);// Relation avec l'utilisateur qui a créé le message
    }
    public function getSelfMessageAttribute()
{
    return $this->user_id === auth()->user()->id;// Retourne vrai si le message a été créé par l'utilisateur connecté
}
}
