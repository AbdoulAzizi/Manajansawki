@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="float: right">
                <h2>Modification du  professeur</h2>
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

    <form action="{{ action('ProfesseurController@update',$professeur->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                        <input type="text" value="{{$professeur->nomProf}}" name="nomProf" class="form-control" placeholder="nom eseignant">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prénom:</strong>
                    <input type="text" value="{{$professeur->prenomProf}}" class="form-control"  name="prenomProf" placeholder="prénom enseignant">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Matiere:</strong>
                <select  name="nomMat" id="nomMat" class="form-control">
                    @foreach($matieres as $matiere)
                        <option value="{{$matiere->nomMat}}" {{$matiere->nomMat==$professeur->nomMat ? 'selected': ''}}>{{$matiere->nomMat}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adresse:</strong>
                    <input name="adresse" type="text" value="{{$professeur->adresse}}" class="form-control" id="adresse"  placeholder="Adresse">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact:</strong>
                    <input  type="text" value="{{$professeur->contact}}" class="form-control" id="contact" name="contact" placeholder="contact">
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button style="float: right" type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>

    </form>
@endsection
