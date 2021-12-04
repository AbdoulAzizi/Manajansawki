@extends('layouts.dashboard',['titre'=> 'Liste des Etudiants',
 'searchLink'=>'searchEtudiant'])
@section('dashboard')
 <div class="row">
 @section('createLink')
 <a class="btn btn-success" style="font-weight:bold" href="{{ route('etudiants.create') }}"> Nouvel Etudiant</a>
 @endsection
            <table class="table table-bordered table-striped text-center" id="laravel_crud" >
                <thead style="background-color: #191970; color: #ffffff">
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Matière</th>
                    <th>Groupe</th>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($etudiants as $etudiant)
                    <tr >
                        <td>{{ $etudiant->id }}</td>
                        <td>
                            <img src="{{url('image/'.$etudiant->image)}}" alt=""  class="responsive-img left" style="text-align: center; width:40px;height: 40px">
                        </td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ date('d-m-Y', strtotime($etudiant->datenais)) }}</td>
                        <td>{{ $etudiant->nomMat }}</td>
                        <td>{{ $etudiant->groupe_etudiants }}</td>
                        <!-- <td>{{ date('d-m-Y', strtotime($etudiant->created_at)) }}</td> -->
                        <td>
                            <a href="{{ route('etudiants.show',$etudiant->id)}}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('etudiants.edit',$etudiant->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('etudiants.destroy', $etudiant->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $etudiants->links() !!}
        </div>
    </div>


@endsection

