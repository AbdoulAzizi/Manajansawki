@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="float: right">
                <h2>Céer un nouveau groupe</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('groupes.index') }}"> Retour</a>
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

    <form action="{{ route('groupes.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Nom du groupe:</strong>
                    <input type="text" name="groupe_etudiants" class="form-control" placeholder="Nom du groupe">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>matière:</strong>
                    <select class="form-control" name="nomMat">
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->nomMat }}">{{ $matiere->nomMat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12" >
                <button style="float:right" type="submit" class="btn btn-primary">Créer</button>
            </div>
        </div>

    </form>
@endsection
