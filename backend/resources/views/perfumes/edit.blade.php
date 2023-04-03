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
                        <label for="" class="form-label">Cover Image</label>
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
                        <select name="brand" id="brand-select" class='mx-4'>
                            <option value="1" <?php if ($perfume->brand_id == 1) {
                                echo 'selected';
                            } ?>>Calvin Klein</option>
                            <option value="2" <?php if ($perfume->brand_id == 2) {
                                echo 'selected';
                            } ?>>Armani</option>
                            <option value="3" <?php if ($perfume->brand_id == 3) {
                                echo 'selected';
                            } ?>>Hermes</option>
                            <option value="4" <?php if ($perfume->brand_id == 4) {
                                echo 'selected';
                            } ?>>Dolce &amp; Gabbana</option>
                            <option value="5" <?php if ($perfume->brand_id == 5) {
                                echo 'selected';
                            } ?>>Paco Rabanne</option>
                        </select>
                        <input type="hidden" name="brand_id" id="brand-input" value="<?php echo $perfume->brand_id; ?>">

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
                        <label class="form-check-label" for="flexSwitchCheckDefault">Show</label>
                        <input onclick="checkboxClicked()" value='{{ $perfume->show }}' class="form-check-input"
                            type="checkbox" name="show" role="switch" id="flexSwitchCheckDefault"
                            {{ $perfume->show == 0 ? '' : 'checked' }}>
                    </div>

                    {{-- PULSANTI: SUBMIT E BACK TO DASHBOARD --}}
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Submit</button>

                        <button class="btn btn-warning m-3">
                            <a href="{{ route('perfumes.index') }}" class="text-decoration-none text-white">
                                Back to Perfumes
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

        const brandSelect = document.getElementById('brand-select');
        const brandInput = document.getElementById('brand-input');

        brandSelect.addEventListener('change', (event) => {
            const selectedOption = event.target.value;
            brandInput.value = selectedOption;
        });
    </script>

    {{-- <!-- Javascript Requirements -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\UpdatePerfumeRequest') !!} --}}
@endsection
