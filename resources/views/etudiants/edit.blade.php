@extends('layouts.app')

@section('content')
    <div class="col-lg-12 margin-tb" style="margin-top: 10px">
        <div class=" text-center container" style="color: white; background-color:skyblue;
                        display: inline-block ">
            <div style="float: left;" class="">
                <a type="button" href="/etudiants"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
            </div>
            <h1 style=""><strong>Modification des informations de l'Etudiant {{ $etudiant->prenom }}</strong></h1>

        </div>
    </div>
    <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST" name="update_product"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')

        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nom</strong>
                    <input type="text" name="nom" class="form-control" placeholder="" value="{{ $etudiant->nom }}">
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Prénom</strong>
                    <input type="text" name="prenom" class="form-control" placeholder="" value="{{ $etudiant->prenom }}">
                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Date de naissance</strong>
                    <input class="form-control" col="4" name="datenais" placeholder="" value="{{ $etudiant->datenais }}">
                    <span class="text-danger">{{ $errors->first('datenais') }}</span>
                </div>
            </div>

             <div class="col-md-12">
                <div class="form-group">
                    <strong>Numéro d'inscription</strong>
                    <input class="form-control" col="4" name="numero_inscription" placeholder="" value="{{ $etudiant->numero_inscription }}">
                    <span class="text-danger">{{ $errors->first('numero_inscription') }}</span>
                </div>
            </div>

            
            <div class="col-md-12">
                <strong>Matière</strong>
                <select  name="nomMat" id="nomMat" class="form-control input-sm custom-select div2 input-lg dynamic"
                         data-dependent="groupe_etudiants">
                    <option value="">Choisir une matière</option>
                    @foreach($matieres as $matiere)
                        <option  value="{{$matiere->nomMat}}" {{$matiere->nomMat==$etudiant->nomMat  ? 'selected': ''}}>{{$matiere->nomMat}}</option>
                    @endforeach
                </select>

                <span class="text-danger">{{ $errors->first('nomMat') }}</span>

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Groupe</strong>
                    <select  class="form-control input-sm div2 custom-select input-lg"
                             name="groupe_etudiants" id="groupe_etudiants">
                        <option value="{{$etudiant->groupe_etudiants}}">{{$etudiant->groupe_etudiants}}</option>
                    </select>                    <span class="text-danger">{{ $errors->first('groupe') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <strong>Etudiant Image</strong>

                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input"  value="{{$etudiant->image}}">
                        <label class="custom-file-label">Choisir un fichier</label>
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:10px;t">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
