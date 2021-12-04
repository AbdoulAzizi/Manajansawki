<?php

namespace App\Http\Controllers;

use App\Models\Creneau;
use App\Horaire;
use App\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreneauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $creneaux=Creneau::latest()->paginate(5);
        //$creneaux=Creneau::all()->groupBy()
        return view('creneau.index',compact('creneaux'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $horaires =Horaire::all();
        //$periodes=Periode::with('horaire')->get();
        //$periodes = DB::table('periodes')->groupBy('periode')
        //   ->get();
        //$horaires = collect(json_decode($horaires, true));
        //$horaires = json_decode($horaires, true);

        return view('creneau.create');


    }
    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('periodes_horaires')
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
        Creneau::create($request->all());


        return redirect()->route('creneau.index')
            ->with('success','Creneau created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Creneau  $creneau
     * @return \Illuminate\Http\Response
     */
    public function show(Creneau $creneau)
    {
        //

        return view('creneau.show',compact('creneau'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Creneau  $creneau
     * @return \Illuminate\Http\Response
     */
    public function edit(Creneau $creneau)
    {
        //
        //$horaires =Horaire::all();
        // $periodes=Periode::all();
        $creneauxList =Creneau::all();

        return view('creneau.edit',compact('creneau','creneauxList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Creneau  $creneau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creneau $creneau)
    {
        //
        $request->validate([
            'horaire' => 'required',
            'periode' => 'required',
        ]);

        $creneau->update($request->all());

        return redirect()->route('creneau.index')
            ->with('success','Créneau updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Creneau  $creneau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creneau $creneau)
    {
        //
        $creneau->delete();

        return redirect()->route('creneau.index')
            ->with('success','Créneau deleted successfully');
    }
}
