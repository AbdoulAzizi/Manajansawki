@extends('layouts.app')
@section('content')
 <div class="shadow p-4 mb-4 bg-white">
     <div class="NotPrint" style="float: right">
         <button  class="btn btn-dark" onclick="myFunction()">Imprimer la page</button>

     </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div  class="pull-right NotPrint" style="float: left">
                <a class="btn btn-primary" href="{{ route('groupes.index') }}"> Retour</a>
            </div>
            <div class="pull-left table-primary text-center con" style="margin-left: 100px; margin-right: 20px">
                <h2> Caractéristique du groupe</h2>
            </div>

        </div>
    </div>

    <div class="row container">
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom du groupe:</strong>
                {{ $groupe->groupe_etudiants }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>La matière affiliée</strong>
                {{ $groupe->nomMat }}
            </div>
    </div>
 </div>
@endsection
