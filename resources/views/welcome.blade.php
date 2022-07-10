<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css" />
    <title>Seekex</title>
</head>
<body>
    <div class="container">
        <div class="mb-4 mt-4">
            {{-- <h1>Seekex Technologies</h1>
            <p>Stage 2</p> --}}
            <h2>Inputs : </h2>
        </div>
        <div class="row">
        <div class="col-4">
            <h5>1.Add the volume of the buckets</h5>
            <form action="#" id="form1">
                <div class="mb-3 mt-3">
                    <label class="form-label">A:</label>
                    <input type="number" class="col-3" name="A" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">B:</label>
                    <input type="number" class="col-3" name="B" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">C:</label>
                    <input type="number" class="col-3" name="C" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">D:</label>
                    <input type="number" class="col-3" name="D" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">E:</label>
                    <input type="number" class="col-3" name="E" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <button type="submit" class="btn btn-primary">Done</button>
              </form>
            
            </div>
        <div class="col-4">
            <h5>2. Add the volume of the balls</h5>
            <form action="#" id="form2">
                <div class="mb-3 mt-3">
                    <label class="form-label">A:Pink:</label>
                    <input type="number" class="col-3" name="A" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">B:Red</label>
                    <input type="number" class="col-3" name="B" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">C:Blue</label>
                    <input type="number" class="col-3" name="C" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">D:Orange</label>
                    <input type="number" class="col-3" name="D" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">E:Green</label>
                    <input type="number" class="col-3" name="E" required>
                    <label class="form-label">cubic inches</label>
                </div>
                <button type="submit" class="btn btn-primary">Done</button>
              </form>
        </div>
        <div class="col-4">
            <h5>3. Input the number of each colored
                ball to be placed inside the buckets:</h5>
                <form action="#" id="form3">
                    <div class="mb-3 mt-3">
                        <label class="form-label">A:Pink:</label>
                        <input type="number" class="col-3" name="A" required>
                        <label class="form-label">Ball</label>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">B:Red</label>
                        <input type="number" class="col-3" name="B" required>
                        <label class="form-label">Ball</label>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">C:Blue</label>
                        <input type="number" class="col-3" name="C" required>
                        <label class="form-label">Ball</label>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">D:Orange</label>
                        <input type="number" class="col-3" name="D" required>
                        <label class="form-label">Ball</label>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">E:Green</label>
                        <input type="number" class="col-3" name="E" required>
                        <label class="form-label">Ball</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Done</button>
                  </form>
        </div>
        </div>
        <div class="row mt-5">
            <button class="btn btn-success" id="solve">Solve</button>
        </div>
        <div class="row mt-5">
            <h2>Suggest : </h2>
            <div id="suggest"></div>
        </div>
    </div>
        
<script src="/jquery/dist/jquery.min.js" ></script>
<script src="/bootstrap/dist/js/bootstrap.min.js" ></script>
<script>
    var en1=false,
        en2=false,
        en3=false;

    $('#form1').submit(function(e){
        e.preventDefault();
       var el = e.target.elements;
        $.post('/bucketv',{
            _token:'{{ csrf_token() }}',
            A:el[0].value,
            B:el[1].value,
            C:el[2].value,
            D:el[3].value,
            E:el[4].value
        },function(res,status){
        if(status=="success")
            $(el[5]).fadeOut(500);
            en1=true;
        });
    });

    $('#form2').submit(function(e){
        e.preventDefault();
       var el = e.target.elements;
        $.post('/ballv',{
            _token:'{{ csrf_token() }}',
            A:el[0].value,
            B:el[1].value,
            C:el[2].value,
            D:el[3].value,
            E:el[4].value
        },function(res,status){
        if(status=="success")
            $(el[5]).fadeOut(500);
            en2=true;
        });
    });

    $('#form3').submit(function(e){
        e.preventDefault();
        var el = e.target.elements;
        $.post('/ballc',{
            _token:'{{ csrf_token() }}',
            A:el[0].value,
            B:el[1].value,
            C:el[2].value,
            D:el[3].value,
            E:el[4].value
        },function(res,status){
        if(status=="success")
            $(el[5]).fadeOut(500);
            en3=true;
        });
    });

    $('#solve').click(function(){
        if(en1&&en2&&en3)
        {
            $.post('/do',{
                _token:'{{ csrf_token() }}',
            },function(data,status){
                if(status=="success"){
                    $('#suggest').html(data);            }
            });
        }
        else{
            alert('Please check your inputs...')
        }
    });


</script>
</body>
</html>