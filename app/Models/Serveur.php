<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serveur extends Model
{
    use HasFactory;

    public function reseau()
    {
        return $this->belongsTo(Reseau::class);
    }

    public function ordinateur()
    {
        return $this->belongsTo(Ordinateur::class);
    }

}
