<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
<!-- Navigation-->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('files.uploadPage')}}">G.I.D</a>
    </div>
</nav>

<header class="masthead" style="background: {{asset('assets/img/bg-showcase-2.jpg')}} no-repeat center center;">

    <div class="container position-relative mb-5" >
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    @yield('upload')
                </div>
            </div>
        </div>
    </div>
    <div class="container position-relative mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    <h1 class="mb-5">Download Your File Via Link</h1>
                    @yield('download')
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Icons Grid-->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                    <h3>Fully Responsive</h3>
                    <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                    <h3>Bootstrap 5 Ready</h3>
                    <p class="lead mb-0">Featuring the latest build of the new Bootstrap 5 framework!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                    <h3>Easy to Use</h3>
                    <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item"><a href="#!" style="text-decoration: none;color: inherit">About</a></li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item"><a href="#!" style="text-decoration: none;color: inherit">Contact</a></li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item"><a href="#!" style="text-decoration: none;color: inherit">Terms of Use</a></li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item"><a href="#!" style="text-decoration: none;color: inherit">Privacy Policy</a></li>
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">&copy; G.I.D 2023. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item me-4">
                        <a href="#!"><i class="bi-facebook fs-3"></i></a>
                    </li>
                    <li class="list-inline-item me-4">
                        <a href="#!"><i class="bi-twitter fs-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!"><i class="bi-instagram fs-3"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/scripts.js')}}"></script>

<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
