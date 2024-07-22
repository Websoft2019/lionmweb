<html>
    <head>
        <title></title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
	      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.js"></script>
	      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js"></script>
        <style>
            .business-card {
  position: absolute;
  /* top: 0; */
  left: 0;
  right: 0;
  /* bottom: 0; */
  margin: auto;
  height: auto;
  width: 648px;
  background: #fff;
}
.business-card:before, .business-card:after {
  content: "";
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  right: 0;
}


div {
  z-index: 2;
}

.bc__logo {
  position: absolute;
  top: 20%;
  /* right: 10%; */
}
.bc__logo figure {
  position: relative;
  display: inline-block;
  /* height: 4em; */
  /* width: calc(4em * 0.57735); */
  /* border-radius: 0.5em/0.25em; */
  /* background: white; */
  /* transform: rotate(90deg); */
}
.bc__logo figure:before, .bc__logo figure:after {
  position: absolute;
  width: inherit;
  height: inherit;
  border-radius: inherit;
  background: inherit;
  content: "";
}
.bc__logo figure:before {
  transform: rotate(60deg);
}
.bc__logo figure:after {
  transform: rotate(-60deg);
}
.bc__logo i {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  height: 25%;
  width: 70%;
  background: #ee0c4b;
  transform: skew(-30deg) rotate(-90deg);
  z-index: 2;
}
.bc__logo i:before, .bc__logo i:after {
  content: "";
  position: absolute;
  width: 60%;
  height: 75%;
  background: inherit;
  z-index: 5;
}
.bc__logo i:before {
  top: -82%;
  right: 24%;
  transform: skew(-40deg) rotate(90deg);
}
.bc__logo i:after {
  bottom: -85%;
  right: 23%;
  transform: skew(-40deg) rotate(90deg);
}
.bc__logo h2 {
  display: inline-block;
  /* padding-left: 0.65em; */
  color: white;
  font-size: 25px;
  font-weight: 900;
  letter-spacing: -1px;
  /* line-height: 2; */
  vertical-align: top;
}

.bc__tagline {
  position: absolute;
  bottom: 10%;
  right: 5%;
  color: white;
  line-height: 1.4;
  text-align: right;
}
.bc__tagline em {
  font-weight: 600;
  font-style: italic;
}

