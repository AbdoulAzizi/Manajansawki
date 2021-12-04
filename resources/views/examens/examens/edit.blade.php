@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb"  style="margin-top: 20px">
            <div class="pull-left" style="float: right">
                <h2>Modification de l'examen</h2>
            </div>
            <div class="pull-right"  style="margin-left: 40px">
                <a class="btn btn-primary" href="{{ route('examens.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form  action="{{ action('ExamenController@update',$examen->id) }}" method="POST">

        @csrf
        @method('PUT')
        <!-- Task Name -->
            <div id="divG">

                <div class="div1 border">

                    <div  class="form-group  col-sm-6">
                        <label for="nomMat" class="col-sm-3 control-label">Matiere</label>

                        <div id="c6" class="col-sm-6">
                            <select  name="nomMat" id="nomMat" class="form-control input-sm custom-select div2 input-lg dynamic"
                                     data-dependent="groupe_etudiants">
                                <option value="">Choisir une matière</option>
                                @foreach($matieres as $matiere)
                                    <option  value="{{$examen->nomMat}}" {{$matiere->nomMat==$examen->nomMat  ? 'selected': ''}}>{{$matiere->nomMat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div  class="form-group  col-sm-6">
                        <label for="groups" class="col-sm-9 control-label">Groupe Etudiants</label>

                        <div id="c7" class="col-sm-6 ">
                            <select  class="form-control input-sm div2 custom-select input-lg"
                                     name="groupe_etudiants" id="groupe_etudiants">
                                <option value="{{$examen->groupe_etudiants}}" {{$examen->groupe_etudiants==$examen->groupe_etudiants  ? 'selected': ''}}>{{$examen->groupe_etudiants}}</option>
                            </select>
                        </div>
                    </div>


                    <div  class="form-group  col-sm-6">
                        <label for="salle" class="col-sm-3 control-label">Salle</label>

                        <div  id="c3" class="col-sm-6 ">
                            <select  class="form-control input-sm div2 custom-select input-lg"
                                     name="nomSalle" id="nomSalle">
                                @foreach($salles as $salle)
                                    <option value="{{$examen->nomSalle}}">{{$salle->nomSalle}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>



                </div>
                <div class="div1 border" id="ml">
                    <div  class="form-group  col-sm-6">
                        <label for="date" class="col-sm-3 control-label">Date</label>

                        <div class="col-sm-6">
                            <input value="{{$examen->date}}" id="div2" type="Date" name="date" id="date" class="form-control">
                        </div>
                    </div>



                    <div  class="form-group  col-sm-6">
                        <label for="heure" class="col-sm-9 control-label">Heure du début</label>
                        <div id="c2" class="col-sm-6">
                            <input value="{{$examen->heure_debut}}" id="div2" type="time" name="heure_debut" id="heure_debut" class="form-control">
                        </div>
                    </div>
                    <div  class="form-group  col-sm-6">
                        <label for="heure" class="col-sm-9 control-label">Heure de la fin</label>
                        <div id="c2" class="col-sm-6">
                            <input value="{{$examen->heure_fin}}" id="div2" type="time" name="heure_fin" id="heure_fin" class="form-control">
                        </div>
                    </div>

                @csrf
                {{ csrf_field() }}
                <!-- Add Task Button -->


                </div>
            </div>
            <div id="bt" class="form-group" style="position:relative;
                margin-top: 300px">
                <div  class="col-sm-offset-3">
                    <button style=" width: 100px" type="submit" class="btn btn-primary btn-lg btn-block">
                        <i class="fa fa-plus"></i> Modifier
                    </button>
                </div>
            </div>

        </form>
@endsection
