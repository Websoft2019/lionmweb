@extends('admin.template')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        .dataTables_wrapper {
            padding: 30px;
        }
    </style>
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-2">
                        <h6 class="text-white mx-3">
                            Sliders
                        </h6>
                    </div>
                </div>



                <div class="card-body p-3">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible text-white" role="alert">
                            <span class="text-sm">
                                {{ Session::get('status') }}
                            </span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10"
                                data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <a class="btn btn-primary" href="">+ Add</a>


                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="myTable" style="border-bottom: 1px solid rgb(236, 236, 236);"
                                class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            S.N</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Link</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Image</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Created At</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td><span
                                                    class="me-2 text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $slider->text }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $slider->link }}</h6>
                                            </td>
                                            <td>
                                                {{-- <img style="width:150px; height:70px;" class="img" src="{{ $slider->photo }}" alt=""> --}}
                                                <img style="width:150px; height:70px;" class="img" src="{{ asset('uploads/slider/'. $slider->photo) }}" alt="">
                                            </td>
                                            <td><span
                                                    class="text-secondary text-xs font-weight-bold">{{ $slider->created_at }}</span>
                                            </td>
                                            <td>
                                                @if ($slider->status == 0)
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">Active</span>
                                                @else
                                                    <span
                                                        class="badge badge-sm bg-gradient-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                {{-- <a class="btn btn-primary" href="{{ route('admin.slider.edit', $slider->id) }}">Edit</a> --}}
                                                <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn text-danger" onclick="return confirm('Are you sure you want to delete this slider?')" >Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@stop
@section('js')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
