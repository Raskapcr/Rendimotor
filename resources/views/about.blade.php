@extends('layouts.app')

@section('contents')
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/sparepart2.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/about.jpg')}}" style="object-fit: cover;" alt="">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">15 <span class="fs-4">Years</span></h1>
                            <h4 class="text-white">Experience</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-primary text-uppercase"> Tentang Kami </h6>
                    <h1 class="mb-4"><span class="text-primary">RendiMotor</span> Adalah Tempat Terbaik Untuk Perawatan Mobil Anda </h1>
                    <p class="mb-4">Rendi motor didirikan pada tahun 2014 karena mendirikan bengkel bengkel adalah salah satu peluang besar untuk menjadi usah yang maju dan berkembang, karena kendaraan semakin banyak dan membutuhkan pelayanan,
                        penyediaan sparepart yang berkualitas dan aman, oleh karena itu rendi motor membuka jasa dan penyediaan sparepart untuk kendaraan. Dengan didirikan rendi motor ini berharap bisa menawarkan layanan perbaikan kendaraan yang berkualitas,
                        efisiensi waktu, menyediakan sparepart yang bisa memuaskan konsumen,  rendi motor ini di rancang untuk memenuhi kebutuhan masyarakat dalam menjaga performa kendaraan mereka agar tetap optimal dan aman digunakan</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection


