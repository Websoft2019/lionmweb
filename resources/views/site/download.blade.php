@extends('site.template')
@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('getHome') }}">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Download</li>
            </ul>
            <h2>Download</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Four Start-->
<section class="about-four">
    <div class="container">
        <div class="row">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Name</th>
                            {{-- <th scope="col">Category</th> --}}
                            <th scope="col">View/Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($downloads as $download)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $download->name }}</td>
                                {{-- <td>{{ $download->category }}</td> --}}
                                <td>
                                    <a href="{{ asset('uploads/download/'.$download->file) }}" download="{{ $download->file }}" class="btn btn-warning">Download</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $downloads->links() }}
            </div>
        </div>
    </div>
</section>
@stop