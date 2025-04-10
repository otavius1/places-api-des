<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Place;

class PlaceApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_place()
    {
        $response = $this->postJson('/api/places', [
            'name' => 'Parque Ibirapuera',
            'city' => 'São Paulo',
            'state' => 'SP',
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Parque Ibirapuera']);
    }

    public function test_can_list_places()
    {
        Place::factory()->create(['name' => 'Parque das Águas']);

        $response = $this->getJson('/api/places');

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Parque das Águas']);
    }

    public function test_can_search_places_by_name()
    {
        Place::factory()->create(['name' => 'Cachoeira Azul']);

        $response = $this->getJson('/api/places?q=azul');

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Cachoeira Azul']);
    }

    public function test_can_show_place_by_id()
    {
        $place = Place::factory()->create();

        $response = $this->getJson("/api/places/{$place->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $place->id]);
    }

    public function test_can_update_place()
    {
        $place = Place::factory()->create();

        $response = $this->putJson("/api/places/{$place->id}", [
            'name' => 'Novo Nome',
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Place updated successfully.']);
    }

    public function test_can_delete_place()
    {
        $place = Place::factory()->create();

        $response = $this->deleteJson("/api/places/{$place->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Place deleted successfully.']);
    }

    public function test_can_get_place_by_slug()
    {
        $place = Place::factory()->create(['name' => 'Praia dos Ossos']);
        $slug = $place->slug;

        $response = $this->getJson("/api/places/slug/{$slug}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Praia dos Ossos']);
    }
}
