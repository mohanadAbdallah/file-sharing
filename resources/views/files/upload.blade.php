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
<div class="container">

    <div class="row">
        <div class="col-md-8" style="margin: 237px -30px auto 208px;">

            <form enctype="multipart/form-data"
                      action="{{route('file.upload')}}" method="post">
                    @csrf

                @if (session('link'))
                    <div class="alert alert-success">
                        {{ session('link') }}
                    </div>
                @endif

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <h3>Upload your Files here </h3>

                <label for="formFileLg" class="form-label">Upload Your File here.</label>
                <input class="form-control form-control-lg" id="formFileLg" type="file" name="file">

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Upload</button>
                    <a href="{{route('file.download.form')}}" class="btn btn-secondary">To Download Page</a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
