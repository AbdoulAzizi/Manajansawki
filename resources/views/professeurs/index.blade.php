@extends('layouts.dashboard',['titre'=> 'Liste des Professeurs',
 'searchLink'=>'searchProf'])
@section('dashboard')
    <div class="row" >
       @section('createLink')
        <a class="btn btn-success" href="{{ route('profs.create') }}">Nouveau Professeur</a>
        @endsection
       <table class="table table-bordered table-striped text-center" id="laravel_crud" >
         @csrf
               @method('PUT')
                   <thead style="background-color: #191970; color: #ffffff">

        <tr class="bg-primary">
            <th>No</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Matière</th>
            <th>Adresse</th>
            <th>Contact</th>
            <th width="250px">Action</th>
        </tr>
           </thead>
        <tbody>
        @foreach ($profs as $prof)
            <tr>
                <td>{{ $prof->id }}</td>
                <td>{{ $prof->nomProf }}</td>
                <td>{{ $prof->prenomProf }}</td>
                <td>{{ $prof->nomMat}} </td>
                <td>{{ $prof->adresse }}</td>
                <td>{{ $prof->contact }}</td>
                <td>
                    <form action="{{ route('profs.destroy',$prof->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('profs.show',$prof->id) }}">Voir</a>

                        <a class="btn btn-primary" href="{{ route('profs.edit',$prof->id) }}">Modifier</a>
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Vous êtes sûr?')" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="float: right">
        {{$profs->links() }}
    </div>
</div>
@endsection
