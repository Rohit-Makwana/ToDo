
@extends('layouts.app')

@section('content')
{{-- <div class=""> --}}
    {{-- <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form> --}}
    <div class="row p-2">
        <div class="col-12">
            @if (Session::has('status'))
                <div class="alert alert-success alert-block">
                    {{ Session::get('status') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-block">
                    {{ Session::get('error') }}
                </div>
            @endif
        </div>
    </div>
    
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
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
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
            {{-- <livewire:task-livewire /> --}}
        </section>
        <script>

        </script>
    </div>
{{-- </div> --}}
@endsection
