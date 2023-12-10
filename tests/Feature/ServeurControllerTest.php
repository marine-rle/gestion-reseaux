<?php

namespace Tests\Feature;

use App\Models\Reseau;
use App\Models\Serveur;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ServeurControllerTest extends TestCase
{

    use RefreshDatabase;

    public function testServeurIndex()
    {
        // Utilisation d'un utilisateur
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('serveur.index'))->assertStatus(200);

        // Création de données pour Reseau et Ordinateur
        Reseau::factory()->create();
        Serveur::factory()->create();

        $response = $this->get(route('serveur.index'));
        $response->assertStatus(200);
        $response->assertViewIs('serveur.index');
        $response->assertViewHas('serveur');

        $serveur = $response->viewData('serveur');
        $this->assertInstanceOf(Collection::class, $serveur);
    }

    public function setUp(): void
    {
        parent::setUp();

        Role::create(['name' => 'technicien']);
    }

    public function testServeurCreate()
    {
        // Créer un utilisateur avec le rôle 'technicien'
        $technicienUser = User::factory()->create();
        $technicienUser->assignRole('technicien');

        $this->actingAs($technicienUser);

        Reseau::factory()->create();

        $response = $this->get(route('serveur.create'));
        $response->assertStatus(200);

        $response->assertViewIs('serveur.create');

        $response->assertViewHas('reseau');
    }

    public function testStoreOrdinateur()
    {
        $technicienUser = User::factory()->create();
        $technicienUser->assignRole('technicien');

        $this->actingAs($technicienUser);

        $reseau = Reseau::factory()->create();

        $response = $this->post(route('serveur.store'), [
            'ip' => '163.276.326',
            'type' => 'type',
            'os' => 'ostest',
            'reseau' => $reseau->id,
        ]);


        $response->assertRedirect(route('serveur.index'));


        $this->assertDatabaseHas('serveurs', [
            'ip' => '163.276.326',
            'type' => 'type',
            'os' => 'ostest',
            'reseau' => $reseau->id,
        ]);
    }

    public function testServeurEdit()
    {
        // Créer un utilisateur avec le rôle 'technicien'
        $technicienUser = User::factory()->create();
        $technicienUser->assignRole('technicien');

        // Création de données pour Reseau et Ordinateur
        Reseau::factory()->create();
        $serveur = Serveur::factory()->create();

        $this->actingAs($technicienUser);

        $response = $this->get(route('serveur.edit', ['serveur' => $serveur->id]));
        $response->assertStatus(200);
        $response->assertViewIs('serveur.edit');
        $response->assertViewHasAll(['reseau', 'serveur']);
        $response->assertViewHas('serveur', $serveur);
    }



}
