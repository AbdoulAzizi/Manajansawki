@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="float: right">
                <h2>Modification du crénau</h2>
            </div>
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

    <form action="{{ route('creneau.update',$creneau->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="col-sm-6">
                        <strong>Période:</strong>
                        <select class="form-control input-sm" name="periode" id="periode">
                            @foreach($creneauxList as $periode)
                                <option value="{{ $creneau->periode}} " {{$periode->periode==$creneau->periode  ? 'selected': ''}}>{{$periode->periode}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-sm-6">
                    <strong>Horaire:</strong>
                    <select class="form-control input-sm" name="horaire" id="horaire">
                        @foreach($creneauxList as $horaire)
                            <option value="{{ $horaire->horaire}} " {{$horaire->horaire==$creneau->horaire  ? 'selected': ''}}>{{$horaire->horaire}}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button style="float: right" type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>

    </form>
@endsection
