@extends('layouts.app')

@section('content')
    <main class="container-fluid">
        <div class="container-fluid text-start">
            <button class="btn btn-warning m-3" class="text-decoration-none text-white">
                <a href="{{ route('perfumes.index') }}" class="text-decoration-none text-white">
                    Back to Perfumes
                </a>
            </button>
        </div>

        <div class="row mx-5">
            <div class="col-lg-4 col-md-8 col-sm-12 my-3">
                <div class="bg-form">
                    <div class="card h-100 bg-form">
                        <img src="{{ asset('storage/' . $perfume->cover_img) }}" class="card-img-top asp-ratio" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><b>ID: </b>{{ $perfume->id }}</h5>
                            <h5 class="card-title"><b>Name: </b>{{ $perfume->name }}</h5>
                            <p class="card-text"><b>Brand: </b>{{ $perfume->brand }}</p>
                            <p class="card-text"><b>Quantity: </b>{{ $perfume->quantity }} ml</p>
                            <p class="card-text"><b>Price: <span class='text-danger'>€{{$perfume->price}}</span></b></p>
                            <p><b>Show: </b>{{ $perfume->show == 1 ? 'on' : 'off' }}</p>

                            <div class="d-flex justify-content-evenly align-items-center mb-2">
                                <button class="btn btn-info"> <a href="{{ route('perfumes.edit', $perfume->slug) }}"
                                        class="text-decoration-none">Modifica</a></button>

                                    <form action="{{ route('perfumes.destroy', $perfume->id) }}" method="POST" id='form-delete'>
                                        @csrf
                                        @method('DELETE')
                                        <button class=" btn btn-danger text-white border-0" type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo profumo?')">Elimina</button>
                                    </form>
                                </form>
                            </div>
                        </div>

                        <script>
                            const form = document.getElementById("form-delete");
                            form.addEventListener("submit", function(e) {
                                e.preventDefault();
                                const conferma = confirm("Sei sicuro di voler cancellare questo profumo?");
                                if (conferma === true) {
                                    form.submit();
                                }
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection