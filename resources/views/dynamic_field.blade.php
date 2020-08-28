<html>

<head>
<meta name="vieport" content="width=device-width, initial-scale=1">
<title>table</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/botstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    <br/>
    <h3 align="center">dynamically add/remove</h3>
    <br />
    <div class="table-responsive">
    <form method="GET" id="dynamic_form">
         <span id="result"></span>
         <table class="table table-bordered table-striped" id="user_table">
         <thead>
             <tr>
                 <th width="35%">First Name</th>
                <th width="35%">Last Name</th>
                <th width="35%">Action</th>

             </tr>
         </thead>

    <tbody>
<tr>
    <td><input type="text" name="first_name" id="first_name"></td>
    <td><input type="text" name="last_name" id="last_name"></td>

<td><input type="button" class="btn btn-primary" value="add" id="button"></td>
</tr>

    </tbody>
<tfoot>
<tr>
<td colspan="2" align="right">&nbsp</td>
<td>@csrf<input type="submit" name="save" id="save" class="btn btn-primary" value="Save"/></td>
</tr>
</tfoot>
    </table>
    </form>
    </div>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
    var count=1;
    function dynamic_field(number)
    {
        var html = '<tr>';
      dynamic_field(count);
        html += '<td><input type="text" name="first_name[]" class="form_control" /></td>';
        html += '<td><input type="text" name="last_name[]" class="form_control" /></td>';
if(number > 1)
{
    html += '<td><button type="button" name="remove" id="remove" class="btn btn-danger">remove</button></td></tr>';
    $('tbody').append(html);
}
else
{
    html += '<td><button type="button" name="add" id="add" class="btn btn-danger">add</button></td></td></tr>';
    $('tbody').html(html);

}
    }
    $('#add').click function(){
count++;
dynamic_field(count);
    });
    $(document).on('click', '#remove', function(){
        count--;
dynamic_field(count);
    });
    $('#dynamic_form').on('submit',function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("dynamic-field.insert") }}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(data)
            $('save').attr('disabled','disabled');
        },
        success:function(data)
            {
                if(data.error)
                {
                    var error_html='';
                    for(var count = 0; count< data.error.length;
                    count++)
                    {
                        error_html += '<p>' +data.error[count]+'
                        </p>';
                    }
                    $('#result').html('div class="alert alert-danger">'+error_html+'</div>');

                }
                else
                {
                    dynamic_field(1);
                    $('#result').html('div class="alert alert-success">'+data.success+'</div>');


                }
                $('#save').attr('disabled',false);
            }
        })
    });
});
    </script>
