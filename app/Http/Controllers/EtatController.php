<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtatRequest;
use App\Http\Requests\UpdateEtatRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EtatRepository;
use Illuminate\Http\Request;
use Flash;

class EtatController extends AppBaseController
{
    /** @var EtatRepository $etatRepository*/
    private $etatRepository;

    public function __construct(EtatRepository $etatRepo)
    {
        $this->etatRepository = $etatRepo;
    }

    /**
     * Display a listing of the Etat.
     */
    public function index(Request $request)
    {
        $etats = $this->etatRepository->paginate(10);

        return view('etats.index')
            ->with('etats', $etats);
    }

    /**
     * Show the form for creating a new Etat.
     */
    public function create()
    {
        return view('etats.create');
    }

    /**
     * Store a newly created Etat in storage.
     */
    public function store(CreateEtatRequest $request)
    {
        $input = $request->all();

        $etat = $this->etatRepository->create($input);

        Flash::success('Etat saved successfully.');

        return redirect(route('etats.index'));
    }

    /**
     * Display the specified Etat.
     */
    public function show($id)
    {
        $etat = $this->etatRepository->find($id);

        if (empty($etat)) {
            Flash::error('Etat not found');

            return redirect(route('etats.index'));
        }

        return view('etats.show')->with('etat', $etat);
    }

    /**
     * Show the form for editing the specified Etat.
     */
    public function edit($id)
    {
        $etat = $this->etatRepository->find($id);

        if (empty($etat)) {
            Flash::error('Etat not found');

            return redirect(route('etats.index'));
        }

        return view('etats.edit')->with('etat', $etat);
    }

    /**
     * Update the specified Etat in storage.
     */
    public function update($id, UpdateEtatRequest $request)
    {
        $etat = $this->etatRepository->find($id);

        if (empty($etat)) {
            Flash::error('Etat not found');

            return redirect(route('etats.index'));
        }

        $etat = $this->etatRepository->update($request->all(), $id);

        Flash::success('Etat updated successfully.');

        return redirect(route('etats.index'));
    }

    /**
     * Remove the specified Etat from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $etat = $this->etatRepository->find($id);

        if (empty($etat)) {
            Flash::error('Etat not found');

            return redirect(route('etats.index'));
        }

        $this->etatRepository->delete($id);

        Flash::success('Etat deleted successfully.');

        return redirect(route('etats.index'));
    }
}
