<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="container p-5 rounded-5 border shadow-sm" style="width: 550px;">
            <div class="d-flex flex-column align-items-center justify-content-center" style="width: 100%; height: 100%;">
                <h4 class="mb-4">Register</h4>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Validate Invalid</strong>
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container">
                    @if (session('pesan'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>{{session('pesan')}}</strong>
                        </div>
                    @endif
                    <form action="/register" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-2 d-flex flex-column">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-4 flex-column">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <input type="username" name="username" class="form-control" id="username">
                            </div>
                            <div class="mb-4 d-flex flex-column">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <input type="password" name="password" class="mb-2 form-control" id="password">
                            </div>
                            <div class="mb-4">
                                <button class="btn rounded-3 w-100" style="background-color: rgb(61, 144, 215); color: white;">Register</button>
                            </div>
                            <div class="d-flex justify-content-center text-center">
                                <label for=""><a class="text-decoration-none" href="/login">Login</a></label>
                            </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>