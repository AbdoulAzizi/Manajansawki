@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-12 margin-tb" style="margin-top: 20px">
            <div class="border text-center container" style="color: white; background-color:skyblue;
               display: inline-block ">
                <div class="col-lg-12 margin-tb">
                    <div class=" text-center container" style="color: white; background-color:skyblue;
               display: inline-block ">
                        <div style="float: left;" class="">
                            <a type="button" href="/gestionEmploi"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                        </div>
                        <h1 style=""><strong>Création d'un nouvel Emploi</strong></h1>

                    </div>
                </div>

            </div>
            <div class="col-md-4" style="display: inline-block;margin-top: 10px">
                <form action="/searchEmploi" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </span>
                    </div>
                </form>
            </div>

            <div class="pull-right" style="float: right; margin-top: 10px">
                <a class="btn btn-success" href="{{ route('emplois.create') }}"> Nouvel Emploi</a>
            </div>
        </div>
    </div>
    <p></p>

    <table class="table table-bordered table-striped text-center" style="font-family:Roboto" >
        <tr style="background-color: #191970; color: #ffffff">
            <th>No</th>
            <th>Matière</th>
            <th>Salle</th>
            <th>Professeur</th>
            <th>Date</th>
            <th>Horaire</th>
            <th>Groupe</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($emplois as $emploi)
            <tr>
                <td>{{ $emploi->id }}</td>
                <td>{{ $emploi->nomMat }}</td>
                <td>{{ $emploi->nomSalle }}</td>
                <td>{{ $emploi->nomProf }}</td>
                <td>{{ $emploi->date }}</td>
                <td>{{ $emploi->horaire }}</td>
                <td>{{ $emploi->groupe_etudiants }}</td>
                <td>
                    <form action="{{ route('emplois.destroy',$emploi->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('emplois.show',$emploi->id) }}">Voir</a>

                        <a class="btn btn-primary" href="{{ route('emplois.edit',$emploi->id) }}">Modifier</a>
                        @csrf
                        @method('delete')

                        <button type="submit" onclick="return confirm('Vous êtes sûr?')" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="float: right">
        {{$emplois->links() }}

    </div>

@endsection
