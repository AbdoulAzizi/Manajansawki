@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('creneau.index') }}"> Retour</a>
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

    <form action="{{ route('creneau.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="col-sm-6">
                    <strong>Période:</strong>
                    <input type="text" class="form-control input-sm" name="periode" id="periode" value="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-sm-6">
                    <strong>Horaire:</strong>
                    <input class="form-control input-sm" name="horaire" id="horaire" value="" v-cloak placeholder="Format 00Hmin-00Hmin">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button style="float: right" type="submit" class="btn btn-primary">Créer</button>
            </div>


    </form>

@endsection
