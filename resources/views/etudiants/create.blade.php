@extends('layouts.app')

@section('content')
        <div class=" text-center container" style="color: white; background-color:#764605;
                        display: inline-block; margin-top:10px ">
            <div style="float: left;" class="">
                <a type="button" href="/secretariat"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
            </div>
            <h1 style=""><strong>Création du nouveau Etudiant</strong></h1>

        </div>
    <form action="{{ route('etudiants.store') }}" method="POST" name="add_product" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row" style="margin-top: 10px">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Nom/ الاسم العائلي</strong>
                    <input type="text" name="nom" class="form-control" placeholder="">
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Prénom/ الإسم الشخصي</strong>
                    <input type="text" name="prenom" class="form-control" placeholder="">
                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                </div>
            </div>

             <div class="col-md-6">
                <div class="form-group">
                    <strong>Numéro d'inscription/رقم التسجيل</strong>
                    <input type="text" name="numero_inscription" class="form-control" placeholder="رقم التسجيل">
                    <span class="text-danger">{{ $errors->first('numero_inscription') }}</span>
                </div>
            </div>

             <div class="col-md-6">
                <div class="form-group">
                    <strong>Télephone / الهاتف  </strong>
                    <input type="text" name="telephone" class="form-control" placeholder="Numéro de Télephone">
                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>Date de naissance/ تاريخ الإزدياد</strong>
                    <input type="date" class="form-control" col="4" name="datenais" placeholder="">
                    <span class="text-danger">{{ $errors->first('datenais') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Matière/ الشعبة</strong>
                    <select  name="nomMat" id="nomMat" class="form-control input-sm custom-select div2 input-lg dynamic"
                             data-dependent="groupe_etudiants">
                        <option value="">Choisir une matière</option>
                        @foreach($groupes as $groupe)
                            <option  value="{{$groupe->nomMat}}">{{$groupe->nomMat}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('matiere') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Groupe/ المجموعة</strong>
                        <select  class="form-control input-sm div2 custom-select input-lg"
                                 name="groupe_etudiants" id="groupe_etudiants">
                            <option value="">Choisir un groupe</option>
                        </select>

                    <span class="text-danger">{{ $errors->first('groupe') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <strong> Image Etudiant/ الصورة</strong>

                <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" placeholder="">
                    <label class="custom-file-label">Choisir un fichier</label>
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>
                </div>
            </div>

        </div>
             <div class="col-md-6" style="margin-top: 10px;width 160px;float:right; paddin-right:0px">
                <button type="submit" class="btn btn-primary" style="float:right;width:150px ">Créer/ تأكيد</button>
            </div>
    </form>
@endsection
