@extends('layouts.app')

@section('contents')
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/sparepart2.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Sparepart</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Sparepart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="text-center">
        <h2>Menjual Berbagai Macam Sparepart</h2>
    </div>
    <div class="container-fluid py-5">
        <div class="row g-4">
            @foreach ($dataProduk as $row)
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white text-center p-4 position-relative">
                        @if ($row->is_best_seller)
                            <div
                                class="best-seller-label position-absolute top-0 start-0 bg-danger text-white px-2 py-1">
                                Best Seller
                            </div>
                        @endif
                        <img src="{{ $row->foto }}" class="img-fluid mb-3"
                            style="width: 350px; height:350px; object-fit:contain">
                        <h5 class="text-uppercase">{{ $row->nama_produk }}</h5>
                        <p class="mb-3"><strong>{{ 'Rp ' . number_format($row->harga, 0, ',', '.') }}</strong></p>
                        <p class="mb-3">Stok : {{ $row->stok }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @guest
        <!-- Tampilkan tombol "Login untuk Booking" jika user belum login -->
        <a href="{{ route('register.bengkel') }}"
            class="order_online btn btn-primary d-flex align-items-center justify-content-center mt-3">Login Untuk
            Pemesanan</a>
    @endguest
    @auth
        <!-- Tampilkan tombol "Booking" jika user sudah login -->
        <h5 class="text-uppercase d-flex align-items-center justify-content-center mt-3">Pemesanan Di Bawah Ini</h5>
        <!-- Tampilkan tombol WhatsApp jika user sudah login -->
        <a href="https://wa.me/62895618158063" target="_blank"
            class="order_online btn btn-primary d-flex align-items-center justify-content-center mt-3">
            <i class="fa fa-whatsapp" aria-hidden="true" style="margin-right: 5px;"></i> Chat via WhatsApp
        </a>
    @endauth
@endsection
