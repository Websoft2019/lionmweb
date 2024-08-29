@extends('admin.template')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        .dataTables_wrapper {
            padding: 30px;
        }
    </style>
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">New Album</h1>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm">
                    {{ Session::get('success') }}
                </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10"
                    data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('admin.album.store') }}" method="POST">
            @csrf

            <div class="container-fluid">
                <div class="row">

                    {{-- Left --}}
                    <div class="col-12 col-lg-9">

                        <div class="card mb-3">
                            <div class="card-header fw-bold">
                                {{ __('Name & Slug') }}
                            </div>
                            <div class="card-body">

                                <div class="mb-3">
                                    <input style="border: 1px solid #000;" type="text" class="form-control p-2" id="name" value="{{ old('name') }}"
                                        name="name" placeholder="Name" oninput="generateSlug()">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <input style="border: 1px solid #000;" type="text" class="form-control p-2" id="slug" value="{{ old('slug') }}"
                                        name="slug" placeholder="Slug">
                                    @error('slug')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right --}}
                    <div class="col-12 col-lg-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                {{ __('Status') }}
                            </div>
                            <div class="card-body">
                                <div class="form-check form-switch">
                                    <input class="form-check-input me-4" type="checkbox" role="switch" name="status"
                                        id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                                    @error('status')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small><i>* This option decide either it will visible in website or not.</i></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <button class="btn btn-primary" type="submit">Add</button>
                    <input class="btn btn-light" type="reset" value="Reset">
                </div>
            </div>


        </form>

    </div>
    <!-- /.container-fluid -->

@stop
@section('js')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
