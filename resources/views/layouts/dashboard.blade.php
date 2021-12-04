@extends('layouts.app')

@section('content')
 <div class="row">
 <div class="col-lg-12 margin-tb" style="margin-top: 10px">
                    <div class=" text-center container" style="color: white; background-color:#764605;
                        display: inline-block ">
                        <div style="float: left;" class="">
                            <a type="button" href="/secretariat"><img src="/images/retour_2.png" alt="HTML5 Icon" style="width:48px;height:48px;"></a>
                        </div>
                        <h1 style=""><strong> {{$titre}}</strong></h1>
                </div>



            <div class="col-md-4" style="display: inline-block;margin-top: 10px;padding-left:0px">

                <form action="/{{$searchLink}}" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </span>
                    </div>
                </form>
            </div>
             <div class="col-md-4"  style="display: inline-block;margin-top: 10px;padding-left:0px">
                <select class="form-control" name="userfilter" id="userfilter">
                    <option value="id">Sort By</option>
                    <option  {{ request()->prenom }} value="prenom">Prenom (asc)</option>
                    <option {{ request()->prenom }} value="prenom">Prenom (desc)</option>
                    <option  {{ request()->nom }} value="nom">nom (asc)</option>
                    <option  {{ request()->nom }} value="nom">nom (desc)</option>
                </select>
            </div>



            <div class="pull-right" style="float: right; margin-top: 10px">
            @yield('createLink')
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:10px">
     @yield('dashboard')
    </div>

@endsection
