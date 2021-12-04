@extends('layouts.app')

@section('content')
    <div class="col-lg-12 margin-tb" style="margin-top: 15px">
        <div class=" text-center container" style="color: white; background-color:#764605;
                        display: inline-block ">
            <div style="float: left;" class="">
                <a type="button" href="/secretariat"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
            </div>
            <h1 style=""><strong>Création d'un nouveau Budget</strong></h1>

        </div>
    </div>

    <form action="{{ route('budgets.store') }}" method="POST" name="add_product" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Montant</strong>
                    <input type="number" name="montant" class="form-control" placeholder="">
                    <span class="text-danger">{{ $errors->first('montant') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nature du Montant</strong>
                    <input type="text" name="nature_montant" class="form-control" placeholder="">
                    <span class="text-danger">{{ $errors->first('nature_montant') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Date du versement</strong>
                    <input type="date" class="form-control" col="4" name="date" placeholder="">
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Heure</strong>
                    <input type="time" class="form-control" col="4" name="heure" placeholder="">
                    <span class="text-danger">{{ $errors->first('heure') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Commentaire</strong>
                    <textarea class="form-control" col="4" name="commentaire" placeholder=""> </textarea>
                    <span class="text-danger">{{ $errors->first('commentaire') }}</span>
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 10px">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
