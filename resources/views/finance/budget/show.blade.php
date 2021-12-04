@extends('layouts.app')
@section('content')
 <div class="shadow p-4 mb-4 bg-white">
     <div class="NotPrint" style="float: right">
         <button  class="btn btn-dark" onclick="myFunction()">Imprimer la page</button>

     </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div  class="pull-right NotPrint" style="float: left">
                <a class="btn btn-primary" href="{{ route('budgets.index') }}"> Retour</a>
            </div>
            <div class="pull-left table-primary text-center con" style="margin-left: 100px; margin-right: 20px">
                <h2> Détails du budget</h2>
            </div>

        </div>
    </div>

    <div class="row container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Numéro:</strong>
                {{ $budget->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nature du budget:</strong>
                {{ $budget->nature_montant }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Montant:</strong>
                {{ $budget->montant }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date du versement:</strong>
                {{ $budget->date}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Heure du versement:</strong>
                {{ $budget->heure}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Commentaire:</strong>
                {{ $budget->commentaire }}
            </div>
        </div>
    </div>
 </div>
@endsection
