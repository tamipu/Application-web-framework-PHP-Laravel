<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    /**
 * Get the user that owns the recipe.
 */
protected $fillable = [
    'title', 'content', 'ingredients', 'price', 'url', 'tags', 'status', 'user_id', 'photo',
    'servings', 'prep_time', 'cook_time', 'difficulty',];
public function user()
{
    return $this->belongsTo(User::class,'user_id');

}

public function comments()
{
    return $this->hasMany(Comment::class);

}
public function tags()
{
    return $this->belongsToMany(Tag::class);
}

// protected $pdo;
// function __construct(array $data = [])
// {
//     try {
//         $this->pdo = new \PDO('sqlite:/Users/phuongta/lavarel-projects/pws-projet-2024-recettes-ta_zhang/database/database.sqlite');
//     } catch (\PDOException $e) {
//         die($e->getMessage());
//     }

// }

// public function list()
// {
//     try {
//         $query = $this->pdo->query('SELECT * FROM recipes');
//         $query->execute();
//         return $query->fetchAll();
//     } catch (\PDOException $e) {
//         die($e->getMessage());
//     }

// }

// public function add($title, $content, $ingredients, $price, $photo, $servings, $prep_time, $cook_time, $difficulty)
// {
//     try {
//         if (isset($title) && isset($content) && isset($ingredients) && isset($price) && isset($photo) && isset($servings) && isset($prep_time) && isset($cook_time) && isset($difficulty)) {
//             $query = $this->pdo->prepare('INSERT INTO recipes (title, content, ingredients, price, photo, servings, prep_time, cook_time, difficulty) VALUES (:title, :content, :ingredients, :price, :photo, :servings, :prep_time, :cook_time, :difficulty)');
//             $query->execute([
//                 'title' => $title,
//                 'content' => $content,
//                 'ingredients' => $ingredients,
//                 'price' => $price,
//                 'photo' => $photo,
//                 'servings' => $servings,
//                 'prep_time' => $prep_time,
//                 'cook_time' => $cook_time,
//                 'difficulty' => $difficulty,
//             ]);
//             return true;
//         }
//         return false;
//     } catch (\PDOException $e) {
//         die($e->getMessage());
//     }
// }

public function averageRating()
{
    return $this->ratings->avg('rating');
}

}
