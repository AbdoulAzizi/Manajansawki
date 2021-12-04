@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
        <form action="{{ route('emplois.store') }}" method="POST">
        @csrf
        {{ csrf_field() }}

        <!-- Task Name -->
            <div id="divG">
                <div class="border text-center container" style="color: white; background-color:skyblue;
                ">
                    <h1 style=""><strong>Création d'un nouvel emploi</strong></h1>

                </div>
           <div class="div1 border">

               <div  class="form-group  col-sm-6">
                   <label for="nomMat" class="col-sm-3 control-label">Matiere</label>

                   <div id="c6" class="col-sm-6">
                       <select  name="nomMat" id="nomMat" class="form-control input-sm custom-select div2 input-lg dynamic"
                               data-dependent="groupe_etudiants">
                           <option value="">Choisir une matière</option>
                       @foreach($matieres as $matiere)
                               <option  value="{{$matiere->nomMat}}">{{$matiere->nomMat}}</option>
                           @endforeach
                       </select>
                   </div>
               </div>

               <div  class="form-group  col-sm-6">
                   <label for="capacite" class="col-sm-9 control-label">Capacite de la salle</label>

                   <div id="c4" class="col-sm-6 ">
                       <select  name="capacite" id="capacite" class="form-control input-sm custom-select div2 input-lg dynamic"
                               data-dependent="nomSalle">
                           <option value="">Choisir une capacité</option>
                           @foreach($salles as $salle)
                               <option value="{{ $salle->capacite}}">{{ $salle->capacite}}</option>
                           @endforeach
                       </select>
                   </div>
               </div>

               <div  class="form-group  col-sm-6">
                   <label for="salle" class="col-sm-3 control-label">Salle</label>

                   <div  id="c3" class="col-sm-6 ">
                       <select class="form-control div2 input-sm custom-select" name="nomSalle" id="nomSalle">
                               <option value="">Choisir la salle</option>
                       </select>
                   </div>
               </div>

               <div  class="form-group  col-sm-6">
                   <label for="prof" class="col-sm-3 control-label">Professeur</label>

                   <div id="c5"  class="col-sm-6">
                       <select  class="form-control input-sm div2" name="nomProf" id="nomProf">
                           <option>Choisir un Professeur</option>
                           @foreach($profs as $prof)
                               <option value="{{ $prof->prenomProf.' '.$prof->nomProf}}">{{ $prof->prenomProf}}  {{ $prof->nomProf}}</option>
                           @endforeach
                       </select>
                   </div>
               </div>

           </div>
            <div class="div1 border" id="ml">
                <div  class="form-group  col-sm-6">
                    <label for="date" class="col-sm-3 control-label">Date</label>

                    <div class="col-sm-6">
                        <input id="div2" type="Date" name="date" id="date" class="form-control">
                    </div>
                </div>

                <div  class="form-group  col-sm-6">
                    <label for="periode" class="col-sm-3 control-label">Période</label>
                    <div   id="c1" class="col-sm-6">
                        <select name="periode" id="periode" class="form-control div2 custom-select input-lg dynamic" data-dependent="horaire">
                            <option value="">Choisir une période</option>
                            @foreach($creneaux as $creneau)
                                <option value="{{ $creneau->periode}}">{{ $creneau->periode}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div  class="form-group  col-sm-6">
                    <label for="heure" class="col-sm-3 control-label">Horaire</label>
                    <div id="c2" class="col-sm-6">
                        <select name="horaire" id="horaire" class="form-control div2  input-lg custom-select">
                            <option value="">Choisir une horaire</option>
                        </select>
                    </div>
                </div>

                <div  class="form-group  col-sm-6">
                    <label for="groups" class="col-sm-9 control-label">Groupe Etudiants</label>

                    <div id="c7" class="col-sm-6 ">
                        <select  class="form-control input-sm div2 custom-select input-lg"
                                 name="groupe_etudiants" id="groupe_etudiants">
                                <option value="">Choisir un groupe</option>
                        </select>
                    </div>
                </div>
            {{ csrf_field() }}
                <!-- Add Task Button -->


            </div>
            </div>
            <div id="bt" class="form-group" style="position:relative;
                margin-top: 380px">
                <div  class="col-sm-offset-3">
                    <button style=" width: 100px" type="submit" class="btn btn-primary btn-lg btn-block">
                        <i class="fa fa-plus"></i> Créer
                    </button>
                </div>
            </div>

        </form>
        <div id="bt" class="form-group" style="position:absolute;
                margin-top: 380px; margin-left: 30px">
            <div  class="col-sm-offset-3">
                <a type="submit" href="{{ route('emplois.index') }}" style=" width: 100px" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-plus"></i> Retour
                </a>
            </div>
        </div>
    </div>

@endsection
