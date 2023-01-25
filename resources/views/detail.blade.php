@extends('layouts.main')
@section('container')
    <section class="section">
        <div class="container">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6" data-aos="fade-up">
                    <h2>{{ $dataProject->nama_project }}</h2>

                </div>
            </div>
        </div>

        <div class="site-section pb-0">
            <div class="container">
                <div class="row align-items-stretch">

                    <div class="col-md-8" data-aos="fade-up">
                        @foreach ($dataProject->images as $image)
                            <img src="{{ asset('project-images/' . $image->gambar) }}" alt="Image" class="img-fluid">
                        @endforeach
                    </div>
                    <div class="col-md-3 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <div class="sticky-content stop">
                            <h5 class="mt-2 h5">{{ $dataProject->jenis_project }}</h5>
                            <div class="mb-4">
                                <p>
                                    {{ $dataProject->keterangan }}
                                </p>
                            </div>
                            <h5 class="h5 mb-3">What I did</h5>
                            <ul class="list-unstyled list-line mb-1">
                                <?php
                                $lists = explode(',', $dataProject->dibuat_dengan);
                                ?>
                                @foreach ($lists as $list)
                                    <li>{{ $list }}</li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
