<?php

namespace App\Http\Controllers;

use App\Timetable;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Matiere;
use App\Models\Professeur;
use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $emplois=Timetable::latest()->paginate(5);
        return view('emplois.index',compact('emplois'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchEmploi(Request $request)
    {
        $search=$request->get('search');
        $emplois=DB::table('emplois')
            ->where('nomMat', 'like', '%'.$search.'%'
                             )->paginate(5);

        return view('emplois.index',compact('emplois'));

    }
    public function create()
    {
        //
        //$salles = Salle::all();
        $profs= Professeur::all();
        //$matieres= Matiere::with(['professeur', 'etudiants'])->get();
        $matieres=DB::table('matieres')
            ->groupBy('nomMat')
            ->get();
        $salles = DB::table('salles')
            ->groupBy('capacite')
            ->get();
        $periodes = DB::table('periodes_horaires')
            ->groupBy('periode')
            ->get();
        $creneaux = DB::table('creneau')
        ->groupBy('periode')
        ->get();
        return view('emplois.create',compact('salles','profs','matieres','periodes','creneaux'));

    }
    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('creneau')
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

    function fetch1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('salles')
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
    function fetch2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('matieres')
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $emplois = new Timetable;
        $emplois->nomMat = $request->nomMat;
        $emplois->nomSalle = $request->nomSalle;
        $emplois->nomProf = $request->nomProf;
        $emplois->date = $request->date;
        $emplois->horaire = $request->horaire;
        $emplois->groupe_etudiants = $request->groupe_etudiants;
        $emplois->capacite = $request->capacite;
        $emplois->periode = $request->periode;
        $emplois->save();

       // Timetable::create($request->all());

        return redirect()->route('emplois.index')
            ->with('success','Timetable created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $timetable,$id)
    {
        //
        $timetable=Timetable::findOrFail($id);
        return view('emplois.show',compact('timetable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $emploi = Timetable::findOrFail($id);
        $allEmplois=Timetable::all();

        $profs= Professeur::all();
        //$matieres= Matiere::with(['professeur', 'etudiants'])->get();
        $matieres=DB::table('matieres')
            ->groupBy('nomMat')
            ->get();
        $salles = DB::table('salles')
            ->groupBy('capacite')
            ->get();
        $periodes = DB::table('periodes_horaires')
            ->groupBy('periode')
            ->get();
        return view('emplois.edit',compact('salles','allEmplois','profs','matieres','periodes','emploi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $timetable)
    {
        //
        $timetable->update($request->all());

        return redirect()->route('emplois.index')
            ->with('success','Emploi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable,$id)
    {
        //
        $emploi = Timetable::findOrFail($id);


        $emploi->delete();

        return redirect()->route('emplois.index')
            ->with('success','Emploi deleted successfully');

    }
}
