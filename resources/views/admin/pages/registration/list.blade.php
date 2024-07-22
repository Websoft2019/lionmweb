@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">List of Registration</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a class="btn btn-primary" href="{{route('admin.getManageRegistration')}}">Create New Registration</a>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="row">
                <div class="col-md-12" style="padding: 40px;">
                    @if(session('message'))
                    <div class="alert alert-primary alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ session('message') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                    @endif
                    
                        <div class="modal-body">
                            <div class="row">
                                @foreach($events as $event)
                                  @php
                                    $noofbooking = App\Models\EventRegisterMember::where('registration_id', $event->id)->where('payment_status', 'Y')->count();
                                  @endphp
                                  <div class="col-lg-4 col-md-6 mt-4 mb-4">
                                    <div class="card z-index-2 ">
                                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                          <div class="chart" style="text-align: center;">
                                            <a href="{{route('admin.getRegstrationDetail', $event->id)}}"><h1 style="color: yellow;">{{$noofbooking}} <span style="font-size:13px;">/Booked</span></h1></a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-body">
                                        <h6 class="mb-0" style="min-height:53px;">{{$event->title}} - {{$event->lion_year}}</h6>
                                        <p class="text-sm ">{{$event->vennue}} | {{$event->time}}</p>
                                        <p class="text-sm ">Date : {{$event->date}} | Club Registration Limit : {{$event->maxperson}}</p>
                                        <p class="text-sm ">registration Deadline : {{$event->registration_stop}} | Registration Cost : Npr. {{$event->cost}}/- </p>
                                        <hr class="dark horizontal">
                                        <div class="d-flex ">
                                          <p class="mb-0 text-sm"> <a href="{{route('admin.getRegirationEdit', $event->id)}}">Edit</a> | <a href="{{route('admin.getRegistrationDelete', $event->id)}}">Delete</a> | <a href="{{route('admin.getEventDashboard', $event->id)}}">Event Dashboard</a></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                 



                                
                                @endforeach
                            </div>
                            
                        </div>
                     
                    
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@stop