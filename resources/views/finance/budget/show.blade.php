
@extends('layouts.app')

@section('content')
<div class="w3-container text-center">
    <div style="margin-top: 3%;background-color: midnightblue;color: white" class="border container" >
        <h2>Profile de {{$etudiant->nom}} {{$etudiant->prenom}} </h2>

    </div>


    <div class="w3-card-4 text-center" style="margin-top: 2%;margin-left: auto;
        margin-right: auto;">
        <header class="w3-container w3-light-grey">
            <h3 >CENTRE D'EDUCATION ET DE FORMATION</h3>
        </header>
        <div class="w3-container" >
           <h1><p style="font-family: 'Bodoni MT'">مركز التربية و التكوين دار الحي المسيرة - مرتيل </p></h1>
            <hr>
            <div style="float: left" class="border border-dark">
                <img src="{{url('image/'.$etudiant->image)}}" alt="Avatar" style="width:250px;height: 250px;">
            </div>
            <div style="float: left;margin-left: 100px;">
                <h3>
                <div>
                <p><strong>Nom:</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$etudiant->nom}} </p>
                </div>
                <div style="">
                    <p><strong>Prénom:</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$etudiant->prenom}} </p>
                </div>
                <div style="">
                    <p><strong>Date de naissaance:</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$etudiant->datenais}} </p>
                </div>
                <div style="">
                    <p><strong>Matière:</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$etudiant->matiere}} </p>
                </div>
                <div style="">
                    <p><strong>Groupe:</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$etudiant->groupe}} </p>
                </div>
                </h3>

            </div>
        </div>
        <div style="margin-top: 10px">
            <button class="w3-button w3-block" style="background-color: #764605; color: white">Dar EL Hay Massira</button>

        </div>
    </div>
</div>
@endsection
