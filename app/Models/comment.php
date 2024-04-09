<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [  'recipe_id', 'user_id','content'];// Les attributs pouvant être remplis

    /**
     * Relation avec l'utilisateur qui a créé le commentaire
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec la recette associée au commentaire
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
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
    //         $query = $this->pdo->query('SELECT * FROM comments');
    //         $query->execute();
    //         return $query->fetchAll();
    //     } catch (\PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }
    // public function add($content)
    // {
    //     try {
    //         if (isset($content)) {
    //             $query = $this->pdo->prepare('INSERT INTO comments ( recipe_id, user_id, content) VALUES (:recipe_id, :user_id, :content)');
    //             $query->execute([

    //                 'content' => $content,
    //             ]);
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     } catch (\PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }

}
