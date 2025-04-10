<?php

namespace App\Services;

use App\Repositories\PlaceRepository;

class PlaceService
{
    protected $placeRepository;

    public function __construct(PlaceRepository $placeRepository)
    {
        $this->placeRepository = $placeRepository;
    }

    public function getAllPlaces()
    {
        return $this->placeRepository->getAll();
    }

    public function getPlaceById(int $id)
    {
        return $this->placeRepository->findById($id);
    }

    public function createPlace(array $data)
    {
        return $this->placeRepository->create($data);
    }

    public function updatePlace(int $id, array $data)
    {
        return $this->placeRepository->update($id, $data);
    }

    public function deletePlace(int $id)
    {
        return $this->placeRepository->delete($id);
    }

    public function searchPlaces(string $keyword)
    {
        return $this->placeRepository->search($keyword);
    }

    public function getPlaceBySlug(string $slug)
    {
        return $this->placeRepository->findBySlug($slug);
    }
}
