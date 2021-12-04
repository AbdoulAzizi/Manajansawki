<?php

namespace App\Http\Controllers;
use App\Groupes;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupesController extends Controller
{
    //

     public function index()
    {
        //
        $groupes=Groupes::latest()->paginate(5);
        $matieres= Matiere::all();
        return view('groupes.index',compact('groupes', 'matieres'))->with('i',(request()->input('page',1)-1)*5);
    }

     public function create()
    {
        //

        // get all matieres
        $matieres = DB::table('matieres')->get();

        return view('groupes.create',compact('matieres'));
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
            'groupe_etudiants' => 'required',           
        ]);

         

        Groupes::create($request->all());

        return redirect()->route('groupes.index')
            ->with('success','Le groupe est créé avec succès.');

    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Groupes $groupe)
    {
        //
        return view('groupes.show',compact('groupe'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Groupes $groupe)
    {
        //
        $matieres = DB::table('matieres')->get();
        return view('groupes.edit',compact('groupe','matieres'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groupes $groupe)
    {
        //
        $request->validate([
            'groupe_etudiants' => 'required',           
        ]);

        $groupe->update($request->all());

        return redirect()->route('groupes.index')
            ->with('success','Le groupe est mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groupes $groupe)
    {
        //
        $groupe->delete();

        return redirect()->route('groupes.index')
            ->with('success','Le groupe est supprimé avec succès.');
    }
   
   


}
