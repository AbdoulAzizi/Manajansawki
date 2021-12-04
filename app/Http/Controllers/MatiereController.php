<?php

namespace App\Http\Controllers;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchSalle(Request $request)
    {
        $search=$request->get('search');
        $salles=DB::table('salles')
            ->where('nomSalle', 'like', '%'.$search.'%')->paginate(5);
        return view('salles.index',compact('salles'));

    }
    public function index()
    {
        //
        $matieres=Matiere::latest()->paginate(5);
        return view('matieres.index',compact('matieres'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        
        return view('matieres.create');
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
            'nomMat' => 'required',
        ]);
        /*
        Salle::create([
            'nomSalle'=> $request->nomSalle,
            'numSalle'=> $request->numSalle,
            'capacite'=> $request->capacite,
            'etage'=> $request->etage,
            'connexion'=> $request->has('connexion'),
            'projecteur'=> $request->has('projecteur'),
        ]);
        Salle::where('id', '!=', $id)->update(['connexion' => 0]);
        */
        // $request['connexion'] = isset($request['connexion']) ? 1 : 0;

        Matiere::create($request->all());

        return redirect()->route('matieres.index')
            ->with('success','Votre matière est crée avec succès.');

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
        $matiere=Matiere::find($id);
        return view('matieres.show',compact('matiere'));
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
        $matiere=Matiere::find($id);
        return view('matieres.edit',compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salle $salle)
    {
        //
        $request->validate([
            'title' => 'required',
        ]);
        $request['connexion'] = isset($request['connexion']) ? 1 : 0;
        $request['projecteur'] = isset($request['projecteur']) ? 1 : 0;

        $salle->update($request->all());

        return redirect()->route('salles.index')
            ->with('success','Salle updated successfully');
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
        $matiere=Matiere::find($id);
        $matiere->delete();
        return redirect()->route('matieres.index')
            ->with('success','Matière supprimée avec succès');
    }
}
