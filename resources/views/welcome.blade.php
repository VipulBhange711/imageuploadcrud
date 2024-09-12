<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 bg-info">
                <h1>Image Crud In laravel</h1>

            </div>
        </div>
    

    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <input type="file" name="photo" accept=".jpg,.png,.jpeg">
                @error('photo')
                    <div class="alert alert-danger mb-1 mt-1">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-sm btn-primary">
            </div>
        </div>
    </form>

<div class="row">
    <div class="col-6">
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
    </div>
</div> 

    </div>

<div class="row">
    @foreach ($users as $user)
        
    @endforeach
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>