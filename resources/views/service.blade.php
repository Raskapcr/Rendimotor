@extends('layouts.app')

@section('contents')
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/service-2.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Service Start -->
    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Kami Melayani:</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav w-100 nav-pills me-5">
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <i class="fa fa-car-side fa-2x me-3"></i>
                            <h4 class="m-0">Perawatan Rutin</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <i class="fa fa-tools fa-2x me-3"></i>
                            <h4 class="m-0">Servis Mesin</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <i class="fa fa-cog fa-2x me-3"></i>
                            <h4 class="m-0">Penggantian Ban</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <i class="fa fa-oil-can fa-2x me-3"></i>
                            <h4 class="m-0">Penggantian Oli</h4>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/service-1.jpg')}}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">"Perawatan Rutin Terbaik untuk Kendaraan Anda!"</h3>
                                    <p class="mb-4">Di RendiMotor, kami memberikan layanan profesional untuk menjaga kendaraan Anda tetap prima dan tampil kinclong. Dengan perawatan rutin dari teknisi berpengalaman, mobil Anda tidak hanya aman di jalan, tetapi juga selalu terlihat seperti baru. Jadwalkan perawatan sekarang dan rasakan pelayanan terbaik dari kami!</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Teknisi berpengalaman dan bersertifikat</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Menggunakan suku cadang asli dan berkualitas</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Harga kompetitif dengan layanan terbaik</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Proses cepat dan transparan</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/service-2.jpg')}}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">"Servis Mesin Profesional, Performa Maksimal!"</h3>
                                    <p class="mb-4">Pastikan mesin kendaraan Anda selalu dalam kondisi terbaik dengan layanan servis mesin di RendiMotor. Kami siap menangani segala kebutuhan kendaraan Anda, mulai dari tune-up hingga perbaikan mendalam, dengan menggunakan teknologi modern dan suku cadang berkualitas. Serahkan kepada ahlinya, dan rasakan performa mesin yang halus, bertenaga, dan tahan lama!</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Teknisi berpengalaman dan bersertifikat</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Menggunakan suku cadang asli dan berkualitas</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Harga kompetitif dengan layanan terbaik</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Proses cepat dan transparan</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/service-3.jpg')}}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">"Penggantian Ban Cepat dan Aman!"</h3>
                                    <p class="mb-4">Jaga kenyamanan dan keamanan perjalanan Anda dengan layanan penggantian ban di RendiMotor. Kami menyediakan berbagai pilihan ban berkualitas sesuai kebutuhan kendaraan Anda, lengkap dengan pemasangan profesional dan balancing presisi. Pastikan perjalanan Anda selalu mulus dan bebas khawatir bersama kami!</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Teknisi berpengalaman dan bersertifikat</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Menggunakan suku cadang asli dan berkualitas</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Harga kompetitif dengan layanan terbaik</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Proses cepat dan transparan</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/service-4.jpg')}}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">"Penggantian Oli Berkualitas untuk Mesin Lebih Awet!"</h3>
                                    <p class="mb-4">Pastikan mesin kendaraan Anda tetap bertenaga dan terlindungi dengan penggantian oli di [Nama Bengkel Anda]. Kami menggunakan oli berkualitas tinggi dan dikerjakan oleh teknisi berpengalaman, sehingga performa mesin Anda selalu optimal. Ganti oli sekarang untuk perjalanan yang lebih lancar dan hemat bahan bakar!</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Teknisi berpengalaman dan bersertifikat</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Menggunakan suku cadang asli dan berkualitas</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Harga kompetitif dengan layanan terbaik</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Proses cepat dan transparan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <div class="footer_social">
        @guest
        <!-- Tampilkan tombol "Login untuk Booking" jika user belum login -->
        <a href="{{ route('register.bengkel') }}" class="order_online btn btn-primary d-flex align-items-center justify-content-center mt-3">Login Untuk Booking</a>
        @endguest

        @auth
        <!-- Tampilkan tombol "Booking" jika user sudah login -->
        <h5 class="text-uppercase d-flex align-items-center justify-content-center mt-3">Booking Di Bawah Ini</h5>
        <!-- Tampilkan tombol WhatsApp jika user sudah login -->
        <a href="https://wa.me/62895618158063" target="_blank" class="order_online btn btn-primary d-flex align-items-center justify-content-center mt-3">
            <i class="fa fa-whatsapp" aria-hidden="true" style="margin-right: 5px;"></i> Chat via WhatsApp
        </a>
        @endauth
    </div>
@endsection
