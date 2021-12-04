@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-12 margin-tb" style="margin-top: 20px">
            <div class="border text-center container" style="color: white; background-color:skyblue;
               display: inline-block ">
                <div style="float: left;" class="">
                    <a type="button" href="/accueilexamen"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                </div>
                <h1 style=""><strong>Liste des Examens</strong></h1>

            </div>
            <div class="col-md-4" style="display: inline-block;margin-top: 10px">
                <form action="/searchExamen" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </span>
                    </div>
                </form>
            </div>

            <div class="pull-right" style="float: right;margin-top: 10px">
                <a class="btn btn-success" href="{{ route('examens.create') }}"> Nouveau Examen</a>
            </div>
        </div>
    </div>
    <p></p>


    <table class="table table-bordered table-striped">
        <tr class="bg-primary">
            <th>No</th>
            <th>Matière</th>
            <th>Groupe</th>
            <th>Salle</th>
            <th>Date</th>
            <th>Heure de début</th>
            <th>Heure de la fin</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($examens as $examen)
            <tr>
                <td>{{ $examen->id }}</td>
                <td>{{ $examen->nomMat }}</td>
                <td>{{ $examen->groupe_etudiants }} </td>
                <td>{{ $examen->nomSalle }}</td>
                <td>{{ $examen->date }}</td>
                <td>{{ $examen->heure_debut }}</td>
                <td>{{ $examen->heure_fin }}</td>

                <td>
                    <form action="{{ route('examens.destroy',$examen->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('examens.show',$examen->id) }}">Voir</a>

                        <a class="btn btn-primary" href="{{ route('examens.edit',$examen->id) }}">Modifier</a>
                        @csrf
                        @method('delete')

                        <button type="submit" onclick="return confirm('Vous êtes sûr?')" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="float: right">
        {{$examens->links() }}

    </div>

@endsection
