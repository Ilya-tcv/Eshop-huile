<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Huiles</title>
</head>
<body>
    {{-- Boutons Admin --}}
    <a class="btn btn-primary m-3" href="{{url('admin')}}">Admin</a>
    <br>


    {{-- CARTE EN ROW --}}
    <div class="container">
        <div class="row mt-5 gy-3">

            @foreach ($items as $item)
            <div class="col-sm-3 my-3">
                <div class="card h-100 d-flex flex-column">
                    <img src="{{ Storage::url($item->img) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="{{$item->img}}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">Prix : {{$item->price}}€</p>
                        <div class="flex-grow-1"></div>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</body>
</html>
