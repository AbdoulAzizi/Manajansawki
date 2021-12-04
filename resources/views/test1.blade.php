@extends('layouts.app')

@section('content')
    <div class="panel-body container ">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- TODO: Current Tasks -->
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 style="text-align: center;display: inline-block"> Emploi du Temps</h1>
                <div style="float: right">
                <a href="/createemploi">  <button  class=" btn btn-info">Créer un cours</button> </a>

                </div>
            </div>

            <div class="panel-body">
                <table class="table table-bordered table-striped ">

                    <!-- Table Headings -->
                    <thead class="bg-primary">
                    <th>Heure</th>
                    <th>Matiere</th>
                    <th>Salle</th>
                    <th>Professeur</th>
                    <th>Date</th>
                    <th>Cours</th>


                    <th class="text-center">Action</th>


                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $task->heure }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ $task->matiere }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $task->salle }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $task->professeur }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $task->date }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>




                            <td class="text-center">
                                <!-- TODO: Delete Button -->
                                <form action="/task/{{ $task->id }}" method="POST" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button onclick="return confirm('Vous êtes sûr?')" class=" btn btn-danger">Supprimer</button>
                                </form>
                                <a href="{{ action('EmploiController@edit', $task->id)}}" class=" btn btn-success">Modifier</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right">{{$tasks->links()}}</div>


            </div>
        </div>
    @endif
    </div>
@endsection
