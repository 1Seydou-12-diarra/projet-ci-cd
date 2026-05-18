<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Etudiant;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EtudiantControllerTest extends TestCase
{
    use RefreshDatabase; // remet la base à zéro avant chaque test

    // ✅ TEST 1 : liste_etudiant()
    public function test_liste_etudiant()
    {              
        // 1. Créer un faux étudiant dans la base
        Etudiant::create([
            'nom'    => 'Koné',
            'prenom' => 'Ibrahima',
            'classe' => 'L3'
        ]);

        // 2. Appeler la route GET /etudiant
        $response = $this->get('/etudiant');

        // 3. Vérifier que la page s'affiche bien
        $response->assertStatus(200);          // page trouvée
        $response->assertSee('Koné');          // nom visible sur la page
    }

    // ✅ TEST 2 : traiter_ajout()
    public function test_traiter_ajout()
    {
        // 1. Envoyer un formulaire POST
        $response = $this->post('/ajouter/traitement', [
            'nom'    => 'Coulibaly',
            'prenom' => 'Moussa',
            'classe' => 'L2'
        ]);

        // 2. Vérifier la redirection
        $response->assertRedirect('/etudiant');

        // 3. Vérifier que l'étudiant est bien en base
        $this->assertDatabaseHas('etudiants', [
            'nom' => 'Coulibaly'
        ]);
    }

    // ✅ TEST 3 : supprimer_etudiant()
    public function test_supprimer_etudiant()
    {
        // 1. Créer un étudiant
        $etudiant = Etudiant::create([
            'nom'    => 'Bamba',
            'prenom' => 'Sekou',
            'classe' => 'L1'
        ]);

        // 2. Appeler la route supprimer
       $response = $this->delete('/etudiant/' . $etudiant->id); // ← DELETE

        // 3. Vérifier qu'il n'est plus en base
        $response->assertRedirect('/etudiant');
        $this->assertDatabaseMissing('etudiants', [
            'nom' => 'Bamba'
        ]);
    }

    // ✅ TEST 4 : modifier_etudiant()
    public function test_modifier_etudiant()
    {
        // 1. Créer un étudiant
        $etudiant = Etudiant::create([
            'nom'    => 'Diallo',
            'prenom' => 'Mamadou',
            'classe' => 'L1'
        ]);

        // 2. Envoyer la modification
        $response = $this->put('/etudiant/' . $etudiant->id, [ // ← PUT
            'nom'    => 'Diallo',
            'prenom' => 'Mamadou',
            'classe' => 'L3' // ← classe modifiée
        ]);

        // 3. Vérifier que la modification est en base
        $response->assertRedirect('/etudiant');
        $this->assertDatabaseHas('etudiants', [
            'classe' => 'L3'
        ]);
    }
}