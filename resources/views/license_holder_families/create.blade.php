{{-- Penting --}}
@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Data Keluarga
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                  
                        <a href=" {{ route("license_holders.index") }} " class="btn btn-primary d-none d-sm-inline-block" >
                            Kembali
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="text-center mb-4" style="font-size: 1.5rem; font-weight: 400; font-family: 'Poppins', sans-serif;">
                                Tambah Data Keluarga
                            </p>
                        </div>

                        <div class="card-body">
                            <form  style="font-size: 1.5rem; font-weight: 400; font-family: 'Poppins', sans-serif;" action="{{ route('license_holder_families.store') }}" method="POST">
                                @csrf
                                

                                <input type="hidden" name="license_holder_id" value="{{ $license_holder->id }}">

                                <div class="mb-3">
                                    <label class="form-label">Nama Pemilik Lisensi</label>
                                    <input type="text" class="form-control" value="{{ $license_holder->fullname }}" disabled>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Hubungan dengan pemilik</label>
                                        <select name="relationship" class="form-select">
                                            <option value="">-- Pilih salah satu --</option>
                                            <option value="1">Suami</option>
                                            <option value="2">Istri</option>
                                            <option value="3">Anak</option>
                                            <option value="4">Orang Tua</option>
                                            <option value="5">Famili Lain</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="gender" class="form-select" required>
                                            <option value="">-- Pilih kelamin --</option>
                                            <option value="1">Laki - Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="birth_date" class="form-control" required
                                                    value="{{ old('birth_date') }}"
                                                    pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Pekerjaan</label>
                                        <input type="text" name="job" class="form-control" value="{{ old('job') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Telepon Kantor</label>
                                        <input type="number" name="job_phone" class="form-control" value="{{ old('job_phone') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <label for="last_education_level" class="form-label">Jenjang Pendidikan <code>*</code></label>
                                            <select name="last_education_level" class="form-select" required>
                                                <option value="">-- Pilih Jenjang --</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="D3">D3</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                                <label class="form-label">Nama Sekolah</label>
                                                <input type="text" name="institution_name" class="form-control" value="{{ old('institution_name') }}">
                                    </div>
                                </div>


                        <div class="d-flex justify-content-between">
                            <a href="{{ route('license_holders.show', $license_holder->id) }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </form>
 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
