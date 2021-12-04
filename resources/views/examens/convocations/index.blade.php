@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-12 margin-tb"  style="margin-top: 20px">
            <div class="border text-center container" style="color: white; background-color:skyblue;
               display: inline-block ">
                <div style="float: left;" class="">
                    <a type="button" href="/accueilexamen"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                </div>
                <h1 style=""><strong>Liste des convocations</strong></h1>

            </div>
            <div class="col-md-4" style="display: inline-block;margin-top: 10px">
                <form action="/searchConvocation" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </span>
                    </div>
                </form>
            </div>

            <div class="pull-right" style="float: right; margin-top: 10px">
                <a class="btn btn-success" href="{{ route('convocations.create')}}"> Nouvelle Convocation</a>
            </div>
        </div>
    </div>
    <p></p>

    <table class="table table-bordered table-striped text-center" style="font-family:Roboto" >
        <tr style="background-color: #191970; color: #ffffff">
            <th>No</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Matière</th>
            <th>Groupe Etudiants</th>
            <th>Salle</th>
            <th>Date</th>
            <th>Heure du début</th>
            <th>Heure de la fin</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($convocations as $convocation)
            <tr>
                <td>{{ $convocation->id }}</td>
                <td>{{ $convocation->nom }}</td>
                <td>{{ $convocation->prenom }}</td>
                <td>{{ $convocation->nomMat }}</td>
                <td>{{ $convocation->groupe_etudiants }}</td>
                <td>{{ $convocation->nomSalle }}</td>
                <td>{{ $convocation->date }}</td>
                <td>{{ $convocation->heure_debut }}</td>
                <td>{{ $convocation->heure_fin }}</td>
                <td>
                    <form action="{{ route('convocations.destroy',$convocation->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('convocations.show',$convocation->id) }}">Voir</a>

                        <a class="btn btn-primary" href="{{ route('convocations.edit',$convocation->id) }}">Modifier</a>
                        @csrf
                        @method('delete')

                        <button type="submit" onclick="return confirm('Vous êtes sûr?')" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="float: right">
        {{$convocations->links() }}

    </div>

@endsection
