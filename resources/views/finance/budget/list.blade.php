@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-12 margin-tb" style="margin-top: 10px">
                    <div class=" text-center container" style="color: white; background-color:#764605;
                        display: inline-block ">
                        <div style="float: left;" class="">
                            <a type="button" href="/finance"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                        </div>
                        <h1 style=""><strong>Liste des Budgets</strong></h1>

                    </div>


            <div class="col-md-4" style="display: inline-block;margin-top: 10px">
                <form action="/searchEtudiant" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </span>
                    </div>
                </form>
            </div>

            <div class="pull-right" style="float: right; margin-top: 10px">
                <a class="btn btn-success" href="{{ route('budgets.create') }}"> Nouveau Budget</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">

            <table class="table table-bordered table-striped text-center" id="laravel_crud" >
                <thead style="background-color: #191970; color: #ffffff">
                <tr>
                    <th>Id</th>
                    <th>Montant</th>
                    <th>Nature du Montant</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Commentaire</th>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($budgets as $budget)
                    <tr >
                        <td>{{ $budget->id }}</td>
                        <td>{{ $budget->montant }} DH</td>
                        <td>{{ $budget->nature_montant }}</td>
                        <td>{{ date('d-m-Y', strtotime($budget->date)) }}</td>
                        <td>{{ $budget->heure }}</td>
                        <td>{{ $budget->commentaire }}</td>
                        <!-- <td>{{ date('d-m-Y', strtotime($budget->created_at)) }}</td> -->
                        <td>
                            <a href="{{ route('budgets.show',$budget->id)}}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('budgets.edit',$budget->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('budgets.destroy', $budget->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $budgets->links() !!}
        </div>
    </div>
@endsection
