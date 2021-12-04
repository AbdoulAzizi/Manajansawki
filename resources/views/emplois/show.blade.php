@extends('layouts.app')
@section('content')
    <div class="shadow p-4 mb-4 bg-white">
        <div class="NotPrint" style="float: right">
            <button  class="btn btn-dark" onclick="myFunction()">Imprimer la page</button>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right NotPrint" style="float: left">
                    <a class="btn btn-primary" href="{{ route('emplois.index') }}"> Retour</a>
                </div>
                <div class="pull-left table-primary text-center con" style="margin-left: 100px; margin-right: 20px">
                    <h2> Détails de l'Emploi du Temps</h2>
                </div>

            </div>
        </div>

        <div class="row container">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Matière:</strong>
                    {{ $timetable->nomMat }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Salle:</strong>
                    {{ $timetable->nomSalle }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Professeur:</strong>
                    {{ $timetable->nomProf }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    {{ $timetable->date }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Horaire:</strong>
                    {{$timetable->horaire}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Groupe Etudiants:</strong>
                   {{$timetable->groupe_etudiants}}
                </div>
            </div>
        </div>
    </div>
@endsection
