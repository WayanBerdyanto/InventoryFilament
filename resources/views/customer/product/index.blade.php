@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Barang</h1>
        <div class="row">
            @foreach($products as $items)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $items->nama }}</h5>
                            <p class="card-text">{{ $items->stok }}</p>
                            <p class="card-text">Price: Rp{{ number_format($items->harga, 0, ',', '.') }}</p>
                            <p class="card-text">{{ $items->deskripsi }}</p>
                            <a href="#" class="btn btn-primary">Sewa Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection