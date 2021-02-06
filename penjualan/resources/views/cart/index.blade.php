@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="d-flex justify-content-between">
        <a href="{{ url("/") }}">
            <button class="btn btn-primary">Kembali</button>
        </a>
        <h1>Keranjang</h1>
        
    </div>
</div>

<div class="container py-4">

    <div class="row">

        <form action="{{ url("/cart") }}" method="post">
            @method("PUT")
            @csrf

            @forelse ($cartProduct as $item)
                <div class="col py-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset("$item->image") }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p>Price : Rp. {{ $item->price }}</p>
                            {{-- <p>Stock : {{ $item->stock }}</p> --}}
                            
                            <p>Total : Rp. {{ $item->total }}</p>
                            
                            <input name="qty[]" type="text" class="form-control" value="{{ $item->quantity }}">
                            <br>
                            <input name="idCartProduct[]" type="hidden" value="{{ $item->idCartProduct }}">

                            <button class="btn btn-primary float-right" type="submit">update</button>
                        </div>
                    </div>
                </div>    
            @empty
                Keranjang Kosong
            @endforelse
            
        </form>
        
    </div>


</div>

@endsection
