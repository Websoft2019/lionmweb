@extends('site.template')
@section('css')
    <style>
        .profilebox{
            border: 1px solid #ccc;
            padding: 20px;
        }
        .information{
            margin-top: 30px;
        }
        ul.information-item{
            list-style: none;
        }
        .information-item b{
            margin-top: 40px;
            color: #023c8a;
        }
    </style>
@stop
@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('getHome') }}">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Event</li>
            </ul>
            <h2>Registration</h2>
        </div>
    </div>
</section>
<section class="about-four" style="padding:60px 0 0; margin-bottom: 60px;">
    <div class="container">
        <div class="profilebox">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>Programme/Event</th>
                            <th>Vennu</th>
                            <th>Date/Time</th>
                            <th>Registration Fee</th>
                            <th></th>
                        </tr>
                        @if($rlist->count())
                            @foreach($rlist as $list)
                                <tr>
                                    <td>{{$list->title}} <small style="display: block;">Registration Deadline : 2022-5-10</small></td>
                                    <td>{{$list->vennue}}</td>
                                    <td>{{$list->date}} {{$list->time}}</td>
                                    <td>
                                        @if($list->cost != Null)
                                            Npr.{{$list->cost}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($list->registration_stop > date('Y-m-d'))
                                        <a href="{{route('club.getRegistrationProcess', $list->slug)}}">Register</a>|
                                        @else
                                        <a href="">Registration Close</a> |
                                        @endif
                                        @php $checkbooking = App\Models\EventRegisterMember::where('club_id', Auth()->user()->club_id)->where('payment_status', 'Y')->where('registration_id', $list->id)->count(); @endphp
                                        @if($checkbooking > 0)
                                            <a href="{{route('club.getBookingDetail', $list->id)}}">Booking Detail</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No Programe/Event announced yet!!!</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@stop