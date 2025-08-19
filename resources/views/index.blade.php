<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadwow rounded-5 border shadow-sm" style="width: 500px;">
            <div class="card-body">
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
                <div class="col m-3">
                    <h4 class="mb-3">Task</h4>
                    <p class="mb-3">Hi <strong>{{ Auth::user()->name }}</strong> ini daftar tugasmu hari ini.</p>
                    <form action="{{ route('todos.store') }}" method="POST" class="mb-3 d-flex gap-2 align-items-start">
                        @csrf
                        <input type="text" name="title" class="form-control" placeholder="Add a new task">
                        <button type="submit" class="btn rounded-3 w-50" style="background-color: rgb(61, 144, 215); color: white;">Add Task</button>
                    </form>

                    <ul class="list-group mt-3">
                        @foreach($todos as $todo)
                            <li class="list-group-item d-flex align-items-center justify-content-between">
                                <form action="{{ route('todos.updateStatus', ['id' => $todo->id]) }}" method="POST">
                                    @csrf
                                    <input type="checkbox" onchange="this.form.submit()" {{ $todo->completed ? 'checked' : '' }}>
                                    <span class="{{ $todo->completed ? 'text-decoration-line-through' : '' }} ms-2">
                                        {{ $todo->title }}
                                    </span>
                                </form>
                                <a class="btn btn-danger" href="{{route('todos.delete', Crypt::encrypt($todo->id))}}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </li>
                        @endforeach
                        <a class="mt-3 text-decoration-none" href="/logout">Logout</a>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>