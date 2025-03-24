<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'utilisateurs';  // Nom de la table
    protected $fillable = ['nom', 'email', 'age']; // Champs autorisés

}
