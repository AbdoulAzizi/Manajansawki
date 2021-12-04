@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-12 margin-tb">
            <div class="border text-center container" style="color: white; background-color:skyblue;
               display: inline-block ">
                <div style="float: left;" class="">
                    <a type="button" href=javascript:history.go(-1)><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                </div>
                <h1 style=""><strong>Liste des Matieres</strong></h1>

            </div>
            <div class="col-md-4" style="display: inline-block;margin-top: 10px">
                <form action="/searchSalle" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </span>
                    </div>
                </form>
            </div>

            <div class="pull-right" style="float: right;margin-top: 10px">
                <a class="btn btn-success" href="{{ route('matieres.create') }}"> Nouvelle matière</a>
            </div>
             <div class="pull-right" style="float: right;margin-top: 10px; padding-right:10px;">
                <a class="btn btn-success" href="{{ route('groupes.create') }}"> Nouveau groupe</a>
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
            <th>Numéro</th>
            <th>Nom de la matière</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($matieres as $matiere)
            <tr>
                <td>{{ $matiere->id }}</td>
                <td>{{ $matiere->nomMat }}</td>
               
               
                <td>
                    <form action="{{ route('matieres.destroy',$matiere->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('matieres.show',$matiere->id) }}">Voir</a>

                        <a class="btn btn-primary" href="{{ route('matieres.edit',$matiere->id) }}">Modifier</a>
                        @csrf
                        @method('delete')

                        <button type="submit" onclick="return confirm('Vous êtes sûr?')" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="float: right">
        {{$matieres->links() }}

    </div>

@endsection
