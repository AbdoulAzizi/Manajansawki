@extends('layouts.dashboard',['titre'=> 'Liste des Remises de diplômes',
 'searchLink'=>'searchEtudiant'])
@section('dashboard')
 <div class="row">
 @section('createLink')
 <a class="btn btn-success" style="font-weight:bold" href="{{ route('liste_retraits.create') }}"> Nouvelle Remise</a>
 @endsection
            <table class="table table-bordered table-striped text-center" id="laravel_crud" >
                <thead style="background-color: #191970; color: #ffffff">
                <tr>
                    <th>Nom Etudiant</th>
                    <th>Prénom Etudiant</th>
                    <th>Numero Diplome</th>
                    <th>date de Retrait</th>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($liste_remise_diplomes as $remise)
                    <tr >
                        <td>{{ $remise->nomEtudiant }}</td>
                        <td>{{ $remise->prenomEtudiant }}</td>
                        <td>{{ date('d-m-Y', strtotime($remise->dateRetrait)) }}</td>
                        <td>{{ $remise->numeroDiplome }}</td>
                        <!-- <td>{{ date('d-m-Y', strtotime($etudiant->created_at)) }}</td> -->
                        <td>
                            <a href="{{ route('etudiants.show',$remise->id)}}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('etudiants.edit',$remise->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('etudiants.destroy', $remise->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

