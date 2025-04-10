<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PlaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Exception;

class PlaceController extends Controller
{
    protected $placeService;

    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $query = $request->query('q');

            $places = $query
                ? $this->placeService->searchPlaces($query)
                : $this->placeService->getAllPlaces();

            return response()->json($places, 200);
        } catch (Exception $e) {
            return $this->errorResponse('Failed to load places.', $e);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'state' => 'nullable|string',
                'city' => 'nullable|string'
            ]);

            $place = $this->placeService->createPlace($validated);

            return response()->json($place, 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return $this->errorResponse('Failed to create place.', $e);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $place = $this->placeService->getPlaceById($id);

            if (!$place) {
                return response()->json(['message' => 'Place not found.'], 404);
            }

            return response()->json($place, 200);
        } catch (Exception $e) {
            return $this->errorResponse('Failed to retrieve place.', $e);
        }
    }

    public function showBySlug(string $slug): JsonResponse
    {
        try {
            $place = $this->placeService->getPlaceBySlug($slug);
    
            if (!$place) {
                return response()->json(['message' => 'Place not found.'], 404);
            }
    
            return response()->json($place, 200);
        } catch (Exception $e) {
            return $this->errorResponse('Failed to retrieve place by slug.', $e);
        }
    }

    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'state' => 'nullable|string',
                'city' => 'sometimes|string'
            ]);

            $updatedPlace = $this->placeService->updatePlace($id, $validated);

            if (!$updatedPlace) {
                return response()->json(['message' => 'Place not found or not updated.'], 404);
            }

            return response()->json([
                'message' => 'Place updated successfully.',
                'data' => $updatedPlace
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return $this->errorResponse('Failed to update place.', $e);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $deletedPlace = $this->placeService->deletePlace($id);

            if (!$deletedPlace) {
                return response()->json(['message' => 'Place not found.'], 404);
            }

            return response()->json([
                'message' => 'Place deleted successfully.',
                'data' => ['id' => $id]
            ], 200);
        } catch (Exception $e) {
            return $this->errorResponse('Failed to delete place.', $e);
        }
    }

    protected function errorResponse(string $message, Exception $e): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'error' => $e->getMessage(),
        ], 500);
    }
}
