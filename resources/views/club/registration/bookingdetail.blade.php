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
            
@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);

::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}

#invoiceholder{
  width:100%;
  hieght: 100%;
 
}
#headerimage{
  z-index:-1;
  position:relative;
  top: -50px;
  height: 350px;
  background-image: url('http://michaeltruong.ca/images/invoicebg.jpg');

  -webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
	-moz-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
	box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
  overflow:hidden;
  background-attachment: fixed;
  background-size: 1920px 80%;
  background-position: 50% -90%;
}
#invoice{
  position: relative;
  top: -290px;
  margin: 0 auto;
  width: 700px;
  background: #FFF;
}

[id*='invoice-']{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
  padding: 30px;
}

#invoice-top{min-height: 120px;}
#invoice-mid{min-height: 120px;}
#invoice-bot{ min-height: 250px;}

.logo{
  float: left;
	height: 60px;
	width: 60px;
	background: url({{ asset('site/assets/images/logo.png') }}) no-repeat;
	background-size: 60px 60px;
}

.info{
  display: block;
  float:left;
  margin-left: 20px;
}
.title{
  float: right;
}
.title p{text-align: right;}
#project{margin-left: 52%;}
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  padding: 5px 0 5px 15px;
  border: 1px solid #EEE
}
.tabletitle{
  padding: 5px;
  background: #EEE;
}
.service{border: 1px solid #EEE;}
.item{width: 50%;}
.itemtext{font-size: .9em;}

#legalcopy{
  margin-top: 30px;
}
form{
  float:right;
  margin-top: 30px;
  text-align: right;
}


.effect2
{
  position: relative;
}
.effect2:before, .effect2:after
{
  z-index: -1;
  position: absolute;
  content: "";
  bottom: 15px;
  left: 10px;
  width: 50%;
  top: 80%;
  max-width:300px;
  background: #777;
  -webkit-box-shadow: 0 15px 10px #777;
  -moz-box-shadow: 0 15px 10px #777;
  box-shadow: 0 15px 10px #777;
  -webkit-transform: rotate(-3deg);
  -moz-transform: rotate(-3deg);
  -o-transform: rotate(-3deg);
  -ms-transform: rotate(-3deg);
  transform: rotate(-3deg);
}
.effect2:after
{
  -webkit-transform: rotate(3deg);
  -moz-transform: rotate(3deg);
  -o-transform: rotate(3deg);
  -ms-transform: rotate(3deg);
  transform: rotate(3deg);
  right: 10px;
  left: auto;
}



.legal{
  width:70%;
}
    </style>
    
