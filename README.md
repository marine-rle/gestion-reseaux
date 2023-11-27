# Evaluation Laravel
Le sujet de l'évaluation est la gestion d'un parc informatique  


## Installation
Télécharger le code et le placer dans Homestead/code/


## Identification
Créez-vous un compte au niveau de la page d'accueil, ainsi vous pourrez accéder aux pages.


## Rôles et habilitations
Les rôles et permissions sont créer via tinker

````
composer require spatie/laravel-permission
artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
artisan migrate
````


pour ouvrir Tinker:
````
artisan tinker
````

Ensuite pour créer des rôles et permission:
````
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Role::create(['name' => 'admin']);
Role::create(['name' => 'technicien']);

Permission::create(['name' => 'admin_task']);
Permission::create(['name' => 'technicien_task']);
`````

Pour attribuer des permission aux roles : 
````
$adminRole = Role::where('name','admin')->first();
$technicienRole = Role::where('name','technicien')->first();

$adminRole->givePermissionTo('admin_task');
$technicienRole->givePermissionTo('technicien_task');
````


## Création Technicien et Administrateur

````
artisan tinker 
````

````
use App\Models\User;
use Spatie\Permission\Models\Role;

$adminUser = new User;
$adminUser->name = 'Admin';
$adminUser->email = 'admin@administrateur.com';
$adminUser->password = 'Admin0000';
$adminUser->save();

$technicienUser = new User;
$technicienUser->name = 'Technicien';
$technicienUser->email = 'tec@technicien.com';
$technicienUser->password = 'technicien0000';
$technicienUser->save();
````
Attribuer les rôles à 'admin' et à 'technicien'
````
$adminUser->assignRole($adminRole);
$technicienUser->assignRole($technicienRole);
