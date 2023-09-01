<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>File Sharing</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

@include('layouts.partials.navbar')

<div class="container">

    <div class="row">
        <div class="col-md-8" style="margin: 150px -30px auto 208px;">

            <form
                action="{{route('files.upload')}}" method="post" enctype="multipart/form-data">
                @csrf

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <h3 class="mb-5">Enter the File you need to share. </h3>
                <label class="mb-1">Enter File Title : </label>
                <div class="input-group mb-3">

                    <input class="form-control" name="title" type="text" id="formFile">
                </div>

                <div class="input-group mb-3">
                    <input class="form-control" name="file" type="file" id="formFile">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-danger">Back</a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
