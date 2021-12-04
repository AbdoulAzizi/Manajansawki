@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
        <form action="{{ route('convocations.update',$convocation->id) }}" method="POST">
        @csrf
        {{ csrf_field() }}

        <!-- Task Name -->
            <div id="divG">

                <div class="border text-center container" style="color: white; background-color:skyblue;
                margin-top: 20px">
                    <div style="float: left;" class="">
                        <a type="button" href="/convocations"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                    </div>
                    <h1 style=""><strong>Modification de la convocation</strong></h1>

                </div>
                <div class="div1 border">

                    <div  class="form-group  col-sm-6">
                        <label for="matiere" class="col-sm-3 control-label">Matiere</label>

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
                        <label for="groups" class="col-sm-9 control-label">Groupe Etudiants</label>

                        <div id="c7" class="col-sm-6 ">
                            <select  class="form-control input-sm custom-select div2 input-lg dynamic"
                                     name="groupe_etudiants" id="groupe_etudiants" data-dependent="nomSalle">
                                <option value="">Choisir un groupe</option>
                            </select>
                        </div>
                    </div>

                    <div  class="form-group  col-sm-6">
                        <label for="salle" class="col-sm-3 control-label">Salle</label>

                        <div  id="c3" class="col-sm-6 ">
                            <select class="form-control input-sm custom-select div2 input-lg dynamic" name="nomSalle" id="nomSalle"
                                    data-dependent="date" data-dependent="date">
                                <option value="">Choisir la salle</option>
                            </select>
                        </div>
                    </div>





                </div>
                <div class="div1 border" id="ml">
                    <div  class="form-group  col-sm-6">
                        <label for="date" class="col-sm-3 control-label">Date</label>

                        <div  id="c3" class="col-sm-6 ">
                            <select class="form-control input-sm custom-select div2 input-lg dynamic" name="date" id="date"
                                    data-dependent="heure_debut">
                                <option value="">Choisir une date</option>
                            </select>
                        </div>

                    </div>


                    <div  class="form-group  col-sm-6">
                        <label for="heure_debut" class="col-sm-9 control-label">Heure du début</label>
                        <div id="c2" class="col-sm-6">
                            <select name="heure_debut" id="heure_debut" class="form-control input-sm custom-select div2 input-lg dynamic"
                                    data-dependent="heure_fin">
                                <option value="">Choisir une horaire</option>
                            </select>
                        </div>
                    </div>

                    <div  class="form-group  col-sm-6">
                        <label for="heure_debut" class="col-sm-9 control-label">Heure de la fin</label>
                        <div id="c2" class="col-sm-6">
                            <select name="heure_fin" id="heure_fin" class="form-control div2 dynamic input-lg custom-select">
                                <option value="">Choisir une horaire</option>
                            </select>
                        </div>
                    </div>



                {{ csrf_field() }}
                <!-- Add Task Button -->
                </div>
                <div class="border" style="position: absolute; margin-top: 300px;margin-left: 90px">
                    <div  class="form-group  col-sm-6" style="float: left">
                        <label for="salle" class="col-sm-9 control-label"> Nom Etudiant</label>

                        <div  id="c3" class="col-sm-6 ">

                            <select class="form-control input-sm custom-select div2 input-lg dynamic" name="nom" id="nom"
                                    data-dependent="prenom">
                                <option value="">choisir le nom</option>

                                    <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div  class="form-group  col-sm-6" style="float: right">
                        <label for="salle" class="col-sm-9 control-label"> Prénom Etudiant</label>

                        <div  id="c3" class="col-sm-6 ">
                            <select class="form-control input-sm custom-select div2 input-lg " name="prenom" id="prenom">
                                <option value="">choisir un le prénom</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div id="bt" class="form-group" style="position:relative;
                margin-top: 400px">
                    <div  class="col-sm-offset-3">
                        <button style=" width: 100px" type="submit" class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-plus"></i> Créer
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div id="bt" class="form-group" style="position:absolute;
                margin-top: 400px; margin-left: 30px">
            <div  class="col-sm-offset-3">
                <a type="submit" href="{{ route('convocations.index') }}" style=" width: 100px" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-plus"></i> Retour
                </a>
            </div>
        </div>
    </div>

@endsection
