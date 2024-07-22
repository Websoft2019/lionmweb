@extends('site.template')
@section('content')
<section class="page-header">
    <div class="page-header-bg">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('getHome') }}">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Club</li>
            </ul>
            <h2>Clubs</h2>
        </div>
    </div>
</section>
<section class="donation">
    <div class="container">
        <div class="row">
            @if($clubs->count())
            @foreach($clubs as $club)
            
                @php
               
                    $pinfo = App\Models\Member_Designation_Enroll::where('club_id', $club->id)->where('lion_year', env('lion_year'))->where('designation_id', '1')->limit(1)->first();
                    $p = Null;
                    if($pinfo){
                        $p = App\Models\Member::where('id', $pinfo->member_id)->where('status', 'Active')->limit(1)->first();
                        
                        if($p){
                            
                            $donor = App\Models\Donor::where('membership_id', $p->id)->limit(1)->first();
                            if($donor){
                                $donorinfo = App\Models\Donortype::find($donor->id);
                                    if($donorinfo){
                                        $donorname = $donorinfo->title;
                                    }
                                    else{
                                        $donorname = '';
                                    }
                            }
                            else{
                                $donorname = '';
                            }

                            $pname = $club->club_type.' '.$p->name.' '. $donorname;
                            
                        }
                        else{
                            $pname = '-';
                            $pnumber = '-';
                           
                        }
                    }
                    else{
                        $pname = '-';
                        $pnumber = '-';
                        
                    }
                @endphp
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="causes-one__single1">
                    <div class="causes-one__img">
                        @if($p != Null)
                        <img src="{{ asset('site/uploads/members/'.$p->photo) }}" alt="">
                        @else
                        <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" alt="">
                        @endif
                    </div>
                    <div class="causes-one__content">
                        <h3 class="causes-one__title"><a href="">{{ $club->name }}</a>
                        </h3>
                        <p class="causes-one__text" style="text-align: center;"> {{ $pname }} <br />
                            <strong> @if($pname != '-') Club President @else - @endif</strong>
                            <br />
                          
                        </p>
                        <div class="causes-one__progress">
                            <div class="causes-one__progress-shape"
                                style="background-image: url({{ asset('site/assets/images/shapes/causes-one-progress-shape-1.png') }});">
                            </div>
                            <div class="causes-one__goals">
                                <p><span>{{ date('d M, Y', strtotime($club->charter_date)); }}</span> Charter Date</p>
                                @php
                                    $membercount = App\Models\Member::where('club_id', $club->id)->count();
                                @endphp
                                <a href="javascript:void(0)" class="memberdetail" id="{{$club->id}}">
                                    <p style="text-align:right;"><span>{{ $membercount }}</span> Members</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12">
                
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                  </svg>
    
                  <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      No Any <strong> Clubs </strong> found yet!!!
                    </div>
                  </div>
            </div>
            @endif
        </div>
    </div>
</section>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                </tr>
            </thead>
            <tbody id="model-memberlist">

            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@stop
@section('js')
<script>
    $(document).ready(function() {
  $('.memberdetail').on('click', function(e) {
    e.preventDefault()
    var clubid = this.id;
    $.ajax({
                url: "/Ajax/clubs/Members",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    clubid:clubid,
                },
                success:function(response){
                    document.getElementById("model-memberlist").innerHTML = response.memberlist;
                    document.getElementById("staticBackdropLabel").innerHTML = response.modeltitle;
                   $('#staticBackdrop').modal('show');
                   
                },
      
      });
  });

});




    
</script>
@endsection