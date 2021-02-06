@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="d-flex justify-content-between">
        <h1>Penjualan Sepeda</h1>

        <a href="{{ url("/cart") }}">
            <button class="btn btn-primary">My Cart</button>
        </a>
        
        <form action="{{ url("/logout") }}" method="post">
            <button class="btn btn-danger btn-sm" type="submit">Logout</button>
            @csrf
        </form>
        
    </div>
</div>

<div class="container py-4">

    <div class="row">

        @foreach ($cycle as $item)
            <div class="col py-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset("sepeda/$item->image") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p>Price : {{ $item->price }}</p>
                        <p>Stock : {{ $item->stock }}</p>
                        <p>Rp. {{ $item->price }}</p>
                        <form action="{{ url("cart") }}" method="post">
                            <input type="hidden" name="cycle_id" required value="{{ $item->id }}" >
                            <button type="submit" class="btn btn-primary float-right">Buy</a>
                                @csrf
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
