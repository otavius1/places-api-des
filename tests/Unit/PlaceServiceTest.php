<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\PlaceService;
use App\Repositories\PlaceRepository;
use App\Models\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class PlaceServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $placeRepository;
    protected $placeService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->placeRepository = Mockery::mock(PlaceRepository::class);
        $this->placeService = new PlaceService($this->placeRepository);
    }

    public function test_create_place()
    {
        $data = ['name' => 'Parque da Cidade', 'city' => 'Brasília', 'state' => 'DF'];

        $this->placeRepository
            ->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn(new Place($data));

        $result = $this->placeService->createPlace($data);

        $this->assertInstanceOf(Place::class, $result);
        $this->assertEquals('Parque da Cidade', $result->name);
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
