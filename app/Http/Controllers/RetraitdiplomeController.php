<?php

namespace App\Http\Controllers;

use App\Retraitdiplome;
use Illuminate\Http\Request;


use App\Etudiant;
use App\Models\Matiere;
use App\Groupes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDFlib;
use PDF;
use Response;

class RetraitdiplomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
          $liste_remise_diplomes = Retraitdiplome::orderBy('id','desc')->paginate(5);
          $matiere = $request->matiere;
          $etudiants = \App\Etudiant::where('nomMat',$matiere)->get();
        //   $liste_etudiants = array();
        //   foreach ($etudiants as $etudiant) {
        //    $etudiant_matiere = $etudiant->nomMat;
        //    $etudiant_matiere_id = DB::table('matieres')->where('nomMat', $etudiant_matiere)->value('id');
        //    if ($etudiant_matiere_id == $matiere_id) {
        //     $etudiant->matiere_id = $etudiant_matiere_id;
        //     $liste_etudiants[] = $etudiant;
        //    }
            
        //    }
        //  $etudiants = $liste_etudiants::paginate(5);
        return view('diplomes.etudiants.list',compact('liste_remise_diplomes','etudiants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('diplomes.etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retraitdiplome  $retraitdiplome
     * @return \Illuminate\Http\Response
     */
    public function show(Retraitdiplome $retraitdiplome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retraitdiplome  $retraitdiplome
     * @return \Illuminate\Http\Response
     */
    public function edit(Retraitdiplome $retraitdiplome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retraitdiplome  $retraitdiplome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retraitdiplome $retraitdiplome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retraitdiplome  $retraitdiplome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retraitdiplome $retraitdiplome)
    {
        //
    }
}
