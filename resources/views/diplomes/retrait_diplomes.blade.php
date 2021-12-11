@extends('layouts.model', ['title'=> 'Administration', 'service'=>'Direction / الاتجاه'])
@section('content')
@endsection
@section('menu')
    <div style="text-align: left; margin-left: 10px; margin-top: 10px">
          @foreach($matieres as $matiere)
          <form action="/retraits" method="POST">
              {{csrf_field()}}
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="matiere" value="{{$matiere->nomMat}}">
            <button type="submit" class="btn btn-primary" style="width: 50%">{{$matiere->nomMat}}</button>
            </form>
            <br>
            @endforeach
    </div>
    @endsection


