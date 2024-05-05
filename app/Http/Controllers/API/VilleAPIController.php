<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVilleAPIRequest;
use App\Http\Requests\API\UpdateVilleAPIRequest;
use App\Models\Ville;
use App\Repositories\VilleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class VilleAPIController
 */
class VilleAPIController extends AppBaseController
{
    private VilleRepository $villeRepository;

    public function __construct(VilleRepository $villeRepo)
    {
        $this->villeRepository = $villeRepo;
    }

    /**
     * Display a listing of the Villes.
     * GET|HEAD /villes
     */
    public function index(Request $request): JsonResponse
    {
        $villes = $this->villeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($villes->toArray(), 'Villes retrieved successfully');
    }

    /**
     * Store a newly created Ville in storage.
     * POST /villes
     */
    public function store(CreateVilleAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $ville = $this->villeRepository->create($input);

        return $this->sendResponse($ville->toArray(), 'Ville saved successfully');
    }

    /**
     * Display the specified Ville.
     * GET|HEAD /villes/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Ville $ville */
        $ville = $this->villeRepository->find($id);

        if (empty($ville)) {
            return $this->sendError('Ville not found');
        }

        return $this->sendResponse($ville->toArray(), 'Ville retrieved successfully');
    }

    /**
     * Update the specified Ville in storage.
     * PUT/PATCH /villes/{id}
     */
    public function update($id, UpdateVilleAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Ville $ville */
        $ville = $this->villeRepository->find($id);

        if (empty($ville)) {
            return $this->sendError('Ville not found');
        }

        $ville = $this->villeRepository->update($input, $id);

        return $this->sendResponse($ville->toArray(), 'Ville updated successfully');
    }

    /**
     * Remove the specified Ville from storage.
     * DELETE /villes/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Ville $ville */
        $ville = $this->villeRepository->find($id);

        if (empty($ville)) {
            return $this->sendError('Ville not found');
        }

        $ville->delete();

        return $this->sendSuccess('Ville deleted successfully');
    }
}
