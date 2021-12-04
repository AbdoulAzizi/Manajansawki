@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="float: right">
                <h2>Céer une nouvelle matière</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('matieres.index') }}"> Retour</a>
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

    <form action="{{ route('matieres.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="nomMat" class="form-control" placeholder="Nom de la Matière">
                </div>
            </div>
           

            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button style="float: right" type="submit" class="btn btn-primary">Créer</button>
            </div>
        </div>

    </form>
@endsection
