@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-12 margin-tb">
            <div class="border text-center container" style="color: white; background-color:skyblue;
               display: inline-block ">
                <div style="float: left;" class="">
                    <a type="button" href=javascript:history.go(-1)><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                </div>
                <h1 style=""><strong>Liste des Créneaux</strong></h1>

            </div>
            <div class="pull-right" style="float: right;margin-top: 10px">
                <a class="btn btn-success" href="{{ route('creneaux.create') }}"> Nouveau Créneau </a>
            </div>
        </div>
    </div>
    <p></p>

    <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif -->

    <table class="table table-bordered table-striped">
        <tr class="bg-primary">
            <th>No</th>
            <th>Période</th>
            <th>Horaire</th>

            <th width="250px">Action</th>
        </tr>
        @foreach ($creneaux as $creneau)
            <tr>
                <td>{{ $creneau->id }}</td>
                <td>{{ $creneau->periode }}</td>
                <td>{{ $creneau->horaire }}</td>
                <td>
                    <form action="{{ action('CreneauController@destroy' ,$creneau->id)}}" method="POST" >
                        <a class="btn btn-info" href="{{ route('creneaux.show',$creneau->id) }}">Voir</a>

                        <a class="btn btn-primary" href="{{ route('creneaux.edit',$creneau->id) }}">Modifier</a>
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Vous êtes sûr?')" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="float: right">
        {{$creneaux->links() }}

    </div>

@endsection
