@extends('layouts.app')
@section('content')
    <div class=" shadow p-1 mb-4  text-center container printcolor" style="color: white;background-color:#191970;
               display: inline-block;margin-top: 0px ">
        <div style="float: left;" class="NotPrint">
            <a class="NotPrint" type="button" href="{{ route('convocations.index') }}">
                <img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
        </div>
        <p style="font-size: 30px;"><strong>مركز التربية و التكوين دار الحي المسيرة</strong></p>

    </div>
    <div class="shadow p-4 mb-4 bg-white border" style="font-family: Roboto;font-size: 14px;">
        <div class="position" style="float: right"  >
            <img src="/images/logo.jpg" alt="HTML5 Icon"
                 style="width:128px;height:128px;">
        </div >
        <div class="position" style="float: left"  >
            <img src="/images/logo.jpg" alt="HTML5 Icon"
                 style="width:128px;height:128px;">
        </div >
        <div class="NotPrint" style="float: right;margin-top: 280px;position: absolute;
        margin-left: 750px">
            <button  class="btn btn-dark" onclick="myFunction()">Imprimer la Convocation</button>
        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left table-primary text-center con " style="margin-left: 60px; margin-right: 20px;
                    margin-top: 50px;color: white;background-color: #764605;">
                    <h2 class="printcolor" style="background-color: #764605;">  Convocation d'Examen</h2>
                </div>

            </div>
        </div>
        <div style="margin-left: 100px; margin-top: 30px">
            <p>Mr/Mme {{$convocation->nom}} {{$convocation->prenom}}, vous êtes cordialemnt invités à passer les examens
            écrits qui se débutéront le   {{ $convocation->date }} à {{ $convocation->heure_debut }}.</p>

        </div>

        <div class="row container" style="margin-left: 90px;margin-top: 20px">
            <div style="float: left">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom:</strong>
                        {{ $convocation->nom }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prénom:</strong>
                        {{ $convocation->prenom }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Matière:</strong>
                        {{ $convocation->nomMat }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Groupe Etudiants:</strong>
                        {{ $convocation->groupe_etudiants }}
                    </div>
                </div>
            </div>

            <div style="float: right; margin-left: 60px">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Salle:</strong>
                        {{ $convocation->nomSalle }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date:</strong>
                        {{ $convocation->date }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Heure du début:</strong>
                        {{ $convocation->heure_debut }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Heure de la fin:</strong>
                        {{ $convocation->heure_fin }}
                    </div>
                </div>
            </div>




        </div>

    </div>
@endsection
