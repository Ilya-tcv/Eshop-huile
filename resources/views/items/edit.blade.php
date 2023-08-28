<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <h2>Modifier un produit</h2>

                {{-- FORM --}}
                <form class="mt-5" action="{{url('admin/update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    {{-- Normalement pas utile --}}
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <div class="my-3">
                        <label class="form-label">Nom :</label>
                        <input type="text" class="form-control" name="name" placeholder="{{$item->name}}" value="{{$item->name}}" id="">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label class="form-label">Prix :</label>
                        <input type="number" class="form-control" name="price" min="0" step=".01" placeholder="{{$item->price}}" value="{{$item->price}}" id="">
                        @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="my-4">
                        <label class="form-label">Image :</label>
                        <input type="file"  name="img" accept="image/*" value="{{$item->img}}" id="">
                        @error('img')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror

                    </div>
                    <button class="btn btn-primary" type="submit" href="{{url('admin/update')}}">Sauvegarder</button>
                    <a href="{{url('admin')}}" class="btn btn-danger">Retour</a>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
