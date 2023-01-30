@extends('dashboards.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <!-- Default Card -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $title . ' Message Dari: ' . $dataMessage->name }}</h5>
            <p>{{ $dataMessage->message }}</p>

        </div>
    </div><!-- End Default Card -->
@endsection
