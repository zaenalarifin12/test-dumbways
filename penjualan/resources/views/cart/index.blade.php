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

        @forelse ($cartProduct as $item)
            <div class="col py-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset("sepeda/$item->image") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p>Price : Rp. {{ $item->price }}</p>
                        {{-- <p>Stock : {{ $item->stock }}</p> --}}
                        
                        <div class="container">
                            
                            <form action="{{ url("/cart/$item->idCartProduct") }}" method="post" style="display:block">
                                <input name="qty" type="text" class="form-control mb-4" value="{{ $item->quantity }}">
                                @method("PUT")
                                @csrf
                                
                                <button class="btn btn-primary mb-4" type="submit">update</button>
                            </form>
    

                            <form action="{{ url("/cart/$item->idCartProduct") }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger mb-4" type="submit">Batal</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>    
        @empty
            Keranjang Kosong
        @endforelse
            
        
        
    </div>


</div>

@endsection
