<?php

namespace Tests\Feature;

use App\Http\Controllers\OrdinateurController;
use App\Http\Repositories\OrdinateurRepository;
use App\Models\Ordinateur;
use App\Models\Reseau;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mail;
use Request;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class OrdinateurControllerTest extends TestCase
{

    use RefreshDatabase;

    public function testOrdinateurIndex()
    {
        // Utilisation d'un utilisateur
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('ordinateur.index'))->assertStatus(200);

        // Création de données pour Reseau et Ordinateur
        Reseau::factory()->create();
        Ordinateur::factory()->create();

        $response = $this->get(route('ordinateur.index'));
        $response->assertStatus(200);
        $response->assertViewIs('ordinateur.index');
        $response->assertViewHas('ordinateur');

    }

    public function setUp(): void
    {
        parent::setUp();

        Role::create(['name' => 'technicien']);
        parent::setUp();
        Mail::fake();
    }


    public function testOrdinateurCreate()
    {
        // Créer un utilisateur avec le rôle 'technicien'
        $technicienUser = User::factory()->create();
        $technicienUser->assignRole('technicien');

        $this->actingAs($technicienUser);

        Reseau::factory()->create();

        $response = $this->get(route('ordinateur.create'));
        $response->assertStatus(200);

        $response->assertViewIs('ordinateur.create');

        $response->assertViewHas('reseau');
    }

    public function testStoreOrdinateur()
    {
        // Créer un utilisateur avec le rôle 'technicien'
        $technicienUser = User::factory()->create();
        $technicienUser->assignRole('technicien');

        // Authentifier l'utilisateur
        $this->actingAs($technicienUser);

        $reseau = Reseau::factory()->create();

        $response = $this->post(route('ordinateur.store'), [
            'num_serie' => '123456',
            'modele' => 'Modèle',
            'marque' => 'Marque',
            'date_service' => '2023-12-01',
            'reseau' => $reseau->id,
        ]);

        // Assurer que la redirection après la création est correcte
        $response->assertRedirect(route('ordinateur.index'));


        $this->assertDatabaseHas('ordinateurs', [
            'num_serie' => '123456',
            'modele' => 'Modèle',
            'marque' => 'Marque',
            'date_service' => '2023-12-01',
            'reseau' => $reseau->id,
        ]);
    }


    public function testOrdinateurEdit()
    {
        // Créer un utilisateur avec le rôle 'technicien'
        $technicienUser = User::factory()->create();
        $technicienUser->assignRole('technicien');

        // Création de données pour Reseau et Ordinateur
        Reseau::factory()->create();
        $ordinateur = Ordinateur::factory()->create();

        $this->actingAs($technicienUser);

        $response = $this->get(route('ordinateur.edit', ['ordinateur' => $ordinateur->id]));
        $response->assertStatus(200);
        $response->assertViewIs('ordinateur.edit');
        $response->assertViewHasAll(['reseau', 'ordinateur']);
        $response->assertViewHas('ordinateur', $ordinateur);
    }

}
