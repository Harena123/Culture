<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Import extends Model
{
    public $timestamps = false;

    public function import()
    {

        // DB::dropIfExists('DELETE from imports');

         DB::insert('INSERT INTO etudiants (nom,prenom,dateNaissance)
         select DISTINCT nom,prenom,dateNaissance from imports WHERE (nom,prenom) not in (select nom,prenom from etudiants)');

         DB::insert('INSERT INTO matieres (nom,coefficient)
            select DISTINCT matiere,coefficient from imports WHERE (matiere) not in (select nom from matieres)');

         DB::insert('INSERT INTO notes (notes,matieres,etu)
         SELECT ip.note as notes,m.id as matieres,e.id as etu
         FROM imports ip
         JOIN etudiants e ON e.nom = ip.nom and e.prenom = ip.prenom
         JOIN matieres m ON m.nom = ip.matiere');

        // dd($imports);

        // return view('pages.listesDash', ['villes' => $lesvilles,'lesroutes' => $routes,'etats' => $lesetats,'portions' => $lesportions,'parametres' => $lesparametres]);

    }
}
