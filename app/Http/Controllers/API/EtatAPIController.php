<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEtatAPIRequest;
use App\Http\Requests\API\UpdateEtatAPIRequest;
use App\Models\Etat;
use App\Repositories\EtatRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class EtatAPIController
 */
class EtatAPIController extends AppBaseController
{
    private EtatRepository $etatRepository;

    public function __construct(EtatRepository $etatRepo)
    {
        $this->etatRepository = $etatRepo;
    }

    /**
     * Display a listing of the Etats.
     * GET|HEAD /etats
     */
    public function index(Request $request): JsonResponse
    {
        $etats = $this->etatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($etats->toArray(), 'Etats retrieved successfully');
    }

    /**
     * Store a newly created Etat in storage.
     * POST /etats
     */
    public function store(CreateEtatAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $etat = $this->etatRepository->create($input);

        return $this->sendResponse($etat->toArray(), 'Etat saved successfully');
    }

    /**
     * Display the specified Etat.
     * GET|HEAD /etats/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Etat $etat */
        $etat = $this->etatRepository->find($id);

        if (empty($etat)) {
            return $this->sendError('Etat not found');
        }

        return $this->sendResponse($etat->toArray(), 'Etat retrieved successfully');
    }

    /**
     * Update the specified Etat in storage.
     * PUT/PATCH /etats/{id}
     */
    public function update($id, UpdateEtatAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Etat $etat */
        $etat = $this->etatRepository->find($id);

        if (empty($etat)) {
            return $this->sendError('Etat not found');
        }

        $etat = $this->etatRepository->update($input, $id);

        return $this->sendResponse($etat->toArray(), 'Etat updated successfully');
    }

    /**
     * Remove the specified Etat from storage.
     * DELETE /etats/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Etat $etat */
        $etat = $this->etatRepository->find($id);

        if (empty($etat)) {
            return $this->sendError('Etat not found');
        }

        $etat->delete();

        return $this->sendSuccess('Etat deleted successfully');
    }
}
