<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>File Sharing</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

@include('layouts.partials.navbar')
<div class="container">

    <div class="row">
        <div class="col-md-10" style="margin: 100px 0px 0px 0px;">
            <form action="{{ route('files.deleteSelected') }}" method="POST">
                <table class="table table-dark table-striped text-center table-sm">
                    <thead>
                    <tr>
                        <th class="text-left">
                            <label for="select-all" style="margin: -21px 21px -28px -17px;">
                                Select All
                            </label>
                            <input type="checkbox" style="margin: 0px -50px 0px -5px;" class="ml-4" id="select-all">
                        </th>
                        <th scope="col">Title</th>
                        <th scope="col">uploaded at</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @csrf
                    @method('DELETE')
                    @foreach ($files as $file)
                        <tr>
                            <td>
                                <input type="checkbox" class="file-checkbox" name="selected_files[]"
                                       value="{{ $file->id }}">
                                {{ $file->name }}
                            </td>
                            <td class="align-middle">{{ $file->title }}</td>
                            <td class="align-middle">{{ $file->created_at }}</td>
                            <td class="align-middle ">
                                <a class="btn btn-sm text-success " href="{{ route('files.download', $file->file) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                    </svg>
                                </a>
                                <a class="btn btn-sm text-primary" href="{{ route('files.share', $file->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-amd" viewBox="0 0 16 16">
                                        <path
                                            d="m.334 0 4.358 4.359h7.15v7.15l4.358 4.358V0H.334ZM.2 9.72l4.487-4.488v6.281h6.28L6.48 16H.2V9.72Z"/>
                                    </svg>
                                </a>


                                <form class="d-inline-block" action="{{ route('files.destroy', ['id' => $file->id]) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm text-danger" type="submit"
                                            onclick="return confirm('Are you sure')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                                        </svg>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete All Files')">Delete Selected Files
                </button>
                <a href="{{route('files.uploadPage')}}" class="btn btn-primary">To Upload Page</a>
            </form>
        </div>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const $selectAllCheckbox = $('#select-all');
        const $checkboxes = $('.file-checkbox');
        $selectAllCheckbox.change(function () {
            $checkboxes.prop('checked', $selectAllCheckbox.prop('checked'));
        });
    });
</script>
</html>

