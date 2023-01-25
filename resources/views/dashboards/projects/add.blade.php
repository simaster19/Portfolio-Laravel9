@extends('dashboards.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif
        <h5 class="card-title">{{ $title }} </h5>

        <!-- Floating Labels Form -->
        <form action="/project" method="post" class="row g-3" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_admin" value="{{ $dataProject->id }}">
            <div class="col-md-5">
                <div class="form-floating mb-3">
                    <select name="jenis_project" class="form-select" id="floatingSelect" aria-label="State"
                        value={{ old('jenis_project') }}>
                        <option value="Web" selected>Web</option>
                        <option value="Android">Android</option>
                        <option value="Desktop">Desktop</option>
                    </select>
                    <label for="floatingSelect">Jenis Project</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-floating">
                    <input name="nama_project" type="text" class="form-control" id="floatingName"
                        placeholder="Nama Project" value="{{ old('nama_project') }}" required>
                    <label for="floatingName">Nama Project</label>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-floating">
                    <input name="dibuat_dengan" type="text" class="form-control" id="floatingEmail"
                        placeholder="Dibuat Dengan" value="{{ old('dibuat_dengan') }}" required>
                    <label for="floatingEmail">Dibuat Dengan</label>
                </div>
            </div>
            <div class="col-md-8">

                <label for="formFile" class="col-sm-2 col-form-label">Image Upload</label>
                <div class="col-md-10">
                    <input name="images[]" accept="image/*" class="form-control" type="file" id="formFile" multiple>
                </div>

            </div>
            <div class="col-md-7">
                <div class="form-floating">
                    <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="floatingTextarea" style="height: 100px;"
                        value="{{ old('keterangan') }}" required></textarea>
                    <label for="floatingTextarea">Keterangan</label>
                </div>

                <div class="d-flex justify-content-end mt-2">
                    <button name="btnSimpan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>


        </form><!-- End floating Labels Form -->
    </div>
@endsection
