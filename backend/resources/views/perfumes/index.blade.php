@extends('layouts.app')

@section('content')
    @isset ( Auth::user()->isAdmin )
    <div class="container-fluid">
        <button class="btn bg-warning m-3 text-start">
            <a href="{{route('dashboard.index')}}" class="text-decoration-none text-white">
                Back to Dashboard
            </a>
        </button>
        <button class="btn btn-success text-center"> 
            <a href="{{route('perfumes.create')}}" class="text-decoration-none text-white">
                Add a Perfume
            </a>
        </button>
    </div>
    @endisset
    @if(count($perfumes) > 0)
    <div class='container-fluid mt-2' style="margin-right: 2.5rem;">
        {{ $perfumes->links() }}
    </div>
    <main class="container-fluid px-4 vh-100">
        <div class="row bg-add">
            @if(count($perfumes) > 0)
            <h1 class='mt-2'>Active Perfumes</h1>
            @foreach ( $perfumes as $perfume )
                @if($perfume->show == 1)
                    
                <div class="my-3 col-xl-3 col-lg-4 col-md-6 col-sm-10">
                    <div class="card h-100 bg-form">
                        <div class="card-header" style="border-bottom: 0;">
                            <h5 class="card-title mt-3 text-center"><b>{{$perfume->name}} {{$perfume->id}}</b></h5>
                            <div>
                                <div class="card card-body body-bg" style="border: 0;">
                                    <img src="{{ asset('storage/' . $perfume->cover_img) }}" class="card-img-top asp-ratio max200" alt="...">
                                    <div class="card-body" id="card-body">
                                        <h5 class="card-title text-center"><b></b></h5>
                                        <p class="card-text"><b class='text-grey'>Brand: </b>
                                            @if ($perfume->brand_id == 1)
                                            Calvin Klein
                                            @elseif ($perfume->brand_id == 2)
                                            Armani
                                            @elseif ($perfume->brand_id == 3)
                                            Hermes
                                            @elseif ($perfume->brand_id == 4)
                                            Dolce&Gabbana
                                            @elseif ($perfume->brand_id == 5)
                                            Paco Rabanne
                                            @endif
                                        </p>
                                        <p class="card-text"><b class='text-grey'>Quantity: </b>{{$perfume->quantity}} ml</p>
                                        <p class="card-text"><b>Price: <span class='text-danger'>€{{$perfume->price}}</span></b></p>
                                        <p><b class='text-grey'>Show: </b>{{$perfume->show == true ? 'on' : 'off'}}</p>
                                    </div>
                                    @isset ( Auth::user()->isAdmin )
                                    <div class="card-body d-flex justify-content-evenly">
                                        <button class="btn btn-primary text-white border-0"> <a href="{{route('perfumes.show', $perfume->slug)}}" class="text-decoration-none text-white">Open</a></button>

                                        <button class="btn btn-success text-white border-0"> <a href="{{route('perfumes.edit', $perfume->slug)}}" class="text-decoration-none text-white">Edit</a></button>

                                        <form action="{{ route('perfumes.destroy', $perfume->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class=" btn btn-danger text-white border-0" type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo profumo?')">Delete</button>
                                        </form>
                                    </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <h1 class='mt-1'>Disactive Perfumes</h1>
            @foreach ( $perfumes as $perfume )
                @if($perfume->show == 0)
                                    
                <div class="my-3 col-xl-3 col-lg-4 col-md-6 col-sm-10">
                    <div class="card h-100 bg-form">
                        <div class="card-header" style="border-bottom: 0;">
                            <h5 class="card-title mt-3 text-center"><b>{{$perfume->name}} {{$perfume->id}}</b></h5>
                            <div>
                                <div class="card card-body body-bg" style="border: 0;">
                                    <img src="{{ asset('storage/' . $perfume->cover_img) }}" class="card-img-top asp-ratio max200" alt="...">
                                    <div class="card-body" id="card-body">
                                        <h5 class="card-title text-center"><b></b></h5>
                                        <p class="card-text"><b class='text-grey'>Brand: </b>
                                            @if ($perfume->brand_id == 1)
                                            Calvin Klein
                                            @elseif ($perfume->brand_id == 2)
                                            Armani
                                            @elseif ($perfume->brand_id == 3)
                                            Hermes
                                            @elseif ($perfume->brand_id == 4)
                                            Dolce&Gabbana
                                            @elseif ($perfume->brand_id == 5)
                                            Paco Rabanne
                                            @endif
                                        </p>
                                        <p class="card-text"><b class='text-grey'>Quantity: </b>{{$perfume->quantity}} ml</p>
                                        <p class="card-text"><b>Price: <span class='text-danger'>€{{$perfume->price}}</span></b></p>
                                        <p><b class='text-grey'>Show: </b>{{$perfume->show == true ? 'on' : 'off'}}</p>
                                    </div>
                                    @if ( Auth::user()->isAdmin == 1 )
                                    <div class="card-body d-flex justify-content-evenly">
                                        <button class="btn btn-primary text-white border-0"> <a href="{{route('perfumes.show', $perfume->slug)}}" class="text-decoration-none text-white">Open</a></button>

                                        <button class="btn btn-success text-white border-0"> <a href="{{route('perfumes.edit', $perfume->slug)}}" class="text-decoration-none text-white">Edit</a></button>

                                        <form action="{{ route('perfumes.destroy', $perfume->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class=" btn btn-danger text-white border-0" type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo profumo?')">Delete</button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            </div>
            <div class='container-fluid mt-2' style="margin-right: 2.5rem;">
                {{ $perfumes->links() }}
            </div>
        @endif
    </main>
    @endif
@endsection

