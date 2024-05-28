<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TODO-HOME</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <style>
            body{
                margin: 5px;
            }
        </style>
        {{-- <h1>Welcome, {{ Auth::user()->name }}!</h1> --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <div class="row m-0">
            <section>
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </section>

            <section>
                <div class="row mt-5 ">
                    <div class="text-end">
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New Task</a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Task</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('task.store') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xxl-8">
                                                <div class="mb-3">
                                                    <input class="form-control" type="text" placeholder="ENTER TITLE" name="title" id="title" required>
                                                </div>
                                                @if ($errors->has('text'))
                                                    <div class="invalid-feedback">
                                                        Title Fiels Required.
                                                    </div>
                                                @else
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xxl-4">
                                                <div class="mb-3">
                                                    <select class="form-select" name="status" id="status" required>
                                                        <option value="to_do">TO-DO</option>
                                                        <option value="in_progress">IN-PROGRESS</option>
                                                        <option value="complete">COMPLETE</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('status'))
                                                    <div class="invalid-feedback">
                                                        Please Select Status.
                                                    </div>
                                                @else
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="exmpleFormControlTextarea1" class="form-label">DESCRIPTION</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" id="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Task</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                @livewire('task-livewire')
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>
