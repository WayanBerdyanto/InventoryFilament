@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Barang</h1>
        <div class="row">
            @foreach($customer as $items)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $items->nama }}</h5>
                            <p class="card-text">{{ $items->email }}</p>
                            <p class="card-text">{{ $items->telepon }}</p>
                            <p class="card-text">{{ $items->alamat }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection