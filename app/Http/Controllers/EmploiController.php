<?php

namespace App\Http\Controllers;

use App\Emploi;
use App\Models\Salle;
use App\Models\Matiere;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $emplois =Emploi::all();
        $task = new Emploi;
        $task->name = $request->name;
        $task->matiere = $request->matiere;
        $task->salle = $request->salles;
        $task->professeur = $request->prof;
        $task->date = $request->date;
        $task->heure = $request->heure;
        foreach ($emplois as $emploi)
        {
            if($emploi->professeur === $request->prof
                and $emploi->date === $request->date
                and $emploi->heure=== $request->heure
            ){
                return redirect('test')->with('warning', $request->prof.' a dejà un cours le même jour à la même heure');

            }

        }


        $task->save();

        return redirect('/test')->with('success', $task->name.' a été bien enregistré' );

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $cours = Emploi::findOrFail($id);
        $salles = Salle::all();
        $profs= Professeur::all();
        $matieres= Matiere::all();

        return view('pages/emploi/edit', compact('cours','id','matieres','profs','salles'));



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
          $count = 0;
        $emplois =Emploi::all();
        $cours=Emploi::find($id);

        foreach ($emplois as $emploi)
        {


            if($request->get('profs') === $emploi->professeur
                and $request->get('date') === $emploi->date
                and $request->get('heure') ===  $emploi->heure
                ){

                $count= $count+1;
            }


        }
        if ($count ==0 or $count==1 &&$request->get('profs')==$cours->professeur
        && $request->get('date')== $cours->date
        &&$request->get('heure')==$cours->heure){

            $cours->name=$request->get('name');
            $cours->matiere=$request->get('matiere');
            $cours->salle=$request->get('salles');
            $cours->professeur=$request->get('profs');
            $cours->date=$request->get('date');
            $cours->heure=$request->get('heure');

            $cours->save();

            return redirect('test')->with('success', $cours->name.' a été mis à jour');

        } else{

            return redirect('test')->with('warning', $request->profs.' a dejà un cours le même jour à la même heure');

        }


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
    }

    public function dateCompare(Request $request, $id){
        $emplois=Emploi::find($id);
        if($emplois->professeur === $request->get('profs')
        && $emplois->date === $request->get('date')){
            return view('pages/emploi/edit')->with('warning', $emplois->professeur.' a dejà un cours ce jour');

        }


    }
}
