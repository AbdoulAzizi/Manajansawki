@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="float: right">
                <h2>Céer un nouveau professeur</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('profs.index') }}"> Retour</a>
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

    <form action="{{ route('profs.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="nomProf" class="form-control" placeholder="nom eseignant">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prénom:</strong>
                    <input type="text" class="form-control"  name="prenomProf" placeholder="prénom enseignant">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Matiere:</strong>
                    <select  name="nomMat" id="nomMat" class="form-control">
                        <option value="">Choisir une matière</option>
                        @foreach($matieres as $matiere)
                            <option  value="{{$matiere->nomMat}}">{{$matiere->nomMat}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adresse:</strong>
                    <input type="text" class="form-control"  name="adresse" placeholder="Adresse">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact:</strong>
                    <input type="text" class="form-control"  name="contact" placeholder="contact">
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button style="float: right" type="submit" class="btn btn-primary">Créer</button>
            </div>
        </div>

    </form>
@endsection
