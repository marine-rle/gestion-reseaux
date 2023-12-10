<?php

namespace Tests\Feature\Controllers;

use App\Models\Reseau;
use App\Http\Controllers\ReseauController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ReseauControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testReseauIndex()
    {
        // utilision d'un utilisateur
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('reseau.index'))->assertStatus(200);


        // Création de données pour Reseau
        Reseau::factory()->create();

        // Exécution de la requête vers la méthode index
        $response = $this->get(route('reseau.index'));

        // Vérification du statut de la réponse
        $response->assertStatus(200);

        // Vérification que la vue 'reseau.index' est renvoyée
        $response->assertViewIs('reseau.index');

        // Vérification que la vue contient les données nécessaires
        $response->assertViewHas('reseau');
    }


    public function setUp(): void
    {
        parent::setUp();

        // Créer le rôle 'admin'
        Role::create(['name' => 'admin']);
    }

    public function testReseauCreate()
    {
        // Créer un utilisateur avec le rôle 'admin'
        $adminUser = User::factory()->create();
        $adminUser->assignRole('admin');

        // Agir en tant qu'utilisateur administrateur
        $this->actingAs($adminUser);

        // Performing the request to the create method
        $response = $this->get(route('reseau.create'));

        // Asserting that the response status is 200 (OK)
        $response->assertStatus(200);

        // You can also assert other things if needed
        // For example, you might want to assert that the correct view is returned:
        $response->assertViewIs('reseau.create');
    }

    public function testReseauStore()
    {
        $adminUser = User::factory()->create();
        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        $response = $this->post(route('reseau.store'), [
            'libelle' => 'New Reseau',
            'lan' => 'Local Area Network',
            'is_disponible' => true,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('reseaus', [
            'libelle' => 'New Reseau',
            'lan' => 'Local Area Network',
            'is_disponible' => true,
        ]);

        $response->assertRedirect(route('reseau.index'));
    }

    public function testReseauEdit()
    {
        $adminUser = User::factory()->create();
        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        // Créez une instance de Reseau pour simuler une ressource existante
        $reseau = Reseau::factory()->create();

        // Accédez à la page d'édition
        $response = $this->get(route('reseau.edit', ['reseau' => $reseau->id]));

        // Assurez-vous que la réponse a un statut 200 (OK)
        $response->assertStatus(200);

        // Assurez-vous que la vue correspond à 'reseau.edit'
        $response->assertViewIs('reseau.edit');

        // Assurez-vous que la variable $reseau est passée à la vue
        $response->assertViewHas('reseau', $reseau);
    }

    public function testAdminCanUpdateReseau()
    {
        // Créer un utilisateur admin
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        // Créer un reseau
        $reseau = Reseau::factory()->create();

        // Simuler l'authentification en tant qu'admin
        $this->actingAs($admin);

        // Effectuer la requête de mise à jour
        $response = $this->put(route('reseau.update', ['reseau' => $reseau->id]), [
            'libelle' => 'mise à jour Reseau',
            'lan' => 'Local Area Network',
            'is_disponible' => true,
        ]);

        // Assurez-vous que la redirection a eu lieu après la mise à jour
        $response->assertRedirect(route('reseau.index'));

        // Vous pouvez également ajouter des assertions supplémentaires si nécessaire
        // Vérifier que le reseau a été correctement mis à jour dans la base de données, etc.
    }

    public function testAdminCanDestroyReseau()
    {
        // Créer un utilisateur avec le rôle 'admin'
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        // Créer un réseau pour le test
        $reseau = Reseau::factory()->create();

        // Simuler la connexion de l'utilisateur admin
        $this->actingAs($admin);

        // Effectuer la requête pour détruire le réseau
        $response = $this->delete(route('reseau.destroy', ['reseau' => $reseau->id]));

        // Assurer que la réponse redirige correctement après la suppression
        $response->assertRedirect(route('reseau.index'));

        // Assurer que le réseau a été supprimé de la base de données
        $this->assertDatabaseMissing('reseaus', ['id' => $reseau->id]);
    }


}
