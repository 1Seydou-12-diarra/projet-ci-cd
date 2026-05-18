<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase; // ← ajouter

class ExampleTest extends TestCase
{
    use RefreshDatabase; // ← ajouter

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/etudiant');
        $response->assertStatus(200);
    }
}