body {
  background: #111;
  font: 400 0.875em "Helvetica Neue", "Roboto Sans", Helvetica, Arial, Sans-serif;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

.credit {
  position: absolute;
  bottom: 15%;
  width: 100%;
  color: white;
  text-align: center;
}
.credit a {
  color: #ea4c89;
  text-decoration: none;
}
        </style>
    </head>
    <body>
        <div class='business-card' id="photo" style="text-align: center;">
          @if($eventinfo->BFC == 'on')
          <div style="width:100%; text-align: center; color: #fff; border-bottom: 2px dashed #000; padding-bottom: 10px; min-height: 150px; margin-bottom: 10px;">
            <h1 style="color: #000; padding: 5px 0 0 0; margin: 0">{{$eventinfo->title}} - {{$eventinfo->lion_year}}</h1>
            <div style="width: 80px; float: left;">
              <img src="{{ asset('site/assets/images/logo2.png') }}" width="80" style=" margin-left: 10px;">
            </div>
            <div style="width: 450px; float: left;">
              <p style="padding: 0; margin: 0; color: #000;">Lions Clubs International District 325 J Nepal</p>
              <h1 style="padding: 0; margin: 0; color: #000;">BREAKFAST COUPON</h1>
              <h6 style="padding: 0; margin: 0; color: #000;">{{$eventinfo->date}}, {{$eventinfo->vennue}}</h6>
            </div>
            <div style="width: 100px; float: right;">
              {!! QrCode::size(80)->generate($memberinfo->member_membership_no.'-'.$bookinginfo->id) !!}
            </div>
          </div>
          @endif
          @if($eventinfo->LC == 'on')
          <div style="width:100%; text-align: center; color: #fff; border-bottom: 2px dashed #000; padding-bottom: 10px; min-height: 150px; margin-bottom: 10px;">
            <h1 style="color: #000; padding: 5px 0 0 0; margin: 0">{{$eventinfo->title}} - {{$eventinfo->lion_year}}</h1>
            <div style="width: 80px; float: left;">
              <img src="{{ asset('site/assets/images/logo2.png') }}" width="80" style=" margin-left: 10px;">
            </div>
            <div style="width: 450px; float: left;">
              <p style="padding: 0; margin: 0; color: #000;">Lions Clubs International District 325 J Nepal</p>
              <h1 style="padding: 0; margin: 0; color: #000;">LUNCH COUPON</h1>
              <h6 style="padding: 0; margin: 0; color: #000;">{{$eventinfo->date}}, {{$eventinfo->vennue}}</h6>
            </div>
            <div style="width: 100px; float: right;">
              {!! QrCode::size(80)->generate($memberinfo->member_membership_no.'-'.$bookinginfo->id) !!}
            </div>
          </div>
          @endif
          @if($eventinfo->DC == 'on')
          <div style="width:100%; text-align: center; color: #fff; border-bottom: 2px dashed #000; padding-bottom: 10px; min-height: 150px; margin-bottom: 10px;">
            <h1 style="color: #000; padding: 5px 0 0 0; margin: 0">{{$eventinfo->title}} - {{$eventinfo->lion_year}}</h1>
            <div style="width: 80px; float: left;">
              <img src="{{ asset('site/assets/images/logo2.png') }}" width="80" style=" margin-left: 10px;">
            </div>
            <div style="width: 450px; float: left;">
              <p style="padding: 0; margin: 0; color: #000;">Lions Clubs International District 325 J Nepal</p>
              <h1 style="padding: 0; margin: 0; color: #000;">DINNER COUPON</h1>
              <h6 style="padding: 0; margin: 0; color: #000;">{{$eventinfo->date}}, {{$eventinfo->vennue}}</h6>
            </div>
            <div style="width: 100px; float: right;">
              {!! QrCode::size(80)->generate($memberinfo->member_membership_no.'-'.$bookinginfo->id) !!}
            </div>
          </div>
          @endif
          @if($eventinfo->TC == 'on')
          <div style="width:100%; text-align: center; color: #fff; border-bottom: 2px dashed #000; padding-bottom: 10px; min-height: 150px; margin-bottom: 10px;">
            <h1 style="color: #000; padding: 5px 0 0 0; margin: 0">{{$eventinfo->title}} - {{$eventinfo->lion_year}}</h1>
            <div style="width: 80px; float: left;">
              <img src="{{ asset('site/assets/images/logo2.png') }}" width="80" style=" margin-left: 10px;">
            </div>
            <div style="width: 450px; float: left;">
              <p style="padding: 0; margin: 0; color: #000;">Lions Clubs International District 325 J Nepal</p>
              <h1 style="padding: 0; margin: 0; color: #000;">TEA COUPON</h1>
              <h6 style="padding: 0; margin: 0; color: #000;">{{$eventinfo->date}}, {{$eventinfo->vennue}}</h6>
            </div>
            <div style="width: 100px; float: right;">
              {!! QrCode::size(80)->generate($memberinfo->member_membership_no.'-'.$bookinginfo->id) !!}
            </div>
          </div>
          @endif
            <div style="width:100%; text-align: center; background-color: darkblue; color: #fff; border-bottom: 4px solid yellow;">
                <h4 style="margin-bottom: 0;">Lions Clubs International</h4>
                <h1 style="margin: 0; padding: 0;">District 325 J Nepal</h1>
                <h1 style="color: yellow;">{{$eventinfo->title}} - {{$eventinfo->lion_year}}</h1>
                <h4>{{$eventinfo->date}}, {{$eventinfo->vennue}}</h4>
            </div>
            <div class='' style="text-align: center; width: 100%;">
              <figure style="text-align: center;">
                <img src="{{ asset('site/assets/images/logo.png') }}" width="100" style="">
                <img src="{{ asset('site/assets/images/logo2.png') }}" width="100" style="margin-left: 60px;">
                <img src="{{ asset('site/nepalflag.png') }}" width="100" style="margin-left: 60px;">
              </figure>
            </div>
            <div style="width:100%; text-align: center; margin: auto;">
              <figure style="text-align: center;">
                  @if($memberinfo->photo == Null)
                    <img src="{{ asset('site/assets/images/logo.png') }}" width="100" style="margin-top: 50px; opacity: 0.5;">
                  @else
                  <img src="{{ asset('site/uploads/members/'.$memberinfo->photo) }}" width="170">
                  @endif
              </figure>
                <div style="text-align:center; width: 100%">
                    <p style="text-align: center;">
                      <h3>{{$memberinfo->name}}</h3>
                    {{$clubinfo->name}} <br />
                    @if($departmentinfo)
                    {{$departmentinfo->title.', '}}
                    @endif
                    {{$designationinfo->title}}
                    <br /> <br />
                    <!-- membershipnumber - bookingid -->
                    {!! QrCode::size(150)->generate($memberinfo->member_membership_no.'-'.$bookinginfo->id) !!}<br />
                    <small style="margin-top: 15px;">{{$memberinfo->member_membership_no.'-'.$bookinginfo->id}}</small>
                    </p>
                    
                </div>
            </div>
            
            <div style="width: 100%; bottom: 0;">
              @if($eventinfo->hostclub != Null)
              <div style="background-color: darkblue; padding: 8px 0;">
                <p style="padding: 0; margin: 0; color: #fff;"><strong>Host Club(s) :</strong> {{$eventinfo->hostclub}}</p>
              </div>
              @endif
              <div style="background-color: yellow; padding: 10px 0;">
                <h1 style="padding: 0; margin: 0;">Participant</h1>
              </div>
            </div>
        </div>
        <p>
          <button id="download">
            Download
          </button>
        </p>
          <script type="text/javascript">
   
            jQuery(document).ready(function(){
                jQuery("#download").click(function(){
                screenshot();
              });
            });
         
            function screenshot(){
              html2canvas(document.getElementById("photo")).then(function(canvas){
                   downloadImage(canvas.toDataURL(),"membervisitingcard.png");
              });
            }
         
            function downloadImage(uri, filename){
            var link = document.createElement('a');
            if(typeof link.download !== 'string'){
                 window.open(uri);
            }
            else{
              link.href = uri;
              link.download = filename;
              accountForFirefox(clickLink, link);
            }
            }
         
            function clickLink(link){
              link.click();
            }
         
            function accountForFirefox(click){
              var link = arguments[1];
              document.body.appendChild(link);
              click(link);
              document.body.removeChild(link);
            }
         
         
         </script>
    </body>
</html>