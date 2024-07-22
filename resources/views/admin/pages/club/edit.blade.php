@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Clubs</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <button class="btn btn-primary" hre="{{ route('admin.getManageClub') }}">Manage CLub</button>
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
                    <form action="{{ route('admin.postEditClub', $club->id) }}" method="POST">
                        @csrf()
                        <div class="modal-body">
                            <div class="row" style="margin-bottom:20px;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Club Name *</label>
                                              <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ $club->name }}" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Club ID *</label>
                                              <input type="number" name="club_membership_id" class="form-control @error('club_membership_id') is-invalid @enderror" value="{{ $club->club_membership_id }}" required>
                                                @error('club_membership_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:20px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Charter Date</label>
                                              <input type="date" name="charter_date" class="form-control @error('charter_date') is-invalid @enderror" value="{{ $club->charter_date }}" placeholder="Charter Date">
                                                @error('charter_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Mother Club</label>
                                              <input type="text" name="mother_club" class="form-control @error('mother_club') is-invalid @enderror" value="{{ $club->mother_club }}">
                                              @error('mother_club')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Club Address</label>
                                              <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $club->address }}">
                                              @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:20px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                                <label class="form-label">Province</label>
                                                    <select class="form-control" name="province" id="OprovinceSelection">
                                                        <option value="@if($club->province != null){{$club->province}}@else{{old('province')}}@endif">@if($club->province != null){{$club->province}}@else{{old('province')}}@endif</option>
                                                    </select>
                                                    @if ($errors->has('province'))
                                                        <span class="text-danger" style="font-style: italic;">{{ $errors->first('province') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                                <label class="form-label">District</label>
                                                <select class="form-control" name="district" id="OdestrictsSelection">
                                                    <option value="@if($club->district != null){{$club->district}}@else{{old('district')}}@endif">@if($club->district != null){{$club->district}}@else{{old('district')}}@endif</option>
                                                </select>
                                                @if ($errors->has('district'))
                                                    <span class="text-danger" style="font-style: italic;">{{ $errors->first('district') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                                <label class="form-label">Municipality/Metropolitian/VDC</label>
                                                <select class="form-control" name="VDC_Metro" id="OmunicipalitySelection">
                                                    <option value="@if($club->VDC_Metro != null){{$club->VDC_Metro}}@else{{old('VDC_Metro')}}@endif">@if($club->VDC_Metro != null){{$club->VDC_Metro}}@else{{old('VDC_Metro')}}@endif</option>
                                                </select>
                                                @if ($errors->has('VDC_Metro'))
                                                    <span class="text-danger" style="font-style: italic;">{{ $errors->first('VDC_Metro') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                                <label class="form-label">Word No.</label>
                                                <input class="form-control" type="number" name="wordno" value="{{ $club->wordno }}">
                                                @if ($errors->has('wordno'))
                                                    <span class="text-danger" style="font-style: italic;">{{ $errors->first('wordno') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:20px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Club Email</label>
                                              <input type="email" name="club_email" class="form-control @error('club_email') is-invalid @enderror" value= "{{ $club->email }}">
                                              @error('club_email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                          <div class="input-group input-group-outline focused is-focused">
                                            <label class="form-label">Club Website</label>
                                              <input type="text" name="club_website" class="form-control @error('club_website') is-invalid @enderror" value= "{{ $club->website }}">
                                              @error('club_website')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                          <div class="input-group input-group-outline focused is-focused">
                                            <label class="form-label">Club Regular Meeting Location</label>
                                              <input type="text" name="regular_meeting_location" class="form-control @error('regular_meeting_location') is-invalid @enderror" value= "{{ $club->regular_meeting_location }}">
                                              @error('regular_meeting_location')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:20px;">
                                
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Club Contact Number Mobile</label>
                                              <input type="number" name="contact_person_mobile" class="form-control @error('contact_person_mobile') is-invalid @enderror" value="{{ $club->contact_number }}" required>
                                              <input type="hidden" name="userid" value="{{ $user->id }}">
                                              
                                              @error('contact_person_mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:20px;">
                                <div class="form-group">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline focused is-focused">
                                          <label class="form-label">About Club</label>
                                          <textarea name="introduction" class="form-control @error('introduction') is-invalid @enderror" value="{{ $club->introduction }}">{{ $club->introduction }}</textarea>
                                          @error('introduction')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Edit Club</button>
                        </div>
                      </form>
                    
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@stop
@section('js')
    <script>
        $(document).ready(function () {
        var el = $('#Container');
            var originalelpos = el.offset().top; // take it where it originally is on the page

            //run on scroll
            $(window).scroll(function () {
                var el = $('#Container'); // important! (local)
                var elpos = el.offset().top; // take current situation
                var windowpos = $(window).scrollTop();
                var finaldestination = windowpos + originalelpos;
                el.stop().animate({ 'top': finaldestination }, 1000);
            });
        });
        var stateObject = {
            "Province 1": {
                "Bhojpur": ["Bhojpur", "Shadanand", "Hatuwagadhi", "Ramprasad Rai", "Aamchok", "Tyamke Maiyunm", "Arun Gaunpalika", "Pauwadungma", "Salpasilichho"],

                "Khotang": ["Katari municipality", "Chaudandigadhi municipality", "Triyuga municipality", "Belaka municipality", "Udayapurgadhi gaunpalika", "Tapli gaunpalika", "Rautamai gaunpalika", "Limchungbung"],

                "Dhankuta": ["Dhankuta Municipality ", "Pakhribas Municipality", "Mahalaxmi Municipality", "Sangurigadhi Rural Municipality", "Chaubise Rural Municipality ", "Khalsa Chhintang Sahidbhumi Rural Municipality ", "Chhathar Jorpati  Rural Municipality"],

                "Ilam": ["Ilam Municipality", "Deumai Municipality", "Mai Municipality", "Suryodaya Municipality", "Phakphokthum Rural Municipality", "Mai Jogmai Rural Municipality", "Chulachuli Rural Municipality", "  Rong Rural Municipality", "Mangsebung Rural Municipality", "Sandakpur Rural Municipality"],

                "Jhapa": ["Mechinagar Municipality", "Bhadrapur Municipality", "Birtamod Municipality", "Arjundhara Municipality", "Kankai Municipality", "Shivasatakshi Municiplity", "Gauradaha Municipality", "Damak Municipality", "Buddhashanti Rural Municipality", "Haldibari Rural Municipality", "Kachankawal Rural Municipality", "Barhadashi Rural Municipality", "Jhapa Rural Municipality", "", "Gauriganj Rural Municipality", "Kamal Rural Municipality"],

                "Morang": ["Biratnagar Metropolitan City", "SundarHaraicha Municipality", "Belbari Municipality", "Pathari-Sanischare Municipality", "Urlabari Municipality", "Rangeli Municipality", "Letang Bhogateni Municipality", "Ratuwamai Municipality", "Sunawarshi Municipality"],

                "Okhaldhunga": ["Siddhicharan ", "Manebhanjyang Rural Municipality", "Champadevi Rural Municipality ", "Sunkoshi Rural Municipality", "Molung Rural Municipality", "Chisankhugadhi Rural Municipality", "Khiji Demba Rural Municipality", "Likhu Rural Municipality"],

                "Panchthar": ["Phidim Municipality", "Hilihang Rural Municipality", "Kummayak Rural Municipality", "Miklajung Rural Municipality", "Phalelung Rural Municipality", "Phalgunanda Rural Municipality", "Tumbewa Rural Municipality ", "Yangawarak Rural Municipality"],

                "Sankhuwasabha": ["Bhotkhola Rural Municipality ", "Chainpur Municipality", "Chichila Rural Municipality", "Dharmadevi Municipality", "Khandbari Municipality", "Madi Municipality", "Makalu Rural Municipality", "Panchakhapan Municipality", "Sabhapokhari Rural Municipality", "Silichong Municipality"],

                "Solukhumbu": ["Solududhkunda urban", "Dudhakaushika Rural", "Necha Salyan Rural", "Dudhkoshi Rural", "Maha Kulung Rural", "Sotang Rural", "Likhu Pike Rural", "Khumbu Pasanglhamu Rural"],

                "Sunsari": ["Itahari Sub Metropolitan City", "Dharan Sub Metropolitan City", "Inaruwa Municipality", "Duhabi Municipality", "Ramdhuni Municipality", "Barahachhetra Municipality", "Koshi Rural Municipality", "Gadhi Rural Municipality", "Barju Rural Municipality", "Bhokraha Narashingh Rural Municipality", "Harinagara Rural Municipality", "Dewanganj Rural Municipality"],

                "Taplejung": ["Phungling", "Aathrai Tribeni", "Sidingwa", "Phaktanglung", "Mikkwakhola", "Meringden", "Maiwakhola", "Pathibhara Yangwarak", "Sirijangha"],

                "Terhathum": ["Aathrai Rural Municipality ", "Chhathar Rural Municipality", "Laliguras Municipality", "Menchayam Rural Municipality ", "Myanglung Rural Municipality", "Phedap Rural Municipality"],

                "Udayapur": ["Triyuga Municipality", "Katari Municipality", "Chaudandigadhi Municipality", "Belaka Municipality", "Udayapurgadhi Rural Municipality", "Rautamai Rural Municipality", "Tapli", "Limchungbung Rural Municipality"],
            },

            "Madhesh Province": {
                "Parsa": ["Birgunj Metropolitan", "Bahudarmai Municipality", "Parsagadhi Municipality", "Pokhariya Municipality", "Bindabasini Rural Municipality", "Dhobini Rural Municipality", "Chhipaharmai Rural Municipality", "Jagarnathpur Rural Municipality", "Jirabhawani Rural Municipality", "Kalikamai Rural Municipality", "Pakaha Mainpur Rural Municipality", "Paterwa Sugauli Rural Municipality", "Sakhuwa Prasauni Rural Municipality", "Thori Rural Municipality"],

                "Bara": ["Kalaiya Sub-Metropolitan City", "Jeetpur Simara Sub-Metropolitan City", "Kolhabi Municipality", "Nijgadh Municipality", "Mahagadhimai Municipality", "Simraungadh Municipality", "Pacharauta Municipality", "Pheta Rural Municipality", "Bishrampur Rural Municipality", "Prasauni Rural Municipality", "Adarsh Kotwal Rural Municipality", "Karaiyamai Rural Municipality", "Devtal Rural Municipality", "Parwanipur Rural Municipality", "Baragadhi Rural Municipality", "Suwarna Rural Municipality"],

                "Rautahat": ["Baudhimai Municipality", "Brindaban Municipality", "Chandrapur Municipality", "Dewahi Gonahi Municipality", "Gadhimai Municipality", "Garuda Municipality", "Gaur Municipality", "Gujara Municipality", "Ishanath Municipality", "Katahariya Municipality", "Madhav Narayan Municipality", "Maulapur Municipality", "Paroha Municipality", "Phatuwa Bijayapur Municipality", "Rajdevi Municipality", "Rajpur Municipality", "Durga Bhagwati Rural Municipality", "Yamunamai Rural Municipality"],

                "Sarlahi": ["Bagmati Municipality", "Balara Municipality", "Barahathwa Municipality", "Godaita Municipality", "Harion Municipality", "Haripur Municipality", "Haripurwa Municipality", "Ishworpur Municipality", "Kabilasi Municipality", "Lalbandi Municipality", "Malangwa Municipality", "Basbariya Rural Municipality", "Bishnu Rural Municipality", "Brahampuri Rural Municipality", "Chakraghatta Rural Municipality", "Chandranagar Rural Municipality", "Dhankaul Rural Municipality", "Kaudena Rural Municipality", "Parsa Rural Municipality", "Ramnagar Rural Municipality"],

                "Siraha": ["Lahan Municipality", "Dhangadhimai Municipality", "Siraha Municipality", "Golbazar Municipality", "Mirchaiya Municipality", "Kalyanpur Municipality", "Karjanha Municipality", "Sukhipur Municipality", "Bhagwanpur Rural Municipality", "Aurahi Rural Municipality", "Bishnupur Rural Municipality", "Bariyarpatti Rural Municipality", "Lakshmipur Patari Rural Municipality", "Naraha Rural Municipality", "Sakhuwanankar Katti Rural Municipality", "Arnama Rural Municipality", "Navarajpur Rural Municipality"],

                "Dhanusha": ["Janakpur Sub Metropolitan City", "Chhireshwarnath Municipality", "Ganeshman Charanath", "Dhanusadham Municipality", "Nagarain Municipality", "Bideha Municipality", "Mithila Municipality", "Sahidnagar Municipality", "Sabaila Municipality", "Kamala Municipality", "Mithila Bihari Municipality", "Hansapur Municipality", "Janaknandani Rural Municipality", "Bateshwar Rural Municipality", "Mukhiyapatti Musharniya Rural Municipality", "Lakshminya Rural Municipality", "Aurahi Rural Municipality", "Dhanauji Rural Municipality"],

                "Saptari": ["Bodebarsain Municipality", "Dakneshwori Municipality", "Hanumannagar Kankalini Municipality", "Kanchanrup Municipality", "Khadak Municipality", "Sambhunath Municipality", "Saptakoshi Municipality", "Surunga Municipality", "Rajbiraj Municipality", "Agnisaira Krishnasavaran Rural Municipality", "Balan-Bihul Rural Municipality", "Rajgadh Rural Municipality", "Bishnupur Rural Municipality", "Chhinnamasta Rural Municipality", "Mahadeva Rural Municipality", "Rupani Rural Municipality", "Tilathi Koiladi Rural Municipality", "Tirhut Rural Municipality"],

                "Mahottari": ["Aurahi Municipality", "Balawa Municipality", "Bardibas Municipality", "Bhangaha Municipality", "Gaushala Municipality", "Jaleshwor Municipality", "Loharpatti Municipality", "ManaraShiswa Municipality", "Matihani Municipality", "Ramgopalpur Municipality", "Ekdara Rural Municipality", "Mahottari Rural Municipality", "Pipara Rural Municipality", "Samsi Rural Municipality", "Sonama Rural Municipality"],
            },

            "Bagmati Province": {
                "Bhaktapur District": ["Bhaktapur", "Changunarayan", "Madhyapur Thimi", "Suryabinayak Municipality", ],

                "Chitwan District": ["Bharatpur Metropolitan City", "Kalika Municipality", "Khairahani Municipality", "Madi Municipality", "Ratnanagar municipality", "Rapti Municipality", "Ichchhakamana Rural Municipality"],

                "Dhading District": ["Dhunibeshi Municipality", "Nilkantha Municipality", "Khaniyabas Rural Municipality", "Gajuri Rural Municipality", "Galchhi Rural Municipality", "Gangajamuna Rural Municipality", "Jwalamukhi Rural Municipality", "Thakre Rural Municipality", "Netrawati Dabjong Rural Municipality", "Benighat Rorang Rural Municipality", "Rubi Valley Rural Municipality", "Siddhalek Rural Municipality", "Tripurasundari Rural Municipality"],

                "Dolakha District": ["Bhimeswor Municipality", "Jiri Municipality", "Kalinchok Rural Municipality", "Melung Rural Municipality", "Bigu Rural Municipality", "Gaurishankar Rural Municipality", "Baiteshwor Rural Municipality", "Sailung Rural Municipality", "Tamakoshi Rural Municipality"],

                "Kathmandu District": ["Budanilkantha Municipilaty", "Chandragiri Municipilaty ", "Dakshinkali Municipilaty", "Gokarneshwar Municipilaty", "Kageshwari Manohara Municipilaty", "Kathmandu Municipilaty", "Kirtipur Municipilaty", "Nagarjun Municipilaty", "Shankharapur Municipilaty", "Tarakeshwar Municipilaty", "Tokha Municipilaty"],

                "Kavrepalanchok District": ["Dhulikhel Municipality", "Banepa Municipality", "Panauti Municipality", "Panchkhal Municipality", "Namobuddha Municipality", "Mandandeupur Municipality", "Khani Khola Rural Municipality", "Chauri Deurali Rural Municipality", "Temal Rural Municipality", "Bethanchok Rural Municipality", "Bhumlu Rural Municipality", "Mahabharat Rural Municipality", "Roshi Rural Municipality"],

                "Lalitpur District": ["Lalitpur Metropolitan City", "Mahalaxmi Municipality", "Godawari Municipality", "Konjyoson Rural Municipality", "Bagmati Rural Municipality", "Mahankal Rural Municipality"],

                "Makwanpur District": ["Hetauda Sub-Metropolitan City", "Thaha Municipality", "Bhimphedi Rural Municipality", "Makawanpurgadhi Rural Municipality", "Manahari Rural Municipality", "Raksirang Rural Municipality", "Bakaiya Rural Municipality", "Bagmati Rural Municipality", "Kailash Rural Municipality", "Indrasarowar Rural Municipality"],

                "Nuwakot District": ["Bidur Municipality", "Belkotgadhi Municipality", "Kakani Rural Municipality", "Panchakanya Rural Municipality", "Likhu Rural Municipality", "Dupcheshwar Rural Municipality", "Shivapuri Rural Municipality", "Tadi Rural Municipality", "Suryagadhi Rural Municipality", "Tarkeshwar Rural Municipality", "Kispang Rural Municipality", "Myagang Rural Municipality"],

                "Ramechhap District": ["Manthali Municipality", "Ramechhap Municipality ", "Umakunda Rural Municipality", "Khandadevi Rural Municipality", "Doramba Rural Municipality", "Gokulganga Rural Municipality", "Likhu Tamakoshi Rural Municipality ", "Sunapati Rural Municipality"],

                "Rasuwa District": ["Kalika Rural Municipality", "Gosaikunda Municipality", "Naukunda Rural Municipality", "Parbatikunda (Aama Chhodingmo) Rural Municipality", "Uttargaya Municipality"],

                "Sindhuli District": ["Kamalamai Municipality", "Dudhauli Municipality", "Sunkoshi Rural Municipality", "Hariharpur Gadhi Rural Municipality", "Tinpatan Rural Municipality", "Marin Rural Municipality", "Golanjor Rural Municipality", "Phikkal Rural Municipality", "Ghyanglekh Rural Municipality"],

                "Sindhupalchok District": ["Chautara Sangachowkgadi", "Bahrabise", "Melamchi", "Balephi Rural Municipality", "Sunkoshi Rural Municipality", "Indrawati Rural Municipality", "Jugal Rural Municipality", "Panchpokhari Thangpal Rural Municipality", "Bhotekoshi Rural Municipality", "Lisankhu Pakhar Rural Municipality", "Helambu Rural Municipality", "Tripurasundari Rural Municipality"],
            },


            "Gandaki Province": {
                "Baglung": ["Baglung Municipality", "Dhorpatan Municipality", "Galkot Municipality", "Jaimini Municipality", "Bareng Rural Municipality", "Khathekhola Rural Municipality", "Taman Khola Rural Municipality", "Tara Khola Rural Municipality", "Nisikhola Rural Municipality", "Badigad Rural Municipality"],

                "Gorkha": ["Gorkha Municipality", "Palungtar Municipality", "Sulikot Rural Municipality", "Siranchowk Rural Municipality", "Ajirkot Rural Municipality", "Tsum Nubri Rural Municipality", "Dharche Rural Municipality", "Bhimsen Thapa Rural Municipality", "Sahid Lakhan Rural Municipality", "Aarughat Rural Municipality", "Gandaki Rural Municipality"],

                "Kaski": ["Pokhara Metropolitan City", "Annapurna Rural Municipality", "Machhapuchchhre Rural Municipality", "Madi Rural Municipality", "Rupa Rural Municipality"],

                "Lamjung": ["Besisahar Municipality", "Dordi Rural Municipality", "Dudhpokhari Rural Municipality", "Kwhlosothar Rural Municipality", "Madhya Nepal Municipality", "Marsyandi Rural Municipality", "Rainas Municipality", "Sundarbazar Municipality"],

                "Manang": ["Chame Municipality", "Nason Rural Municipality", "Narpa Bhumi Rural Municipality", "Manang Ngisyang Rural Municipality"],

                "Mustang": ["Gharpajhong (घरपझोङ)", "Thasang (थासाङ)", "Barhagaun Muktichhetra (बाह्रगाउँ मुक्तिक्षेत्र)", "Lomanthang (लोमन्थाङ)", "Dalome (दालोमे)"],

                "Myagdi": ["Beni Municipality", "Annapurna Rural Municipality", "Dhaulagiri Rural Municipality", "Mangala Rural Municipality", "Malika Rural Municipality", "Raghuganga Rural Municipality"],

                "Nawalpur": ["Kawasoti municipality (Headquarter)", "Gaindakot municipality", "Devachuli municipality", "Madhyabindu municipality", "Baudikali Rural municipality", "Bulingtar Rural municipality", "Binayi Tribeni Rural municipality", "Hupsekot Rural municipality"],

                "Parbat": ["Kushma Municipality", "Phalewas Municipality", "Jaljala rural municipality ", "Paiyun Rural Municipality", "Mahashila Rural Municipality", "Modi Rural Municipality", "Bihadi Rural Municipality"],

                "Syangja": ["Galyang Municipality", "Chapakot Municipality", "Putalibazar Municipality", "Bheerkot Municipality", "Waling Municipality", "Arjun Chaupari Rural Municipality", "Aandhikhola Rural Municipality", "Kaligandaki Rural Municipality", "Phedikhola Rural Municipality", "Harinas Rural Municipality", "Biruwa Rural Municipality"],

                "Tanahu": ["Bhanu Municipality", "Bhimad Municipality", "Byas Municipality", "Shuklagandaki Municipality", "Anbu Khaireni Rural Municipality", "Devghat Rural Municipality", "Bandipur Rural Municipality", "Rishing Rural Municipality", "Ghiring Rural Municipality", "Myagde Rural Municipality"],
            },

            "Lumbini Province": {
                "Kapilvastu": ["Kapilvastu Municipality", "Banganga Municipality", "Buddhabhumi Municipality", "Shivaraj Municipality", "Krishnanagar Municipality", "Maharajgunj Municipality", "Mayadevi Rural Municipality", "Yashodhara Rural Municipality", "Suddhodhan Rural Municipality", "Bijaynagar Rural Municipality"],

                "Parasi": ["Bardghat urabn", "Ramgram urban", "Sunwal urban", "Susta rural", "Palhi Nandan rural", "Pratappur rural", "Sarawal rural"],

                "Rupandehi": ["Butwal Sub-Metropolitan Municipality", "Devdaha Municipality", "Lumbini Sanskritik Municipality", "Sainamaina Municipality", "Siddharthanagar Municipality", "Tilottama Municipality ", "Gaidahawa Rural Municipality", "Kanchan    Rural Municipality", "Kotahimai Rural Municipality", "Marchawari Rural Municipality", "Mayadevi Rural Municipality", "Omsatiya Rural Municipality", "Rohini Rural Municipality", "Sammarimai Rural Municipality", "Siyari Rural Municipality", "Suddodhan Rural Municipality"],

                "Arghakhanchi ": ["Sandhikharka Municipality", "Sitganga Municipality", "Bhumikasthan Municipality", "Chhatradev Rural Municipality", "Panini Rural Municipality", "Malarani Rural Municipality"],

                "Gulmi": ["Kaligandaki Rural Municipality", "Satyawati Rural Municipality", "Ruru Rural Municipality", "Dhurkot Rural Municipality", "Chhatrakot Rural Municipality", "Musikot Urban Municipality", "Resunga Urban Municipality", "Gulmidarbar Rural Municipality", "Chandrakot Rural Municipality", "Isma Rural Municipality", "Madane Rural Municipality", "Malika Rural Municipality"],

                "Palpa": ["Tansen Municipality", "Rampur Palpa", "Rainadevi Chhahara Rural Municipality", "Ripdikot Rural Municipality", "Bagnaskali Rural Municipality", "Rambha Rural Municipality", "Purbakhola Rural Municipality", "Nisdi Rural Municipality", "Mathagadi Rural Municipality", "Tinahu Rural Municipality"],

                "Dang": ["Ghorahi Sub-Metropolitan City", "Tulsipur Sub-Metropolitan City", "Lamahi Municipality", "Gadhawa Rural Municipality", "Rajpur Rural Municipality", "Shantinagar Rural Municipality", "Rapti Rural Municipality", "Banglachuli Rural Municipality", "Dangisharan Rural Municipality", "Babai Rural Municipality"],

                "Pyuthan": ["NO"],

                "Rolpa": ["Rolpa Municipality", "Runtigadi Rural Municipality", "Triveni Rural Municipality", "Sunil Smiriti Rural Municipality", "Lungri Rural Municipality", "Sunchhari Rural Municipality", "Thawang Rural Municipality", "Madi Rural Municipality", "Ganga Dev Rural Municipality", "Pariwartan Rural Municipality"],

                "Eastern Rukum ": ["Bhume rural", "Putha rural", "Uttarganga rural", "Sisne rural"],

                "Banke": ["Nepalgunj Sub-Metropolitan City", "Kohalpur Municipality", "Rapti-Sonari Rural Municipality", "Narainapur Rural Municipality", "Duduwa Rural Municipality", "Janaki Rural Municipality", "Khajura Rural Municipality", "Baijanath Rural Municipality"],

                "Bardiya": ["Gulariya municipality", "Rajapur municipality", "Madhuwan municipality", "Thakurbaba municipality", "Basgadhi municipality", "Barbardiya municipality", "Badhaiyatal rural municipality", "Geruwa rural municipality"],
            },

            "Karnali Province": {
                "Dailekh District": ["Narayan Urban Municipilaty", "Dullu  Urban Municipilaty", "Aathbis Urban Municipilaty", "Chamunda Bindrasaini Municipilaty", "Thantikandh Rural Municipilaty", "Bhairabi Rural Municipilaty", "Mahabu Rural Municipilaty", "Naumule    Rural Municipilaty", "Dungeshwar Rural Municipilaty", "Gurans Rural Municipilaty", "Bhagawatimai Rural Municipilaty"],

                "Dolpa District": ["Thuli Bheri Municipality", "Tripurasundari Municipality", "Dolpo Buddha Rural Municipality", "She Phoksundo Rural Municipality", "Jagadulla Rural Municipality", "Mudkechula Rural Municipality", "Kaike Rural Municipality", "Chharka Tangsong Rural Municipality"],

                "Humla District": ["Simkot Rural Municipality", "Namkha Rural Municipality", "Kharpunath Rural Municipality", "Sarkegad Rural Municipality", "Chankheli Rural Municipality", "Adanchuli Rural Municipality", "Tajakot Rural Municipality"],

                "Jajarkot District": ["Bheri भेरी municipilaty", "Chhedagad  छेडागाड municipilaty", "Nalgad     त्रिवेणी नलगाड municipalaty", "Junichande Rural municipalaty जुनीचाँदे", "Kushe Rural municipalaty कुशे", "Barekot Rural municipalaty बारेकोट", "Shivalaya Rural municipalaty शिवालय"],

                "Jumla District": ["Chandannath", "Kankasundari ", "Sinja ", "Hima", "Tila ", "Guthichaur", "Tatopani", "Patarasi"],

                "Kalikot District": ["Khandachakra Municipality", "Raskot Municipality", "Tilagufa Municipality", "Pachaljharana Rural Municipality", "Sanni Triveni Rural Municipality", "Narharinath Rural Municipality", "Shubha Kalika Rural Municipality", "Mahawai Rural Municipality", "Palata Rural Municipality"],

                "Mugu District": ["Chhayanath Rara Municipality", "Mugum Karmarong Rural Municipality", "Soru Rural Municipality", "Khatyad Rural Municipality"],

                "Salyan District": ["Shaarda Municipality", "Bagchaur Municipality", "Bangad Kupinde Municipality", "Kalimati Rural Municipality", "Tribeni Rural Municipality", "Kapurkot Rural Municipality", "Chatreshwari Rural Municipality", "Kumakh Rural Municipality", "Siddha Kumakh Rural Municipality", "Darma Rural Municipality"],

                "Surkhet District": ["Birendranagar Municipality", "Bheriganga Municipality", "Gurbha Kot Municipality", "Panchapuri Municipality", "Lekbesi Municipality", "Chaukune Rural Municipality", "Barahatal Rural Municipality", "Chingad Rural Municipality", "Simta Rural Municipality"],

                "Western Rukum District": ["Musikot municipality", "Chaurjahari municipality", "Aathbiskot municipality", "Banphikot Rural municipality", "Tribeni  Rural municipality", "Sani Bheri  Rural municipality"],
            },

            "Sudurpashchim Province": {
                "Achham  ": ["Mangalsen municipality", "Kamalbazar कमलबजार municipality", "Sanfebagar साँफेबगर municipality", "Panchadewal Binayak पञ्चदेवल municipality", "Ramaroshan रामारोशन rural", "Chaurpati चौरपाटी rural", "Turmakhand तुर्माखाँद  rural", "Mellekh    मेल्लेख rural", "Dhakari    ढँकारी rural    ", "Bannigadi Jayagad बान्नीगडीजैगड rural"],

                "Baitadi ": ["Dasharathchand Municipality", "Patan Municipality", "Melauli Municipality", "Purchaudi Municipality", "Surma Rural Municipality", "Sigas Rural Municipality", "Shivanath Rural Municipality", "Pancheshwor Rural Municipality", "Dogdakedar Rural Municipality", "Dilasaini Rural Municipality"],

                "Bajhang ": ["Jaya Prithvi Municipality", "Bungal Municipality", "Talkot Rural Municipality", "Masta Rural Municipality", "Khaptadchhanna Rural Municipality", "Thalara Rural Municipality", "Bitthadchir Rural Municipality", "Surma Rural Municipality", "Chhabis Pathibhera Rural Municipality", "Durgathali Rural Municipality", "Kedarsyu Rural Municipality", "Saipal Rural Municipality", ],

                "Bajura  ": ["Badimalika Municipality", "Triveni Municipality", "Budhiganga Municipality", "Budhinanda Municipality", "Gaumul Rural Municipality", "Jagnnath Rural Municipality", "Swamikartik Khapar Rural Municipality", "Chhededaha Rural Municipality", "Himali Rural Municipality"],

                "Dadeldhura ": ["Amargadhi municipality", "Parshuram municipality", "Aalitaal Rural Municipality", "Bhageshwar Rural Municipality", "Navadurga Rural Municipality", "Ajaymeru Rural Municipality", "Ganyapadhura Rural Municipality"],

                "Darchula ": ["Mahakali   Urban", "Shailyasikhar  Urban", "Malikarjun Rural", "ApihimalRural", "Duhun  Rura", "Naugad Rural", "Marma  Rural", "Lekam  Rural", "Vyans  Rural"],

                "Doti ": ["Dipayal Silgadhi Municipality", "Shikhar Municipality", "Purbichauki Rural Municipality", "Badikedar Rural Municipality", "Jorayal Rural Municipality", "Sayal Rural Municipality", "Aadarsha Rural Municipality", "Dr. K. I. Singh Rural Municipality", "Bogatan Rural Municipality"],

                "Kailali ": ["Dhangadhi Sub-Metropolitan City", "Lamki Chuha Municipality", "Tikapur Municipality", "Ghodaghodi Municipality", "Bhajani Municipality", "Godawari Municipality", "Gauriganga Municipality", "Janaki Rural Municipality", "Bardagoriya Rural Municipality", "Mohanyal Rural Municipality", "Kailari Rural Municipality", "Joshipur Rural Municipality", "Chure Rural Municipality"],

                "Kanchanpur ": ["Bedkot municipality", "Belauri municipality", "Bhimdatta municipality", "Mahakali municipality", "Shuklaphanta municipality", "Krishnapur municipality", "Punarbas municipality", "Laljhadi rural municipality", "Beldandi rural municipality"],
            }
        }

        window.onload = function() {
            
            var OprovinceSelection = document.getElementById("OprovinceSelection"),
                OdestrictsSelection = document.getElementById("OdestrictsSelection"),
                OmunicipalitySelection = document.getElementById("OmunicipalitySelection");

            for (var province in stateObject) {
                OprovinceSelection.options[OprovinceSelection.options.length] = new Option(province, province);
            }

            OprovinceSelection.onchange = function() {
                OdestrictsSelection.length = 1;
                OmunicipalitySelection.length = 1;

                if (this.selectedIndex < 1) return;
                for (var districts in stateObject[this.value]) {
                    OdestrictsSelection.options[OdestrictsSelection.options.length] = new Option(districts, districts);
                }
            }

            OprovinceSelection.onchange();
            OdestrictsSelection.onchange = function() {
                OmunicipalitySelection.length = 1;
                if (this.selectedIndex < 1) return;
                var district = stateObject[OprovinceSelection.value][this.value];
                for (var i = 0; i < district.length; i++) {
                    OmunicipalitySelection.options[OmunicipalitySelection.options.length] = new Option(district[i], district[i]);
                }
            }
        }
    </script>
@stop