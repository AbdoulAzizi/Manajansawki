<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{!! asset('DAR.png') !!}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>DarElHay-{{ $title ?? 'Center'}}</title>
</head>
<body>
<p></p>
<p></p>
<table  class="table table-bordered container" style="font-family:Roboto">
    <thead style="background-color: #191970; color: #ffffff">
    <tr>
        <th> ID </th>
        <th>Titre</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Professseur</th>
        <th>salle_id</th>
    </tr>
    </thead>

    <tbody>
    @foreach($cours as $cour )
        <td>{{ $cour->id }} </td>
        <td>{{ $cour->matiere->nomMat}} </td>
        <td>{{ $cour->date }}</td>
        <td>{{ $cour->heure }}</td>
        <td>{{$cour->professeur->nomProf }}</td>
        <td>{{ $cour->salle->nomSalle}}</td>
    </tbody>
    @endforeach
</table>
</body>
</html>
