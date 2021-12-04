<!DOCTYPE html>
<html>
<head>
    <title>Creneaux</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
    </style>
</head>
<body>
<br /> <br><br> <br><br>
<div class="container box">
    <form action="{{ route('creneaux.store') }}" method="POST">
        @csrf
    <h3 align="center">Création d'un nouveau Créneau</h3><br />
    <div class="form-group">
        <label for="periode" class="col-sm-3 control-label">Période</label>

        <select name="periode" id="periode" class="form-control input-lg dynamic custom-select" data-dependent="horaire">
            <option value="">Coisir une période</option>
            @foreach($periodes as $periode)
                <option value="{{ $periode->periode}}">{{ $periode->periode}}</option>
            @endforeach
        </select>
    </div>
    <br />
    <div class="form-group">
        <label for="heure" class="col-sm-3 control-label">Horaire</label>

        <select name="horaire" id="horaire" class="form-control input-lg custom-select">
            <option value="">Choisir une horaire</option>
        </select>
    </div>
    <br />
    {{ csrf_field() }}
    <br />
    <br />

        <div class=" col-sm-12 col-md-12 text-center" style="margin-bottom: 30px">
            <button style="margin-top: -50px; position: relative" type="submit" class="btn btn-primary">Créer</button>
        </div>
    </form>
</div>
</body>
</html>

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
