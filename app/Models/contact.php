<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    public function user()
{
    return $this->belongsTo(User::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

protected $pdo;
function __construct()
{
    try {
        $this->pdo = new \PDO('sqlite:/Users/phuongta/lavarel-projects/pws-projet-2024-recettes-ta_zhang/database/database.sqlite');
    } catch (\PDOException $e) {
        die($e->getMessage());
    }
}
}
