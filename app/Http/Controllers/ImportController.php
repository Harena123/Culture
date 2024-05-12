<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Import;
use App\Models\Etudiant;
use App\Models\Menu;
use App\Models\Note;
use App\Models\MenuEtu;
use Carbon\Carbon;

use App\Models\V_note_etu;
use App\Traits\ValidationTrait;
use App\Http\Requests\MenuEtuRequest;


use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;


class ImportController extends Controller
{
    public function afficherImports()
    {
        $lesimports = Etudiant::all();
        // dd($imports);

        return view('pages.liste', ['imports' => $lesimports]);

    }
    public function afficherEtuMenu()
    {
        $etudiants = Etudiant::all();
        $lesmenus = Menu::all();

        // dd($imports);

        return view('pages.form', ['etu' => $etudiants,'menu' => $lesmenus]);

    }
    public function store(MenuEtuRequest $request)
    {
        $validatedData = $request->validated();
        $menuEtu = new MenuEtu();
        $menuEtu->menu = $validatedData['idMenu'];
        $menuEtu->etudiants = $validatedData['idMenu'];

        $menuEtu->dates = Carbon::now()->format('Y-m-d');

echo $menuEtu;

        // $menuEtu->save();

        // return redirect()->back()->with('success', 'Plats ajoutée avec succès.');

    }

    public function afficherImportsDetails($id)
    {
        // $notes = V_note_etu::find($id);
        $notes = DB::select('select * from v_note_etus where id = ?' , [$id]);

        $moyenne = DB::select('select NotesCoeff from v_moyennes where id = ?' , [$id]);

        $moyenneArrondie = number_format($moyenne[0]->NotesCoeff,2);

        // var_dump($notes);

        return view('pages.details', ['imports' => $notes,'moyenne' => $moyenneArrondie]);
    }
    public function afficherModif($id)
    {
        // $notes = V_note_etu::find($id);
        $modif = DB::select('select * from etudiants where id = ?' , [$id]);

        return view('pages.modif', ['modif' => $modif]);
    }
    public function afficherMoyenne($id)
    {
        // $notes = V_note_etu::find($id);

        // var_dump($notes);

        return view('pages.details', ['moyenne' => $notes]);
    }
    public function generatePDF($id)
    {
        $notes = DB::select('select * from v_note_etus where id = ?' , [$id]);
        $moyenne = DB::select('select NotesCoeff from v_moyennes where id = ?' , [$id]);
        $moyenneArrondie = number_format($moyenne[0]->NotesCoeff,2);

        // Charger la vue Blade dans une variable avec les données
        $html = View::make('pages.details_pdf', ['imports' => $notes,'moyenne' => $moyenneArrondie])->render();

        // Créer une instance de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Charger le contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // (Optionnel) Définir les options de rendu
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le PDF
        $dompdf->render();

        // Retourner le PDF en réponse HTTP ou téléchargement
        return $dompdf->stream('Etudiants_notes.pdf');
    }
    use ValidationTrait;

    public function import(Request $request){
        {

            try {
                // Vérifiez si un fichier CSV est présent dans la requête
                if ($request->hasFile('csv_file')) {
                    $file = $request->file('csv_file');
                
                    // Lire le contenu complet du fichier
                    $fileContent = file_get_contents($file->getPathname());
                    // Séparer le contenu en lignes
    
                    // Convertir le contenu en UTF-8 si nécessaire
                    //$fileContent = mb_convert_encoding($fileContent, 'UTF-8', 'ISO-8859-1');
                    
                    //séparer les étapes en ligne
                    $rows = explode("\r", $fileContent);
                    $rows = array_slice($rows, 1);
                    $rows = array_map('trim',$rows);
                    // dump($rows);
    
                    // Parcourir chaque ligne du fichier CSV
                    $count = 0; // Initialisez un compteur à zéro

                    if(!Import::all()->isEmpty()){
                        Import::truncate();
                    }
                    foreach ($rows as $row) {
                        // Utiliser str_getcsv pour séparer les données de chaque ligne
                        // $dataWithHeader = str_getcsv($row, ';');
                        // dump($data);
    
                        $data= str_getcsv($row, ';');
                        // dump($data);
                        
                        // Insérer dans la base de données si la ligne contient des données valides
                        if (!empty($data[0])) {

                            $model = new Import;

                            $model->nom = $data[0];
                            $model->prenom = $data[1];
                            $model->dateNaissance = $this->convertToDate($data[2]);
                            $model->matiere = $data[3];
                            $model->coefficient = $this->convertToInt($data[4]);
                            $model->note = $this->convertToDouble($data[5]);
    
                            // dump($model->toArray());
    
    
                            $model->save();
                            
                            // echo "yesss";
                        }
                        $count++;
                    }

                    $newimport = new Import;
                    $newimport->import();

                    echo "La boucle foreach a tourné $count fois.";
                    // return view('pages.home', ['importsListe' => $dataWithHeader]);
                    return redirect()->route('importListe')->with('success', ' ajoutée avec succès.');
                    
                    // Importation réussie
                    return response()->json(['success' => true, 'message' => 'Importation CSV réussie']);
                } else {
                    // Aucun fichier CSV n'a été téléchargé
                    return response()->json(['success' => false, 'message' => 'Aucun fichier CSV trouvé']);
                }
            } catch (\Exception $e) {
                // Une erreur s'est produite lors de l'importation
                return response()->json(['success' => false, 'message' => $e->getMessage()]);
            }

        }
    }
    
    
        public function newImports()
        {
            // dd($imports);
    
            return view('pages.home', ['imports' => $imports]);
        }
    
        public function chartMenu()
        {
            // $etudiants = Etudiant::all();
            $moyennes = DB::select("select nom,prix from menus");
    
            // Initialiser un tableau pour stocker les données formatées
            $dataString1 = '[';
    
            // Parcourir les moyennes et les ajouter au string
            foreach ($moyennes as $moyenne) {
                $dataString1 .= "'" . $moyenne->nom . "', "; // Ajouter les guillemets simples autour du prénom
            }
    
            // Supprimer la virgule finale et ajouter la fermeture du tableau
            $dataString1 = rtrim($dataString1, ', '); // Supprimer la virgule finale
            $dataString1 .= ']';
            
            // Initialiser un tableau pour stocker les données formatées
            $dataString2 = '[';
    
            // Parcourir les moyennes et les ajouter au string
            foreach ($moyennes as $moyenne) {
                $dataString2 .= $moyenne->prix . ', ';
            }
    
            // Supprimer la virgule finale et ajouter la fermeture du tableau
            $dataString2 = rtrim($dataString2, ', '); // Supprimer la virgule finale
            $dataString2 .= ']';
    
            // echo $dataString1 . ' lol ' . $dataString2;
        
            return view('pages.chart', ['dataString1' => $dataString1 , 'dataString2' => $dataString2] );
        }
}
