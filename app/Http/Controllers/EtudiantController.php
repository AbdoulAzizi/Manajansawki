<?php

namespace App\Http\Controllers;

use App\Etudiant;
use App\Models\Matiere;
use App\Groupes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDFlib;
use PDF;
use Response;
class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['etudiants'] = Etudiant::orderBy('id','desc')->paginate(5);

       return view('etudiants.list',$data);
/*
         $vallist = "id";
            //vraag input van zoekbalk en option list
            $zoeknaam = '%' . $request->input('prenom') . '%';
           $vallist = $request->input('userfilter', 'id');
            //users uit database halen, paginate en where functie voor filteren
            $users['etudiants'] = Etudiant::where('prenom', 'like', $zoeknaam)
                ->orderBy($vallist)
                ->paginate(15);
           $result['etudiants']= compact('users');
            //Json::dump($result);

            //naar view met data
            return view('etudiants.list', $users);
*/
    }
    public function searchEtudiant(Request $request)
    {
        $search=$request->get('search');
        $etudiants=DB::table('etudiants')
            ->where('prenom', 'like', '%'.$search.'%')->paginate(5);
        return view('etudiants.list',compact('etudiants'));

    }
    public function editImage(){

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $matieres=DB::table('matieres')
            ->groupBy('nomMat')
            ->get();
            $groupes = DB::table('groupe_matiere')->get();

        // foreign goupe_matiere
        // $goupe_matieres = App\Matiere::find(1)->groupe_matiere;
            

        // $groupe_matiere = Matiere::join('groupe_matiere', 'matieres.id', '=', 'groupe_matiere.matiere')
        //        ->get(['matieres.*', 'groupe_matiere.groupe_matiere']);

        return view('etudiants.create',compact('matieres', 'groupes'));
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
        $request->validate([


        ]);

        $etudiant= new Etudiant();

        if ($files = $request->file('image')) {
            $destinationPath = public_path('image'); // upload path
            $profileImage = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage);
            $etudiant['image'] = $profileImage;

        }

        $etudiant['nom'] = $request->get('nom');
        $etudiant['prenom'] = $request->get('prenom');
        $etudiant['datenais'] = $request->get('datenais');
        $etudiant['numero_inscription'] = $request->get('numero_inscription');
        $etudiant['nomMat'] = $request->get('nomMat');
        $etudiant['groupe_etudiants'] = $request->get('groupe_etudiants');

        $validated = $request->except(['_token']);
        $etudiant->save();


        return Redirect::to('etudiants')
            ->with('success','Greate! Etudiant created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $etudiant=Etudiant::find($id);
        return view('etudiants.show',compact('etudiant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $matieres=DB::table('matieres')
            ->groupBy('nomMat')
            ->get();
        $etudiant= Etudiant::find($id);


        return view('etudiants.edit',compact('matieres','etudiant'));
    }

     function fetch(Request $request)
        {
            $select = $request->get('select');
            $value = $request->get('value');
            $dependent = $request->get('dependent');
            $data = DB::table('groupe_matiere')
                ->where($select, $value)
                ->groupBy($dependent)
                ->get();
            $output = '<option value="">Select '.ucfirst($dependent).'</option>';
            foreach($data as $row)
            {
                $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
            }
            echo $output;
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $etudiant=Etudiant::find($id);

        $etudiant['nom'] = $request->input('nom');
        $etudiant['prenom'] = $request->get('prenom');
        $etudiant['datenais'] = $request->get('datenais');
        $etudiant['numero_inscription'] = $request->get('numero_inscription');
        $etudiant['nomMat'] = $request->get('nomMat');
        $etudiant['groupe_etudiants'] = $request->get('groupe_etudiants');
        if ($request->hasfile('image')){
            $file=$request->file('image');
            $destinationPath = public_path('image'); // upload path
            $profileImage = $file->getClientOriginalName();
            $file->move($destinationPath, $profileImage);
            $etudiant['image'] = $profileImage;
        }
        $etudiant->save();
        //$timetable->update($request->all());


        return Redirect::to('etudiants')
            ->with('success','Great! Etudiant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Etudiant::where('id',$id)->delete();

        return Redirect::to('etudiants')->with('success','Etudiant deleted successfully');
    }

}
