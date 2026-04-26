@extends('layout.admin.app')

@section('content')
    {{-- start main content --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Dashboard</h2>
            <p class="mb-0">Selamat datang di dashboard admin!</p>
        </div>
    </div>

    {{-- Statistik utama --}}
    <div class="row g-4 mb-4">
        {{-- Card Total Pelanggan --}}
        <div class="col-md-4 col-sm-12">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape bg-success text-white rounded-circle me-3">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Total Pelanggan</h6>
                            <h3 class="mb-0">{{ $totalPelanggan }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Total User --}}
        <div class="col-md-4 col-sm-12">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape bg-info text-white rounded-circle me-3">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Total User</h6>
                            <h3 class="mb-0">{{ $totalUser }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Total Product --}}
        <div class="col-md-4 col-sm-12">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape bg-info text-white rounded-circle me-3">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Total Product</h6>
                            <h3 class="mb-0">{{ $totalProduct }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="row mb-4">
            {{-- Top 8 Pelanggan Terbaru --}}
            <div class="col-md-8 col-sm-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">Top 8 Pelanggan Terbaru</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @forelse($recentPelanggan as $pelanggan)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $pelanggan->first_name }}</span>
                                    <span>{{ $pelanggan->email }}</span>
                                    <small>{{ $pelanggan->created_at->format('d M Y') }}</small>
                                </li>
                            @empty
                                <li class="list-group-item text-center text-muted">Belum ada pelanggan baru</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Profile Card --}}
            <div class="col-md-4 col-sm-12">
                <div class="card shadow border-0 text-center p-0">
                    <!-- Background cover -->
                    <div class="profile-cover rounded-top"
                        style="background-image: url('{{ asset('assets/img/profile-cover.jpg') }}');"></div>
                    <div class="card-body pb-5">
                        <!-- Foto profil -->
                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/default-profile.jpg') }}"
                            alt="{{ Auth::user()->name }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4">
                        <!-- Nama pengguna -->
                        <h4 class="h3">{{ Auth::user()->name }}</h4>

                        <!-- Role pengguna -->
                        <h5 class="fw-normal text-muted">{{ ucfirst(Auth::user()->role) }}</h5>

                        <!-- Email pengguna -->
                        <p class="text-gray mb-4">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- List Produk --}}
    <div class="card border-0 shadow">
        <div class="card-header bg-primary text-white">
            <h6 class="mb-0">List Sparepart Yang Tersedia</h6>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($recentProduct as $key => $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <!-- Nomor urut -->
                        <span class="me-3">{{ $key + 1 }}.</span>

                        <!-- Gambar produk -->
                        <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}"
                            class="img-thumbnail" style="width: 50px; height: 50px;">

                        <!-- Nama produk -->
                        <span class="ms-2">{{ $product->nama_produk }}</span>
                    </div>

                    <!-- Stok -->
                    <small class="ms-2">Stok: {{ $product->stok }}</small>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
