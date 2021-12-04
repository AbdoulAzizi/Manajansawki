@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-12 margin-tb">
            <div class="border text-center container" style="color: white; background-color:skyblue;
               display: inline-block ">
                <div class="col-lg-12 margin-tb">
                    <div class=" text-center container" style="color: white; background-color:skyblue;
               display: inline-block ">
                        <div style="float: left;" class="">
                            <a type="button" href=javascript:history.go(-1)><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                        </div>
                        <h1 style=""><strong>Détails des sessions</strong></h1>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <p></p>

    <table class="table table-bordered table-striped text-center" style="font-family:Roboto" >
        <tr style="background-color: #191970; color: #ffffff">
            <th>No</th>
            <th>Identifiant Utilisateur</th>
            <th>Adresse IP</th>
            <th>Appareil</th>
            <th>Dernière activité</th>
            <th width="250px">Action</th>
        </tr>
        @foreach($sessions as $session)
            <tr>
                <td>{{ $session->id }}</td>
                <td>{{$session->user_id  }}</td>
                <td>{{  $session->ip_address }}</td>
                <td>{{ $session->user_agent }}</td>
                <td>{{ $session->last_activity}}</td>

                <td>
                    <form action="{{ route('sessions.destroy',$session->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('sessions.show',$session->id) }}">Détails</a>
                        @csrf
                        @method('delete')

                        <button type="submit" onclick="return confirm('Vous êtes sûr?')" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="float: right">
        {{$sessions->links() }}

    </div>

@endsection
