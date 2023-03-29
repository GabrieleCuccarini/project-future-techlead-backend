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
        <div class="col-12 mt-5 justify-content-center bg-form">

        {{-- INIZIO FORM --}}
            <form action=" {{route('perfumes.store') }} " class="row g-3 p-3 py-4" method="POST" enctype="multipart/form-data">
                @csrf

        {{-- INPUT NOME --}}
                <div class="col-md-6 col-sm-12">
                    <label for="text" class="form-label">Name *</label>
                    <input type="text" placeholder="Perfume name" class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror" id="" name="name" value="{{ $errors->has('name') ? '' : old('name') }}">

                    {{-- Messaggio  --}}
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

        {{-- INPUT IMMAGINE --}}
                <div class="col-md-6 col-sm-12">
                    <label for="" class="form-label">Cover Image * </label>
                    <input type="file"  class="form-control @error('cover_img') is-invalid @elseif('cover_img')  @enderror" name="cover_img" >
                    {{-- Messaggio  --}}

                    @error('cover_img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                
                    @enderror
                </div>

        {{-- INPUT DESCRIZIONE --}}
                <div class="col-12">
                    <label for="text" class="form-label">Brand *</label>
                    <input type="text" class="form-control  @error('brand') is-invalid @enderror" placeholder="Brand name" name="brand">{{ old('brand') }}

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

            {{-- INPUT INGREDIENTS--}}
                <div class="col-12">
                    <label for="quantity" class="form-label">Quantity *</label>
                    <input type="number" step='1' class="form-control  @error('ingredients') is-invalid @enderror" placeholder="Quantity (In Ml)" name="quantity">{{ old('quantity') }}</>

                    {{-- Messaggio  --}}
                    @error('ingredients')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @elseif(old('ingredients'))
                    <div class="valid-feedback">
                        Well done!
                    </div>
                    @enderror

                </div>

        {{-- INPUT PRICE --}}
                <div class="col-12">
                    <label for="" class="form-label">Price *</label>
                    <input type="number" step='.01' class="form-control @error('price') is-invalid @elseif(old('price')) is-valid @enderror"
                    name="price" value="{{ $errors->has('price') ? '' : old('price') }}" placeholder="Price" name="price" value="{{ $errors->has('price') ? '' : old('price') }}">

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
                

                {{-- HIDE --}}
                <div class="form-check form-switch m-left">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Show</label>
                    <input onclick="checkboxClicked()" class="form-check-input checked" type="checkbox" name="show" role="switch" id="flexSwitchCheckDefault">
                </div>


        {{-- PULSANTI: SUBMIT E BACK TO DASHBOARD --}}
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Submit</button>

                    <button class="btn bg-warning m-3">
                        <a href="{{route('perfumes.index')}}" class="text-decoration-none text-white">
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
  if (checkBox.checked == true){
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

    {!! JsValidator::formRequest('App\Http\Requests\StorePerfumeRequest') !!} --}}

@endsection
