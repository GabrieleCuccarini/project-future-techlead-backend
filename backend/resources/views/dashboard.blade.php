@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fs-4 green-text my-4">Benvenuto <strong> {{ Auth::user()->username }}</h3>
            </div>
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Azioni
                </button>

                <div class="dropdown-menu bg-success">
                    @if ($perfumes->count() > 0)
                    <a class="dropdown-item text-center py-2 text-white" id='style-links' href="{{ route('perfumes.index') }}">
                        Shop
                    </a>
                    @endif
                    <a class="dropdown-item text-center py-2 text-white" id='style-links' href="{{ route('perfumes.create') }}">
                        Add a Perfume
                    </a>
                </div>
            </div>        
        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-6">
            <div class="card mt-5 bg-success text-white me-3">
                <div class="card-header fw-bold">{{ __('I Tuoi Dati') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table text-white">
                        <thead class="text-warning">
                            <tr>
                                <th>ID</th>
                                <th>Userame</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold">
                            <tr>
                                <td>{{ Auth::user()->id }}</td>
                                <td> {{ Auth::user()->username }}</td>
                                <td> {{ Auth::user()->email }}</td>
                                <td> {{ ( Auth::user()->isAdmin == 1) ? 'Admin' : 'User' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
