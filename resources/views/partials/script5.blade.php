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
                    url:"{{ route('convocations.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('#'+dependent).html(result);
                    }

                })
            }
        });

        $('#nomMat').change(function(){
            $('#groupe_etudiants').val('');
        });
        $('#groupe_etudiants').change(function(){
            $('#nomSalle').val('');
        });
        $('#nomSalle').change(function(){
            $('#date').val('');
        });
        $('#date').change(function(){
            $('#heure_debut').val('');
        });
        $('#heure_debut').change(function(){
            $('#heure_fin').val('');
        });
        $('#nom').change(function(){
            $('#prenom').val('');
        });



    });
</script>
