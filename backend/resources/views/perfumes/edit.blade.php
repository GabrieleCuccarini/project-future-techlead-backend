@extends('layouts.app')

@section('content')
    <main class="m-5">
        {{-- validazione dati --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                These data aren't valid:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="row">
            <div class="col-lg-12 col-sm-12 mt-5 justify-content-center bg-form">

                {{-- INIZIO FORM --}}
                <form action=" {{ route('perfumes.update', $perfume->slug) }} " class="row g-3 p-3 py-4" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- INPUT NOME --}}
                    <div class="col-md-6">
                        <label for="text" class="form-label">Name</label>
                        <input type="text"
                            class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror"
                            id="" name="name" value="{{ old('name', $perfume->name) }}">

                        {{-- Messaggio  --}}
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @elseif(old('name'))
                            <div class="valid-feedback">
                                Well done!
                            </div>
                        @enderror

                    </div>

                    {{-- INPUT IMMAGINE --}}
                    <div class="col-md-6">
                        <label for="" class="form-label">Immagine di copertina</label>
                        <input type="file"
                            class="form-control @error('cover_img') is-invalid @elseif('cover_img')  @enderror"
                            name="cover_img">
                        {{-- Messaggio  --}}
                        @error('cover_img')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- INPUT BRAND --}}
                    <div class="col-12">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control  @error('brand') is-invalid @enderror" name="brand"
                            value="{{ old('brand', $perfume->brand) }}">

                        {{-- Messaggio  --}}
                        @error('brand')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @elseif(old('brand'))
                            <div class="valid-feedback">
                                Well done!
                            </div>
                        @enderror
                    </div>

                    {{-- INPUT QUANTITY --}}
                    <div class="col-12">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" step='1' class="form-control  @error('quantity') is-invalid @enderror"
                            name="quantity" value={{ old('quantity', $perfume->quantity) }}>

                        {{-- Messaggio  --}}
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @elseif(old('description'))
                            <div class="valid-feedback">
                                Well done!
                            </div>
                        @enderror
                    </div>


                    {{-- INPUT PRICE --}}
                    <div class="col-12">
                        <label for="" class="form-label">Price</label>
                        <input type="number" step=".01"
                            class="form-control @error('price') is-invalid @elseif(old('price')) is-valid @enderror"
                            name="price" value="{{ old('price', $perfume->price) }}" id="">

                        {{-- Messaggio  --}}
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @elseif(old('price'))
                            <div class="valid-feedback">
                                Well done!
                            </div>
                        @enderror
                    </div>

                    <div class="form-check form-switch m-left">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Mostra</label>
                        <input onclick="checkboxClicked()" value='{{ $perfume->show }}' class="form-check-input"
                            type="checkbox" name="show" role="switch" id="flexSwitchCheckDefault"
                            {{ $perfume->show == 0 ? '' : 'checked' }}>
                    </div>

                    {{-- PULSANTI: SUBMIT E BACK TO DASHBOARD --}}
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Salva</button>

                        <button class="btn btn-warning m-3">
                            <a href="{{ route('perfumes.index') }}" class="text-decoration-none text-white">
                                Torna ai Piatti/Menu
                            </a>
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </main>

    <script>
        function checkboxClicked() {
            let checkBox = document.getElementById("flexSwitchCheckDefault");
            if (checkBox.checked == true) {
                checkBox.value = 1; // Imposta il valore a true
            } else {
                checkBox.value = 0; // Imposta il valore a false
            }
        }
    </script>

    {{-- <!-- Javascript Requirements -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\UpdatePerfumeRequest') !!} --}}
@endsection
