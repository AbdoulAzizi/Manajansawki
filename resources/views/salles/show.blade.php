@extends('layouts.app')
@section('content')
 <div class="shadow p-4 mb-4 bg-white">
     <div class="NotPrint" style="float: right">
         <button  class="btn btn-dark" onclick="myFunction()">Imprimer la page</button>

     </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div  class="pull-right NotPrint" style="float: left">
                <a class="btn btn-primary" href="{{ route('salles.index') }}"> Retour</a>
            </div>
            <div class="pull-left table-primary text-center con" style="margin-left: 100px; margin-right: 20px">
                <h2> Caractéristique de la Salle</h2>
            </div>

        </div>
    </div>

    <div class="row container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $salle->nomSalle }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Num:</strong>
                {{ $salle->numSalle }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Capacite:</strong>
                {{ $salle->capacite }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Etage:</strong>
                {{ $salle->etage }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Connexion:</strong>
                @if($salle->connexion==1)
                    <?php echo  'Oui'; ?>
                @else
                    <?php echo  'Non'; ?>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Projecteur:</strong>
                @if( $salle->projecteur)
                    <?php echo  'Oui'; ?>
                @else
                    <?php echo  'Non'; ?>
                @endif
            </div>
        </div>
    </div>
 </div>
@endsection
