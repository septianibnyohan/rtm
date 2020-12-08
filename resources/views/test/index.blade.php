<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Dropdown Example</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
 
    <select id="ddl1">
        <option value="1">Normal</option>
        <option value="2">High</option>
      </select>

      <select id="ddl2">
      @foreach($list_suhu as $suhu) 
            <option value="{{ $suhu->id}}">{{ $suhu->ldr }}</option>
        @endforeach
      </select>

      <script>
          $('#ddl1').change(function(){
            var val = $('#ddl1').val();
            $("#ddl2").html("");

            $.ajax({
                url:"/test_getsuhu",
                type:"get",
                dataType: 'json',
                data:{type:val},
                success: function(data) {
                    //console.log(data);
                    $.each(data, function( index, value ) {
                        console.log(value);

                        $("#ddl2").append('<option value="'+value.id+'">'+value.ldr+'</option>');
                    });
                }
            });

          });
      </script>
</body>
</html>