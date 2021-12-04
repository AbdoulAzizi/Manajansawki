<!DOCTYPE html>
<html>
<head>
    <title>Creneaux</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
<div class="">
    <form action="{{ route('emplois.store') }}" method="POST">
    @csrf
    {{ csrf_field() }}

    <!-- Task Name -->
        <div id="divG">
            <div class="div1 border">
                <div  class="form-group col-sm-6">
                    <label for="task" class="col-sm-3 control-label">Titre</label>

                    <div  class="col-sm-6" >
                        <input id="div2"  type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>
                <div  class="form-group  col-sm-6">
                    <label for="matiere" class="col-sm-3 control-label">Matiere</label>

                    <div  class="col-sm-6">
                        <select id="div2"  class="form-control input-sm" name="matiere" id="matiere">
                            @foreach($matieres as $matiere)
                                <option  value="{{ $matiere->nomMat}}">{{ $matiere->nomMat}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div  class="form-group  col-sm-6">
                    <label for="salle" class="col-sm-3 control-label">Salle</label>

                    <div class="col-sm-6 ">
                        <select id="div2" class="form-control input-sm" name="salles" id="salles">
                            @foreach($salles as $salle)
                                <option value="{{ $salle->nomSalle}}">{{ $salle->nomSalle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div  class="form-group  col-sm-6">
                    <label for="prof" class="col-sm-3 control-label">Professeur</label>

                    <div  class="col-sm-6">
                        <select id="div2" class="form-control input-sm" name="prof" id="prof">
                            @foreach($profs as $prof)
                                <option value="{{ $prof->prenomProf.' '.$prof->nomProf}}">{{ $prof->prenomProf}}  {{ $prof->nomProf}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="div1 border" id="ml">
                <div  class="form-group  col-sm-6">
                    <label for="date" class="col-sm-3 control-label">Date</label>

                    <div class="col-sm-6">
                        <input id="div2" type="Date" name="date" id="date" class="form-control">
                    </div>
                </div>

                <div  class="form-group  col-sm-6">
                    <label for="periode" class="col-sm-3 control-label">Période</label>
                    <div   id="c1" class="col-sm-6">
                        <select name="periode" id="periode" class="form-control div2 custom-select input-lg dynamic"
                                data-dependent="horaire">
                            <option value="">Coisir une période</option>
                            @foreach($periodes as $periode)
                                <option value="{{ $periode->periode}}">{{ $periode->periode}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div  class="form-group  col-sm-6">
                    <label for="heure" class="col-sm-3 control-label">Horaire</label>
                    <div id="c2" class="col-sm-6">
                        <select name="horaire" id="horaire" class="form-control div2 dynamic input-lg custom-select">
                            <option value="">Choisir une horaire</option>
                        </select>
                    </div>
                </div>
            {{ csrf_field() }}
            <!-- Add Task Button -->
                <div id="bt" class="form-group">
                    <div  class="col-sm-offset-3">
                        <button style=" width: 100px" type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Créer
                        </button>
                    </div>
                </div>

            </div>
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
