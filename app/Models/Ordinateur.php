<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinateur extends Model
{
    use HasFactory;


    public function serveur()
    {
        return $this->belongsTo(Serveur::class);
    }

    public function reseau()
    {
        return $this->belongsTo(Reseau::class);
    }
}
