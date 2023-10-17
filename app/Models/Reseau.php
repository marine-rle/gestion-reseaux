<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseau extends Model
{
    use HasFactory;


    public function serveur()
    {
        return $this->belongsTo(Serveur::class);
    }

    public function ordinateur()
    {
        return $this->belongsTo(Ordinateur::class);
    }

}
