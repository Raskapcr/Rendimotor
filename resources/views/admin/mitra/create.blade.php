@extends('layout.admin.app')
@section('content')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pelanggan.list') }}">Mitra</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>
                <h2 class="h4">Tambah Data Mitra</h2>
                <p class="mb-0">Form Tambah Data Mitra Baru</p>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('mitra.create') }}"
                    class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                    Kembali
                </a>
            </div>
        </div>

        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">General information</h2>
            <form action="{{ route('mitra.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Nama Mitra</label>
                            <input class="form-control" id="nama_mitra" name="nama_mitra" type="text"
                                placeholder="Enter your first name" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="last_name">Alamat</label>
                            <input class="form-control" id="alamat" name="alamat" type="text"
                                placeholder="Also your last name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email"
                                placeholder="name@company.com" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" id="phone" name="phone" type="numeric"
                                placeholder="+12-345 678 910" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kemitraan">Jenis Kemitraan</label>
                        <select class="form-select mb-0" id="jenis_kemitraan" name="jenis_kemitraan"
                            aria-label="Gender select example">
                            <option value="Platinum">Platinum</option>
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tgl_bergabung">Tanggal Bergabung</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input data-datepicker="" class="form-control" id="tgl_bergabung" name="tgl_bergabung"
                                type="date" placeholder="dd/mm/yyyy" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="checkbox" class="form-check-input" id="agreement" name="agreement">
                        <label class="form-check-label" for="agreement">Data ini benar dan dapat dipertanggungjawabkan dengan semestinya</label>
                      </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success text-white mt-2 animate-up-2" type="submit">Simpan</button>
                </div>
            </form>
        </div>
@endsection
