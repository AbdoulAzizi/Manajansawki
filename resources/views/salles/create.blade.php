@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="float: right">
                <h2>Céer une nouvelle salle</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('salles.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your input code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="nomSalle" class="form-control" placeholder="Nom de la salle">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numéro:</strong>
                    <input type="text" class="form-control"  name="numSalle" placeholder="numéro de la salle">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Capacité:</strong>
                    <input class="form-control" name="capacite" placeholder="nombre de place">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Etage:</strong>
                    <input class="form-control"  name="etage" placeholder="numéro de l'étage">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Connexion') !!}
                    {!! Form::checkbox('connexion', '1'); !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Projecteur') !!}
                    {!! Form::checkbox('projecteur', '1'); !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button style="float: right" type="submit" class="btn btn-primary">Créer</button>
            </div>
        </div>

    </form>
@endsection
