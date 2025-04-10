<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlaceModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_place_and_generate_slug()
    {
        $place = Place::create([
            'name' => 'Parque Ibirapuera',
            'city' => 'São Paulo',
            'state' => 'SP',
        ]);

        $this->assertInstanceOf(Place::class, $place);
        $this->assertEquals('parque-ibirapuera', $place->slug);
        $this->assertEquals('São Paulo', $place->city);
    }

    public function test_slug_is_updated_when_name_changes()
    {
        $place = Place::factory()->create(['name' => 'Antigo Nome']);
        $this->assertEquals('antigo-nome', $place->slug);

        $place->update(['name' => 'Novo Nome']);
        $this->assertEquals('novo-nome', $place->slug);
    }

    public function test_fillable_fields()
    {
        $place = new Place();

        $this->assertEquals(
            ['name', 'slug', 'city', 'state'],
            $place->getFillable()
        );
    }
}
