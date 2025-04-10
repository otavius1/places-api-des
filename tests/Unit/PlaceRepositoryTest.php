<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Place;
use App\Repositories\PlaceRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlaceRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected PlaceRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new PlaceRepository(new Place());
    }

    public function test_can_create_place()
    {
        $data = [
            'name' => 'Museu Nacional',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ'
        ];

        $place = $this->repository->create($data);

        $this->assertDatabaseHas('places', ['name' => 'Museu Nacional']);
        $this->assertEquals('Museu Nacional', $place->name);
    }

    public function test_can_find_by_id()
    {
        $place = Place::factory()->create();

        $found = $this->repository->findById($place->id);

        $this->assertEquals($place->id, $found->id);
    }
}
