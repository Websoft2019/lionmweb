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
            <h1 class="h3 mb-0 text-gray-800">New Image</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm">
                    {{ Session::get('success') }}
                </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('admin.image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="container-fluid">
                <div class="row">

                    {{-- Left --}}
                    <div class="col-12 col-lg-9">

                        <div class="card mb-3">
                            <div class="card-header fw-bold">
                                {{ __('Image') }}
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-info my-1" id="add-more-files">Add More</button>
                                <div id="file-input-container">
                                    <div class="mb-3 file-input-wrapper">
                                        <input style="border: 1px solid #000;" type="file" class="form-control p-2"
                                            name="image[]">
                                        @error('image')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <script>
                                    document.getElementById('add-more-files').addEventListener('click', function() {
                                        var container = document.getElementById('file-input-container');
                                        var newFileInput = document.createElement('div');
                                        newFileInput.classList.add('mb-3', 'file-input-wrapper');
                                        newFileInput.innerHTML = `
                                            <div class="input-group">
                                                <input style="border: 1px solid #000;" type="file" class="form-control p-2" name="image[]">
                                                <button type="button" class="btn btn-danger remove-file-input">Remove</button>
                                            </div>
                                        `;
                                        container.appendChild(newFileInput);

                                        // Attach event listener to the remove button
                                        newFileInput.querySelector('.remove-file-input').addEventListener('click', function() {
                                            newFileInput.remove();
                                        });
                                    });

                                    // Add remove functionality to the initial input if needed
                                    document.querySelectorAll('.remove-file-input').forEach(function(button) {
                                        button.addEventListener('click', function() {
                                            button.closest('.file-input-wrapper').remove();
                                        });
                                    });
                                </script>
                            </div>
                        </div>

                    </div>

                    {{-- Right --}}
                    <div class="col-12 col-lg-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                {{ __('Album') }}
                            </div>
                            <div class="card-body">
                                <select class="form-select" name="album_id" aria-label="Default select example">
                                    @foreach ($albums as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('album_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        {{-- <div class="card mb-3">
                            <div class="card-header">
                                {{ __('Video') }}
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="yt_id" value="" name="yt_id"
                                        placeholder="Youtube Video ID">
                                    @error('yt_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
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
