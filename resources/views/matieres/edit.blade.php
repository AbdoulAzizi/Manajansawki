@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="float: right">
                <h2>Modification de la Matière</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('matieres.index') }}"> Retour</a>
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

    <form action="{{ route('matieres.update',$matiere->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" value="{{$matiere->nomMat}}" name="title" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button style="float: right" type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
    </form>
@endsection
