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
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  height: 648px;
  width: 1098px;
  background: #1c4f9c;
  border-radius: 30px;
}
.business-card:before, .business-card:after {
  content: "";
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  right: 0;
}
.business-card:before {
  background: #1c4f9c;
  border-top-right-radius: 30px;
  -webkit-clip-path: polygon(20% 0, 100% 0, 100% 30%, 40% 70%);
          clip-path: polygon(20% 0, 100% 0, 100% 30%, 40% 70%);
}
.business-card:after {
  background: #113b79;
  border-bottom-right-radius: 30px;
  -webkit-clip-path: polygon(40% 70%, 100% 30%, 100% 100%, 48.5% 100%);
          clip-path: polygon(40% 70%, 100% 30%, 100% 100%, 48.5% 100%);
}

div {
  z-index: 2;
}

.bc__logo {
  position: absolute;
  top: 10%;
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
        <div class='business-card' id="photo">
            <div class='bc__logo'>
              <figure>
                <img src="{{ asset('site/assets/images/logo2.png') }}" alt="" width="120">
              </figure>
              <h2>
                <span style="color: yellow;">Lions Clubs of Distrist 325J Nepal</span>
                <small style="display:block; font-weight: normal; font-size: 18px;">Annapurna Lions Service Center
                    Parsyang, Pokhara-5, Nepal</small>
                  <small style="font-weight: normal; font-size:18px;">+977 61535222 |</small>
                 <small style="font-weight: normal; font-size:18px">info@lionsclubsdistrict325jnepal.org.np</small>
                </h2>
              <div style="display: inline-block; vertical-align: top; text-align: right; width: 360px">
                <img src="{{ asset('site/assets/images/logo.png') }}" alt="" width="140">
              </div>
              <div>
                <figure style="width: 250px; border: 5px solid rgba(255, 255, 255, 0.6); border-radius: 10px; text-align: center; height: 300px;">
                  @if($memberphoto != Null)
                    <img src="{{ asset('site/uploads/members/'.$memberphoto) }}" alt="" width="250" height="300">
                  @else
                    <img src="{{ asset('site/assets/images/logo.png') }}" alt="" width="120" style="padding-top: 90px;">
                  @endif
                </figure>
                <h2 style="line-height: 1.7;">
                  <span style="text-transform: uppercase; color: yellow;">{{$membertype}} {{$membername}} {{$membercontribution}}</span>
                  <small style="display:block; font-weight: normal;">Home Club : {{$clubname}} ({{$clubno}})</small>
                  <!-- <small style="display:block; font-weight: normal;">Home Club Address : </small> -->
                  <small style="display:block; font-weight: normal;">Designation : {{$posttitle}}
                    @if($departmenttitle != '')
                    {{', '.$departmenttitle}}
                    @endif
                    </small>
                  <small style="display:block; font-weight: normal;">Member Number : {{$member_membership_no}} </small>
                  <small style="display:block; font-weight: normal;">Contact Number : {{$personal_contact_number}} </small>
                  <small style="display:block; font-weight: normal;">Email Address : {{$email}} </small>
                  <small style="display:block; font-weight: normal;">Blood Group :
                    @if($blood_group == Null)
                    N/A
                    @else
                    {{$blood_group}}
                    @endif
                   </small>
                   
                  </h2>
              </div>
            </div>
            <div style="position: absolute; bottom: 10%; left: 5%; color: white; line-height: 1.4; text-align: left; font-style:italic ;">
              <p>This is automatic computer generated Card </p>
            </div>
            <div class='bc__tagline'>
              <p style="text-align: center;">
                {!! QrCode::size(200)->generate($member_membership_no) !!}
                <small style="display: block;">{{$qrcode}}</small>
              </p>
              <p>
                <br /> <br />
                __________________________ <br />
                <strong>Authorized Signature</strong> <br />
                {{$govname}} <br />
                District Governer {{env('lion_year')}}
              </p>
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