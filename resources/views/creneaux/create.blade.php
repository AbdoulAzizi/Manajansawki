@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('creneaux.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your input code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('creneaux.store') }}" method="POST">
        @csrf

        <div class="container box">
            <h3 align="center">Création d'un nouveau Créneau</h3><br />
            <div class="form-group">
                <select name="periode" id="periode" class="form-control custom-select input-lg dynamic " data-dependent="horaire">
                    <option value="">Coisir une période</option>
                    @foreach($periodes as $periode)
                        <option value="{{ $periode->periode}}">{{ $periode->periode}}</option>
                    @endforeach
                </select>
            </div>
            <br />
            <div class="form-group">
                <select name="horaire" id="horaire" class="form-control input-lg custom-select">
                    <option value="">Choisir une horaire</option>
                </select>
            </div>
            <br />
            {{ csrf_field() }}
            <br />
            <br />
        </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button style="float: right" type="submit" class="btn btn-primary">Créer</button>
            </div>


    </form>

@endsection

<script>
    $(document).ready(function(){

        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('testcreneau.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('#'+dependent).html(result);
                    }

                })
            }
        });

        $('#periode').change(function(){
            $('#horaire').val('');
        });


    });
</script>
