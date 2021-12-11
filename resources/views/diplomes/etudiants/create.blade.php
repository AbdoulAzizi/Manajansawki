@extends('layouts.app')

@section('content')
        <div class=" text-center container" style="color: white; background-color:#764605;
                        display: inline-block; margin-top:10px ">
            <div style="float: left;" class="">
                <a type="button" href="/secretariat"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
            </div>
            <h1 style=""><strong>Enregistrement d'une nouvelle</strong></h1>

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
          

        </div>
            <div class="col-md-6" style="margin-top: 10px;width 160px;float:right; paddin-right:0px">
            <button type="submit" class="btn btn-primary" style="float:right;width:150px ">Créer/ تأكيد</button>
        </div>
    </form>
@endsection
