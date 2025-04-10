<?php

namespace App\Repositories;

use App\Models\Place;

class PlaceRepository
{
    protected $placeModel;

    public function __construct(Place $placeModel)
    {
        $this->placeModel = $placeModel;
    }

    public function getAll()
    {
        return $this->placeModel->all();
    }

    public function findById(int $id)
    {
        return $this->placeModel->find($id);
    }

    public function create(array $data)
    {
        return $this->placeModel->create($data);
    }

    public function update(int $id, array $data)
    {
        $place = $this->findById($id);

        return $place ? $place->update($data) : false;
    }

    public function delete(int $id)
    {
        $place = $this->findById($id);

        return $place ? $place->delete() : false;
    }

    public function search(string $keyword)
    {
        return $this->placeModel
            ->where('name', 'like', '%' . $keyword . '%')
            ->get();
    }

    public function findBySlug(string $slug)
    {
        return $this->placeModel
            ->where('slug', $slug)
            ->first();
    }
}
