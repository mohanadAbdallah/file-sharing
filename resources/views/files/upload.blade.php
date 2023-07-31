@extends('layouts.master')

@section('upload')

    <!-- Button trigger modal -->
    <form class="form-subscribe" id="contactForm"
          enctype="multipart/form-data" action="{{route('file.upload')}}" method="post">
        @csrf
        <div class="row" style=" margin: -62px -96px 144px 2px;">
            <div class="col-auto">

                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#get-link">
                    Get Transfer Link
                </button>

                <button class="btn btn-success btn-lg" id="submitButton" type="button" data-bs-toggle="modal"
                        data-bs-target="#send-email">Send Email Transfer
                </button>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success text-lg-start">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif
    @if (session('link'))
        <div class="alert alert-success text-lg-start">
            {{ session('link') }}
        </div>
    @endif


    <div class="modal fade" id="get-link" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{route('file.upload')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Upload File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark" style="text-align: left">
                        <h3 class="mb-5">Upload your Files here </h3>

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="title" name="title" placeholder="File Title">
                            <label for="title">File Title</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="file" style="padding: 20px 23px 2px 34px;
                            font-size: 15px;">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="send-email" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{route('file.upload.sendEmail')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Send File Link To Email</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark" style="text-align: left">
                        <h3>Share File Link with Others</h3>

                        <div class="form-floating mb-3">
                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="file" style="padding: 20px 23px 2px 34px;
                            font-size: 15px;">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title" placeholder="File Title">
                            <label for="title">File Title</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            <label for="email">Email To Send</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="message" class="form-control" id="message" name="message" placeholder="Email Message">
                            <label for="message">Message</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('download')

    <!-- Button trigger modal -->

    <form class="form-subscribe" id="contactForm"
          enctype="multipart/form-data" action="{{route('file.download')}}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <input class="form-control form-control-lg" id="emailAddress" name="path" type="text"
                       placeholder="Enter File Link"/>
            </div>
            <div class="col-auto">
                <button class="btn btn-secondary btn-lg" id="submitButton" type="submit">Download</button>
            </div>
        </div>

    </form>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{route('file.upload')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Upload File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark" style="text-align: left">
                        <h3>Upload your Files here </h3>
                        <label for="formFileLg" class="form-label">Upload Your File here.</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="file">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

{{--<div class="container">--}}

{{--    <div class="row">--}}
{{--        <div class="col-md-8" style="margin: 237px -30px auto 208px;">--}}

{{--            <form enctype="multipart/form-data"--}}
{{--                  action="{{route('file.upload')}}" method="post">--}}
{{--                @csrf--}}

{{--                @if (session('link'))--}}
{{--                    <div class="alert alert-success">--}}
{{--                        {{ session('link') }}--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                @if($errors->any())--}}
{{--                    @foreach($errors->all() as $error)--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            {{$error}}--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endif--}}

{{--                <h3>Upload your Files here </h3>--}}

{{--                <label for="formFileLg" class="form-label">Upload Your File here.</label>--}}
{{--                <input class="form-control form-control-lg" id="formFileLg" type="file" name="file">--}}

{{--                <div class="mt-4">--}}
{{--                    <button class="btn btn-primary" type="submit">Upload</button>--}}
{{--                    <a href="{{route('file.download.form')}}" class="btn btn-secondary">To Download Page</a>--}}
{{--                </div>--}}

{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
