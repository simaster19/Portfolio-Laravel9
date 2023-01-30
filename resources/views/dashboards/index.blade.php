@extends('dashboards.layouts.main')

@section('container')
    {{-- @dd($dataMessage) --}}
    {{-- @dd($dataUser) --}}
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Project <span>|
                                        @if (count($dataUser->project) == 0)
                                            {{ '' }}
                                        @else
                                            {{ $dataUser->project->last()['created_at'] }}
                                        @endif
                                    </span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-earmark-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($dataUser->project) }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Message <span>|
                                        @if (count($dataMessage) == 0)
                                            {{ '' }}
                                        @else
                                            {{ $dataMessage->last()['created_at'] }}
                                        @endif
                                    </span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-envelope-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($dataMessage) }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
