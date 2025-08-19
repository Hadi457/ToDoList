<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="container p-5 rounded-5 border shadow-sm" style="width: 550px;">
            <div class="d-flex flex-column align-items-center justify-content-center" style="width: 100%; height: 100%;">
                <h4 class="mb-4">Login</h4>
                <div class="container">
                    @if (session('pesan'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{session('pesan')}}
                        </div>
                    @endif
                    @if (session('pesanregist'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{session('pesanregist')}}
                        </div>
                    @endif
                    <form action="/login" method="POST">
                        @csrf
                            <div class="mb-2 flex-column">
                                <label for="username" class="col-sm-2 col-form-label">username</label>
                                <input type="username" name="username" class="form-control" id="username">
                            </div>
                            <div class="mb-4 d-flex flex-column">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <input type="password" name="password" class="mb-2 form-control" id="password">
                            </div>
                            <div class="mb-4">
                                <button class="btn rounded-3 w-100" style="background-color: rgb(51, 56, 160); color: white;">Login</button>
                            </div>
                            <div class="d-flex justify-content-center gap-3 text-center">
                                <label for=""><a class="text-decoration-none" href="/register">Register</a></label>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        @if (session('pesanregist'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                {{session('pesan')}}
            </div>
        @endif
        <h1 class="mt-5">Login</h1>
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="username" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <a href="/register">register</a>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div> --}}
</body>
</html>
<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>