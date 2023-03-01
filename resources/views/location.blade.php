<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Location</h2>
        <form action="" id="teacherEntry" method="post">
            @csrf
            <div class="form-group">
                <label for="">Select Division</label>
                <select name="division" id="division" class="form-control">
                    <option value="">Select Division</option>
                    @foreach($divisions as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Select District</label>
                <select name="district" id="district" class="form-control">
                    
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Teacher Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="submit">Save</button>
            </div>
        </form>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#division").change(function(){
              var division = $(this).val();
              $("#district").empty();
              $.ajax({
                url: 'http://127.0.0.1:8000/api/districts/'+division,
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    var districts = response.districts;
                    var len = districts.length;

                    var str = '<option value="">Select District</option>';
                    for(var i=0; i< len; i++){
                        str += '<option value="'+districts[i].id+'">'+districts[i].name+'</option>';
                    }
                    $("#district").html(str);
                }
              });
            });
            $("#submit").click(function(e){
                e.preventDefault();
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/store-teacher/',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'division': $("#division").val(),
                        'district' : $("#district").val(),
                        'teacher_name': $("#name").val(),
                    },
                    success: function(res){
                        console.log(res);
                    }
                });
            });
        });
    </script>
</body>
</html>