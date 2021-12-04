@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
        <form  method="get" action="{{ action('EmploiController@update', $id ) }}" class="form-horizontal">
        @csrf
        {{ csrf_field() }}


        <!-- Task Name -->

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Titre</label>

                <div class="col-sm-6">

                    <input type="text" name="name" id="task-name" value="{{ $cours->name }}" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <label for="matiere" class="col-sm-3 control-label">Matiere</label>

                <div class="col-sm-6">
                    <select class="form-control input-sm" name="matiere" id="matiere">
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->nomMat}}">{{ $matiere->nomMat}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="salle" class="col-sm-3 control-label">Salle</label>

                <div class="col-sm-6 ">
                    <select class="form-control input-sm" name="salles" id="salles">
                        @foreach($salles as $salle)
                            <option value="{{ $salle->nomSalle }}" {{$salle->nomSalle==$cours->salle  ? 'selected': ''}}>{{ $salle->nomSalle}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="prof" class="col-sm-3 control-label">Professeur</label>

                <div class="col-sm-6">
                    <select class="form-control input-sm" name="profs" id="profs">
                        @foreach($profs as $prof)
                            <option value="{{ $prof->prenomProf.' '.$prof->nomProf}} " {{$prof->prenomProf.' '.$prof->nomProf==$cours->professeur  ? 'selected': ''}}>{{ $prof->prenomProf}}  {{ $prof->nomProf}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="date"  class="col-sm-3 control-label">Date</label>

                <div class="col-sm-6">
                    <input type="date" name="date" value="{{ $cours->date }}" id="date" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="heure" class="col-sm-3 control-label">Heure</label>

                <div class="col-sm-6">
                    <input type="time" name="heure" value="{{ $cours->heure }}" id="heure" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6 text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Mettre à jour
                    </button>
                </div>
            </div>


        </form>
    </div>

@endsection
