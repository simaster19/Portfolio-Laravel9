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

        <h5 class="card-title">Data Project <a href="/project/create"><i class="bi bi-plus-square-fill"></i> </a></h5>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif

        <!-- Default Table -->
        <div class="table-responsive">

            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Project</th>
                        <th scope="col">Dibuat Dengan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tgl Upload</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataUser->project as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nama_project }}</td>
                            <td>{{ $data->dibuat_dengan }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-list"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/project/edit/{{ $data->id }}"><i
                                                    class="bi bi-pencil-square"></i>
                                                Edit</a></li>
                                        <li>
                                            <form action="/project/{{ $data->id }}" method="post">
                                                @method('delete')
                                                @csrf

                                                <button class="dropdown-item" type="submit" style="border:0">
                                                    <i class="bi bi-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </li>
                                        <li><a class="dropdown-item" href="/project/detail/{{ $data->id }}"><i
                                                    class="bi bi-eye"></i> Detail</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
@endsection
