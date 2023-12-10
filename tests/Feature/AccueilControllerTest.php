<?php

namespace Tests\Feature\Controllers;

use App\Models\Reseau;
use App\Models\Ordinateur;
use App\Models\Serveur;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccueilControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAccueilIndex()
    {
        // utilise un utilisateur
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('accueil.index'))->assertStatus(200);


        // Création de données pour Reseau, Ordinateur, Serveur
        Reseau::factory()->create();
        Ordinateur::factory()->create();
        Serveur::factory()->create();

        // Exécution de la requête vers la méthode index
        $response = $this->get(route('accueil.index'));

        // Vérification que la réponse est une vue
        $response->assertViewIs('accueil.index');

        // Vérification que la vue contient les données nécessaires
        $response->assertViewHasAll(['reseau', 'ordinateur', 'serveur']);
    }
}
