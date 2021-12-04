<?php

namespace App\Http\Controllers;

use App\Examen;
use App\Models\Professeur;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accueilexamen()
    {
        //

        return view('examens.accueil');
    }
    public function searchExamen(Request $request)
    {
        $search=$request->get('search');
        $examens=DB::table('examens')
            ->where('nomMat', 'like', '%'.$search.'%')->paginate(5);
        return view('examens.examens.index',compact('examens'));

    }
    public function index()
    {
        //
        $examens=Examen::latest()->paginate(5);
        return view('examens.examens.index',compact('examens'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$matieres= Matiere::with(['professeur', 'etudiants'])->get();
        $matieres=DB::table('matieres')
            ->groupBy('nomMat')
            ->get();
        $salles = Salle::all();

        return view('examens.examens.create',compact('salles','matieres'));

    }
    function fetch(Request $request)
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
        Examen::create($request->all());

        return redirect()->route('examens.index')
            ->with('success','Examen created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        //
        return view('examens.examens.show',compact('examen'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $matieres=DB::table('matieres')
            ->groupBy('nomMat')
            ->get();
        $salles = Salle::all();
        $examen=Examen::findOrFail($id);


        return view('examens.examens.edit',
            compact('examen','matieres','salles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Examen $examen)
    {
        //

        $examen->update($request->all());

        return redirect()->route('examens.index')
            ->with('success','Examen updated successfully');
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
        $examen = Examen::findOrFail($id);


        $examen->delete();

        return redirect()->route('examens.index')
            ->with('success','Examen deleted successfully');
    }
}
