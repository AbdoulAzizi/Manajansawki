@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-12 margin-tb">
            <div class="border text-center container" style="color: white; background-color:skyblue;
               display: inline-block ">
                <div style="float: left;" class="">
                    <a type="button" href=javascript:history.go(-1)><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                </div>
                <h1 style=""><strong>Liste des Salles</strong></h1>

            </div>
            <div class="col-md-4" style="display: inline-block;margin-top: 10px">
                <form action="/searchSalle" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </span>
                    </div>
                </form>
            </div>

            <div class="pull-right" style="float: right;margin-top: 10px">
                <a class="btn btn-success" href="{{ route('salles.create') }}"> Nouvelle Salle</a>
            </div>
        </div>
    </div>
    <p></p>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <tr class="bg-primary">
            <th>No</th>
            <th>Titre</th>
            <th>Numéro</th>
            <th>Capacite</th>
            <th>Étage</th>
            <th>Connexion</th>
            <th>Projecteur</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($salles as $salle)
            <tr>
                <td>{{ $salle->id }}</td>
                <td>{{ $salle->nomSalle }}</td>
                <td>{{ $salle->numSalle }}</td>
                <td>{{ $salle->capacite }}  places</td>
                <td>{{ $salle->etage }}</td>
                <td>
                    @if($salle->connexion==1)
                        <?php echo  'Oui'; ?>
                        @else
                        <?php echo  'Non'; ?>
                        @endif
                </td>
                <td>
                    @if( $salle->projecteur)
                        <?php echo  'Oui'; ?>
                    @else
                        <?php echo  'Non'; ?>
                    @endif
                </td>
                <td>
                    <form action="{{ route('salles.destroy',$salle->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('salles.show',$salle->id) }}">Voir</a>

                        <a class="btn btn-primary" href="{{ route('salles.edit',$salle->id) }}">Modifier</a>
                        @csrf
                        @method('delete')

                        <button type="submit" onclick="return confirm('Vous êtes sûr?')" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="float: right">
        {{$salles->links() }}

    </div>

@endsection
