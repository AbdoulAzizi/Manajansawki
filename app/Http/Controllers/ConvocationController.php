<?php

namespace App\Http\Controllers;

use App\Convocation;
use App\Etudiant;
use App\Examen;
use App\Models\Matiere;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConvocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $convocations=Convocation::latest()->paginate(5);
        return view('examens.convocations.index',compact('convocations'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchConvocation(Request $request)
    {
        $search=$request->get('search');
        $convocations=DB::table('convocations')
            ->where('nom', 'like', '%'.$search.'%')->paginate(5);
        return view('examens.convocations.index',compact('convocations'));

    }

    public function create()
    {
        //

        $matieres=DB::table('examens')
            ->groupBy('nomMat')
            ->get();
        $grp_etudiants=DB::table('examens')
            ->groupBy('groupe_etudiants')
            ->get();
        $etudiants=DB::table('etudiants')
            ->groupBy('nom')
            ->get();
        $allmatieres=Matiere::all();

        $examens = Examen::all();
        //$currentexamen = Examen::findOrFail();



        return view('examens.convocations.create',compact('examens',
            'allmatieres','etudiants','matieres','grp_etudiants'));

    }


    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('examens')
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
    function fetch12(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('etudiants')
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
        Convocation::create($request->all());

        return redirect()->route('convocations.index')
            ->with('success','Convocation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Convocation $convocation)
    {
        //
        return view('examens.convocations.show',compact('convocation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Convocation $convocation)
    {
        //
        $matieres=DB::table('matieres')
            ->groupBy('nomMat')
            ->get();
        $salles = Salle::all();
       // $examen=Examen::findOrFail($id);
       // $convocation=Convocation::findOrFail($id);



        return view('examens.convocations.edit',
            compact('convocation','matieres','salles'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convocation $convocation)
    {
        //
        $convocation->delete();

        return redirect()->route('convocations.index')
            ->with('success','Convocation deleted successfully');
    }
}
