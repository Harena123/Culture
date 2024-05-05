<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVilleRequest;
use App\Http\Requests\UpdateVilleRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\VilleRepository;
use Illuminate\Http\Request;
use Flash;

class VilleController extends AppBaseController
{
    /** @var VilleRepository $villeRepository*/
    private $villeRepository;

    public function __construct(VilleRepository $villeRepo)
    {
        $this->villeRepository = $villeRepo;
    }

    /**
     * Display a listing of the Ville.
     */
    public function index(Request $request)
    {
        $villes = $this->villeRepository->paginate(10);

        return view('villes.index')
            ->with('villes', $villes);
    }

    /**
     * Show the form for creating a new Ville.
     */
    public function create()
    {
        return view('villes.create');
    }

    /**
     * Store a newly created Ville in storage.
     */
    public function store(CreateVilleRequest $request)
    {
        $input = $request->all();

        $ville = $this->villeRepository->create($input);

        Flash::success('Ville saved successfully.');

        return redirect(route('villes.index'));
    }

    /**
     * Display the specified Ville.
     */
    public function show($id)
    {
        $ville = $this->villeRepository->find($id);

        if (empty($ville)) {
            Flash::error('Ville not found');

            return redirect(route('villes.index'));
        }

        return view('villes.show')->with('ville', $ville);
    }

    /**
     * Show the form for editing the specified Ville.
     */
    public function edit($id)
    {
        $ville = $this->villeRepository->find($id);

        if (empty($ville)) {
            Flash::error('Ville not found');

            return redirect(route('villes.index'));
        }

        return view('villes.edit')->with('ville', $ville);
    }

    /**
     * Update the specified Ville in storage.
     */
    public function update($id, UpdateVilleRequest $request)
    {
        $ville = $this->villeRepository->find($id);

        if (empty($ville)) {
            Flash::error('Ville not found');

            return redirect(route('villes.index'));
        }

        $ville = $this->villeRepository->update($request->all(), $id);

        Flash::success('Ville updated successfully.');

        return redirect(route('villes.index'));
    }

    /**
     * Remove the specified Ville from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ville = $this->villeRepository->find($id);

        if (empty($ville)) {
            Flash::error('Ville not found');

            return redirect(route('villes.index'));
        }

        $this->villeRepository->delete($id);

        Flash::success('Ville deleted successfully.');

        return redirect(route('villes.index'));
    }
}
