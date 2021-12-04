@extends('layouts.app')
@section('content')
    <div class="shadow p-4 mb-4 bg-white">
        <div class="NotPrint" style="float: right">
            <button  class="btn btn-dark" onclick="myFunction()">Imprimer la page</button>

        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right NotPrint" style="float: left">
                    <a class="btn btn-primary" href="{{ route('home') }}"> Retour</a>
                </div>
                <div class="pull-left table-primary text-center con" style="margin-left: 100px; margin-right: 20px">
                    <h2> Liste de sessions</h2>
                </div>

            </div>
        </div>

        <div class="row container">
        @foreach($userInfos as $userInfos)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Identifiant Utilisateur:</strong>
                    {{ $userInfos->user_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adresse IP:</strong>
                    {{ $userInfos->ip_address }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Appareil:</strong>
                    {{ $userInfos->user_agent }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dernière activité:</strong>
                    {{ $userInfos->last_activity }}
                </div>
            </div>

                <div  class="border border-dark text-center" style="width: 80%;" >
                </div>
            @endforeach
        </div>

    </div>
@endsection
