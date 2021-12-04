<?php

namespace App\Http\Controllers;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SalleController extends Controller
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
        $salles=Salle::latest()->paginate(5);
        return view('salles.index',compact('salles'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('salles.create');
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
            'nomSalle' => 'required',
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
        $request['connexion'] = isset($request['connexion']) ? 1 : 0;

        Salle::create($request->all());

        return redirect()->route('salles.index')
            ->with('success','Salle created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Salle $salle)
    {
        //
        return view('salles.show',compact('salle'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Salle $salle)
    {
        //
        return view('salles.edit',compact('salle'));

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
    public function destroy(Salle $salle)
    {
        //
        $salle->delete();

        return redirect()->route('salles.index')
            ->with('success','Salle deleted successfully');
    }
}
