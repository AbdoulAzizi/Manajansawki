@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="float: right">
                <h2>Modification de la Salle</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('salles.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salles.update',$salle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" value="{{$salle->nomSalle}}" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numéro:</strong>
                    <input class="form-control" value="{{$salle->numSalle}}"  name="num" placeholder="num">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Capacité:</strong>
                    <input class="form-control" value="{{$salle->capacite}}" name="capacite" placeholder="num">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Etage:</strong>
                    <input class="form-control" value="{{$salle->etage}}"  name="etage" placeholder="etage">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Connexion:</strong>
                    <input {{isset($salle['connexion'])&&$salle['connexion']=='Yes' ? 'checked' : ''}} id="connexion" value="Yes" type="checkbox" name="connexion">
                </div>
            </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>projecteur:</strong>

                            <input {{isset($salle['projecteur'])&&$salle['projecteur']=='Yes' ? 'checked' : ''}} id="projecteur" value="Yes" type="checkbox" name="projecteur">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button style="float: right" type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
    </form>
@endsection
