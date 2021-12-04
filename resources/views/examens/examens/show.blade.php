@extends('layouts.app')
@section('content')
 <div class="shadow p-4 mb-4 bg-white">
     <div class="NotPrint" style="float: right">
         <button  class="btn btn-dark" onclick="myFunction()">Imprimer la page</button>
     </div>
     <div class="NotPrint" style="float: right; margin-right: 10px" >
         <button      class="btn btn-success" onclick="myFunction()"><Générer></Générer> une convocation</button>
     </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right NotPrint" style="float: left">
                <a class="btn btn-primary" href="{{ route('examens.index') }}"> Retour</a>
            </div>
            <div class="pull-left table-primary text-center con" style="margin-left: 100px; margin-right: 20px">
                <h2> Détails de l'examen</h2>
            </div>

        </div>
    </div>

    <div class="row container" style="margin-left: 90px;margin-top: 20px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Matière:</strong>
                {{ $examen->nomMat }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Groupe Etudiants:</strong>
                {{ $examen->groupe_etudiants }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salle:</strong>
                {{ $examen->nomSalle }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                {{ $examen->date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Heure du début:</strong>
                {{ $examen->heure_debut }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Heure de la fin:</strong>
                {{ $examen->heure_fin }}
            </div>
        </div>


    </div>

 </div>
@endsection
