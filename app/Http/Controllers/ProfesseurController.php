<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Models\Professeur;
use Illuminate\Support\Facades\DB;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profs=Professeur::latest()->paginate(5);
        return view('professeurs.index',compact('profs'))
            ->with('i',(request()->input('page',1)-1)*5);

    }
    public function searchProf(Request $request)
    {
        $search=$request->get('search');
        $profs=DB::table('professeurs')
            ->where('nomProf', 'like', '%'.$search.'%')->paginate(5);
        return view('professeurs.index',compact('profs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $matieres=Matiere::all();
        return view('professeurs.create',compact('matieres'));


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
        Professeur::create($request->all());

        return redirect()->route('profs.index')
            ->with('success','Professeur created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Professeur $professeur,$id)
    {
        //
        $professeur = Professeur::findOrFail($id);
        return view('professeurs.show',compact('professeur'));
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
        $professeur = Professeur::findOrFail($id);
        $matieres=Matiere::all();

        return view('professeurs.edit',compact('professeur','matieres'));

    }
    public function search(Request $request)
    {
        $search=$request->get('search');
        $profs=DB::table('professeurs')
            ->where('nomProf', 'like', '%'.$search.'%')->paginate(5);
        return view('professeurs.index',compact('profs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'nomProf' => 'required',

        ]);
        $professeur = Professeur::findOrFail($id);
        $professeur->update($request->all());
        return redirect()->route('profs.index')
            ->with('success','Professeur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professeur $professeur,$id)
    {
        //
        //
        $professeur = Professeur::findOrFail($id);

        $professeur->delete();

        return redirect()->route('profs.index')
            ->with('success','Professeur deleted successfully');
    }
}
