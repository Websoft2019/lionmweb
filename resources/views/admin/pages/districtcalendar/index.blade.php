@extends('admin.template')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        .dataTables_wrapper {
            padding: 30px;
        }
    </style>
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-white text-capitalize ps-3">District Calendar</h6>
                            </div>
                            <div class="col-6" style="text-align:right;">
                                <a class="btn btn-primary" href="{{ route('admin.district_calender.create') }}">New Event</a>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="mt-4">
                        <form action="{{ route('admin.district_calender.index') }}">
                            <div>
                                @if (isset($_GET['date']))
                                    <input type="month" name="date" id="" value="{{ $_GET['date'] }}" required>
                                @else
                                    <input type="month" name="date" id="" required>
                                @endif
                            </div>                            
                            <div class="d-flex justify-center items-center gap-3">
                                <button class="btn btn-secondary">Change</button>
                                <a href="{{ route('admin.district_calender.index') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        @if (session('message'))
                            <div class="row">
                                <div class="col-md-12" style="padding: 0 40px;">
                                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ session('message') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <table class="table align-items-center mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.N</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year-Month</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Day</th>
                                    <th class="text-secondary opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $download)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $download->event_title }}
                                        </td>
                                        <td>
                                            {{ $download->event_location }}
                                        </td>
                                        <td>
                                            {{ $download->event_month }}
                                        </td>
                                        <td>
                                            {{ $download->event_day }}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('admin.district_calender.edit', $download->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Club">
                                              Edit</a>
                                              |
                                            <a href="{{ route('admin.district_calender.delete', $download->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete Club" onclick="return confirm('Club not deleted permanently, its hide from system.')">
                                              Delete
                                            </a>
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

@stop
@section('js')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
