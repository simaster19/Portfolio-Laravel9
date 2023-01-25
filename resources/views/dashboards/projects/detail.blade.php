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
    <!-- Default Card -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $title . ' ' . $dataProject->nama_project }}</h5>
            <p>{{ $dataProject->keterangan }}</p>

            @foreach ($dataProject->images as $image)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('project-images/' . $image['gambar']) }}" class="card-img-top"
                        alt="{{ $image['gambar'] }}">
                </div>
            @endforeach
        </div>
    </div><!-- End Default Card -->
@endsection