@stop
@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <div class="row">
                <div class="col-md-8" style="text-align: left; color:#fff">
                    <h5 style="color: yellow;">Event Information</h5>
                    <strong>{{$eventinfo->title}}</strong> <br />
                    Venue : {{$eventinfo->vennue}} <br />
                    Date : {{$eventinfo->date}} <br />
                    Time : {{$eventinfo->time}}
                </div>
                <div class="col-md-4" style="text-align: right; color: #fff;">
                   <h5 style="color: yellow;"> Registration Detail</h5>
                   Total no. of registration : {{$register_members->count()}} person <br />
                   Total Paid Cost : NPR {{$totalpaidamount}} <br />
                   {{($register_members->count()/$totalmembers)*100}}% attendance out of {{$register_members->count()}} members.
                   @foreach($register_members_invoices as $row)
                   <a class="btn btn-primary invoiceclick" id="{{$row->groupcode}}">Invoice #{{$row->groupcode}}</a>
                  
                   @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-four" style="padding:60px 0 0; margin-bottom: 60px;">
    <div class="container">
        <div class="profilebox">
            @if(session('message'))
        <div class="row">
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
                  <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      {{ session('message') }}
                    </div>
                  </div>
            </div>
        </div>
        @endif
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Registration Code</th>
                            <th>Paid Amount</th>
                            <th>Registration Date</th>
                            <th> Status </th>
                        </tr>
                       
                            @foreach($register_members as $list)
                                <tr>
                                    <td>
                                        @php
                                            $memberinfo = App\Models\Member::where('member_membership_no', $list->member_id)->limit(1)->first();
                                            $post = App\Models\Member_Designation_Enroll::where('member_id', $memberinfo->id)->where('department_id', '!=', Null)->where('lion_year', env('lion_year'))->get();
                                            if($post->count()){
                                                $post1 = App\Models\Member_Designation_Enroll::where('member_id', $memberinfo->id)->where('department_id', '!=', Null)->where('lion_year', env('lion_year'))->limit(1)->first();
                                                $postinfo = App\Models\Officer::find($post1->designation_id);
                                            }
                                            else{
                                                $post1 = App\Models\Member_Designation_Enroll::where('member_id', $memberinfo->id)->where('lion_year', env('lion_year'))->limit(1)->first();
                                                $postinfo = App\Models\Officer::find($post1->designation_id);
                                            }
                                        @endphp
                                        {{$memberinfo->name}} <small style="display: block;">{{$postinfo->title}}</small>
                                    </td>
                                    <td>{{$list->hash}}-{{$list->payment_status}}</td>
                                    <td>NPR {{ $list->cost }}</td>
                                    <td>{{$list->created_at->format('d M, Y')}}</td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="Invoice-abc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Invoice</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div id="invoiceholder">

                <div id="headerimage"></div>
                <div id="invoice" class="effect2">
                  
                  <div id="invoice-top">
                    <div class="logo"></div>
                    <div class="info">
                      <h2>Lions Club Internation District 325J Nepal</h2>
                      <p> mail@lionsdistrict325Jnepal.org.np </br>
                        061 535222
                      </p>
                    </div><!--End Info-->
                    <div class="title">
                      <h1>Invoice #<span id="invoiceID-model"></span></h1>
                      <p>Paid Date: <span id="payableDate-model"></span></br>
                         
                      </p>
                    </div><!--End Title-->
                  </div><!--End InvoiceTop-->
              
              
                  
                  <div id="invoice-mid">
                    <div class="info">
                      <h2>{{Auth()->guard('web')->user()->name}}</h2>
                      <p>{{Auth()->guard('web')->user()->club_membership_id}}</br>
                    </div>
              
                    <div id="project">
                      <h2>{{$eventinfo->title}}</h2>
                      <p>
                        {{$eventinfo->vennue}} <br />
                        {{$eventinfo->date}} | 
                        {{$eventinfo->time}}
                      </p>
                    </div>   
              
                  </div><!--End Invoice Mid-->
                  
                  <div id="invoice-bot">
                    
                    <div id="table">
                      <table>
                        <thead>
                            <tr class="tabletitle">
                                <td></td>
                              <td class="item"><h2>Participant</h2></td>
                              <td class="Hours"><h2>Club Desgination</h2></td>
                              <td class="subtotal"><h2>Fee</h2></td>
                              
                            </tr>
                        </thead>
                        <tbody id="trcontent-model"></tbody>
                        
                       

                        
                          
                        <tr class="tabletitle">
                          <td></td>
                          <td></td>
                          <td class="Rate"><h2>Total</h2></td>
                          <td class="payment"><h2>NPR. <span id="totalAmount-model"></span></h2></td>
                        </tr>
                        
                      </table>
                    </div><!--End Table-->
                    
                 Payment Method : <span id="paymentmethod-model"></span><br />
                 Payment ID : <span id="paymentid-model"></span>
              
                    
                    <div id="legalcopy">
                      <p class="legal"><strong>Thank you for your contribution!</strong> 
                      </p>
                    </div>
                    
                  </div><!--End InvoiceBot-->
                </div><!--End Invoice-->
              </div><!-- End Invoice Holder-->
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
  $(document).ready(function(){
      $(".invoiceclick").click(function(e) {
          e.preventDefault();
              let groupcode = $(this).attr('id');
              $.ajax({
						url: "{{route('club.getAjaxInvoiceInfo')}}",
						type:"POST",
						data:{
								"_token": "{{ csrf_token() }}",
								groupcode:groupcode
							},
							success:function(response)
							{
                            document.getElementById("trcontent-model").innerHTML = response.outputtr;
                            document.getElementById("invoiceID-model").innerHTML = groupcode;
                            document.getElementById("payableDate-model").innerHTML = response.paydate;
                            document.getElementById("totalAmount-model").innerHTML = response.totalamount;
                            document.getElementById("paymentmethod-model").innerHTML = response.paymentmethod;
                            document.getElementById("paymentid-model").innerHTML = response.paymentid;
                            $('#Invoice-abc').modal('show');
                            }

						
            });
            
      });
    });

</script>
@endsection