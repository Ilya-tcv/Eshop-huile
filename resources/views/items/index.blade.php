<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <title>Huiles</title>
</head>
<body>
    {{-- Alerte si succès --}}
    @if (Session::has('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
        </div>
    @endif

    {{-- Boutons Admin --}}
    <a class="btn btn-primary m-3" href="{{url('/')}}">Back to main</a>
    <a class="btn btn-success" href="{{url('admin/create')}}">Add</a>
    <br>

    {{-- Cards --}}
    <div class="container">
        <div class="row mt-5 gy-3">

            @foreach ($items as $item)
            <div class="col-sm my-3">
                <div class="card h-100">
                    <img src="{{ Storage::url($item->img) }}" class="card-img-top" alt="{{$item->img}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">Prix : {{$item->price}}€</p>
                        <a href="{{url('admin/delete/' . $item->id)}}" class="btn btn-danger mr-2">Delete</a>
                        <a href="{{url('admin/edit/' . $item->id)}}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>





    <script>
        // Supprimer l'alerte après 3 secondes
        setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.classList.remove('show'); // Supprime la classe "show" pour déclencher l'animation de disparition
            setTimeout(function() {
                successAlert.remove(); // Supprime complètement l'élément après l'animation
            }, 200); // Délai pour attendre la fin de l'animation (200 millisecondes)
        }
    }, 3000); // 3000 millisecondes (3 secondes)
    </script>
</body>
</html>
