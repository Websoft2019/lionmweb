<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Http;
use App\Models\Officer;
use App\Models\Occupation;
use App\Models\Donortype;
use App\Models\Club;
use App\Models\Donor;
use App\Models\Member_Designation_Enroll;
use App\Models\Registration;
use App\Models\EventRegisterMember;
use Auth;
use DB;
use Str;



use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getDashboard()
    {
        return view('dashboard');
    }
    public function getManageMember(){
        $data =[
            'members' => Member::where('club_id', Auth()->user()->club_id)->where('status', 'Active')->get(),
            'officers' =>Officer::where('type', 'Club')->get(),
            'occupations' => Occupation::all(),
            'club'=> Club::where('id', Auth()->user()->club_id)->limit(1)->first(),
            'totalmembers' => Member::where('club_id', Auth()->user()->club_id)->where('status', 'Active')->count()
        ];
        return view('club.member.manage', $data);
    }
    public function getAddMember(){
        $data =[
        'officers' =>Officer::where('type', 'Club')->where('lion_year', env('lion_year'))->get(),
        'occupations' => Occupation::all(),
        ];
        return view('club.member.add', $data);
    }
    public function postAddNewMember(Request $request){
        if($request->file('photo')){
            $getuniquename_photo = sha1($photo->getClientOriginalName().time());
            $getextension_photo = $photo->getClientOriginalExtension();
            $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
            $photo->move('site/uploads/members/', $getrealname_photo);
        }
        else{
            $getrealname_photo = Null;
        }

        if($request->charter_member == 'on'){
            $value_charter_member = 'Y';
        }
        else{
            $value_charter_member = 'N';
        }
        if($request->charter_president == 'on'){
            $value_charter_president = 'Y';
        }
        else{
            $value_charter_president = 'N';
        }

        $member = New Member;
        $member->photo = $getrealname_photo;
        $member->club_id = Auth()->user()->club_id;
        
        $member->name = $request->input('fname');
        $member->member_type =$request->input('membership_type');
        $member->member_membership_no = $request->input('club_membership_id');
        $member->email = $request->input('email');
        $member->gender =$request->input('gender');
        $member->dob =$request->input('dob');
        $member->sponsor_id =$request->input('sponsor_name');
        $member->home_contact_number =$request->input('home_number');
        $member->office_contact_number =$request->input('office_number');
        $member->personal_contact_number =$request->input('mobile_number');
        $member->address =$request->input('address');
        $member->spouse_name =$request->input('spouse_name');
        $member->occupation_id = $request->input('occupation_id');
        $member->club_join_date = $request->input('club_join_date');
        $member->blood_group = $request->input('blood_group');
        $member->charter_member =  $value_charter_member;
        $member->charter_president =  $value_charter_president;
        $member->save();

        $enroll_designation = New Member_Designation_Enroll;
        $enroll_designation->member_id = $member->id;
        $enroll_designation->club_id = Auth()->user()->club_id;
        $enroll_designation->designation_id = $request->input('designation_id');
        $enroll_designation->lion_year = env('lion_year');
        $enroll_designation->save();

        return redirect()->route('club.getManageMember')->with('message', 'Member Added Successfully!!!');
    }
    public function getClubProfile(){
        $data =[
            'donortypes'=>Donortype::all(),
            'club' => Club::where('id', Auth()->user()->club_id)->limit(1)->first(),
            'totalmembers'=>Member::where('club_id', Auth()->user()->club_id)->where('status', 'Active')->count()
        ];
        return view('club.profile.index', $data);
    }
    public function getUpdateProfile(){
        $data =[
        'club' => Club::where('id', Auth()->user()->club_id)->limit(1)->first(),
        'officers'=>Officer::where('type', 'Club')->get()
        ];
        return view('club.profile.modify', $data);
    }
    public function postModifyProfile(Request $request){
       $clubid = Auth()->user()->club_id;
       
       $clubinfo = Club::where('id', $clubid)->limit(1)->first();
       
       if($request->input('club_membership_id') == $clubinfo->club_membership_id){
        
       DB::table('clubs')
			->where('id', $clubid)
			->update([
				'charter_date' => $request->input('charter_date'),
				'address' => $request->input('address'),
				'mother_club' => $request->input('address'),
				'province' => $request->input('province'),
				'district' => $request->input('district'),
				'VDC_Metro' => $request->input('VDC_Metro'),
				'wordno' => $request->input('wordno'),
				'email' => $request->input('club_email'),
				'website' => $request->input('club_website'),
				'regular_meeting_location' => $request->input('regular_meeting_location'),
				'contact_person' => $request->input('contact_person'),
				'contact_person_designation' => $request->input('contact_person_designation_id'),
				'contact_number' => $request->input('contact_number'),
				'introduction' => $request->input('introduction')
				]);
        
                return redirect()->back();
                
       }
       else{
        abort(404);
       }

    }
    public function postUploadLogo(Request $request){
        $photo = $request->file('logo');
        $clubid = Auth()->user()->club_id;
            $getuniquename_photo = sha1($photo->getClientOriginalName().time());
            $getextension_photo = $photo->getClientOriginalExtension();
            $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
            $photo->move('site/uploads/clubs/', $getrealname_photo);

            DB::table('clubs')
			->where('id', $clubid)
			->update([
				'photo' => $getrealname_photo
                ]);
            return redirect()->back();
    }
    public function getChangePassword(){
        return view('club.profile.changepassword');
    }
    public function PostChangePassword(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::table('users')
        ->where('id', Auth()->user()->id)
        ->update([
            'password' => Hash::make($request->password)
            ]);
        return redirect()->back();

    }
    public function getMemberDetail($member){
        $member = Member::where('member_membership_no', $member)->limit(1)->first();
        $club_designation_enroll_check = Member_Designation_Enroll::where('member_id', $member->id)->where('lion_year', env('lion_year'))->limit(1)->first();
        if($club_designation_enroll_check){
            $club_designation = Officer::where('id',$club_designation_enroll_check->designation_id)->limit(1)->first();
        }
        else{
            $club_designation = Null;
        }
        if($member){
            if($member->club_id == Auth::user()->club_id){
                $data =[
                    'member' => $member,
                    'club' => Club::where('id', $member->club_id)->limit(1)->first(),
                    'designation' => $club_designation,
                    'donations' => Donor::where('membership_id', $member->member_membership_no)->get(),
                    'occupation' => Occupation::where('id', $member->occupation_id)->limit(1)->first()
                ];
                return view('club.member.detail', $data);
            }
            else{
                abort(404);
            }
        }
        else{
            abort(404);
        }
    }
    public function getMemberEdit($member){
        $member = Member::where('member_membership_no', $member)->limit(1)->first();
        $club_designation_enroll_check = Member_Designation_Enroll::where('member_id', $member->id)->where('lion_year', env('lion_year'))->limit(1)->first();
                            if($club_designation_enroll_check){
                                $club_designation = Officer::where('id',$club_designation_enroll_check->designation_id)->limit(1)->first();
                            }
                            else{
                                $club_designation = Null;
                            }
        if($member){
            if($member->club_id == Auth::user()->club_id){
                $data =[
                    'member' => $member,
                    'club' => Club::where('id', $member->club_id)->limit(1)->first(),
                    'designation' => $club_designation,
                    'officers' => Officer::all(),
                    'occupations' => Occupation::all(),
                ];
               
                return view('club.member.edit', $data);
            }
            else{
                abort(404); 
            }
        }
        else{
            abort(404);
        }
        

    }
    public function postEditMember(Member $member, Request $request){
        if($member){
            if($member->club_id == Auth::user()->club_id){
                

                // $member->member_membership_no = $request->input('club_membership_id');
                // $member->name = $request->input('fname');
                // $member->designation_id = $request->input('designation_id');
                $member->dob =$request->input('dob');
                $member->gender =$request->input('gender');
                $member->address =$request->input('address');
                $member->sponsor_id =$request->input('sponsor_name');
                $member->occupation_id =$request->input('occupation_id');
                $member->spouse_name =$request->input('spouse_name');
                // $member->member_type =$request->input('membership_type');
                $member->home_contact_number =$request->input('home_number');
                $member->office_contact_number =$request->input('office_number');
                $member->personal_contact_number =$request->input('mobile_number');
                $member->email = $request->input('email');
                $member->blood_group = $request->input('blood_group');
                $member->club_join_date = $request->input('club_join_date');
                $member->save();

                DB::table('member__designation__enrolls')
			        ->where('member_id', $member->id)
                    ->where('lion_year', env('lion_year'))
			        ->update([
				            'designation_id' => $request->input('designation_id'),
                            'club_id' => Auth::user()->club_id
				            ]);

                

                return redirect()->route('club.getManageMember')->with('message', 'Member Edited Successfully!!!');
            }
            else{
                abort(404); 
            }
        }
        else{
            abort(404);
        }
    }
    public function getMemberDrop($member){
        $member = Member::where('member_membership_no', $member)->limit(1)->first();
        if($member){
            if($member->club_id == Auth::user()->club_id){
                DB::table('members')
                ->where('id', $member->id)
                ->update([
                    'status' => 'Drop'
                    ]);

                return redirect()->route('club.getManageMember')->with('message', $member->name. ' drop successfully !!!');
    
            }
            else{
                abort(404);
            }
        }
        else{
            abort(404);
        }

    }
    public function postUploadMemberPhoto(Member $member, Request $request){
        if($member){
            if($member->club_id == Auth::user()->club_id){
                $photo = $request->file('photo');
                $getuniquename_photo = sha1($photo->getClientOriginalName().time());
                $getextension_photo = $photo->getClientOriginalExtension();
                $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
                $photo->move('site/uploads/members/', $getrealname_photo);

                $member->photo = $getrealname_photo;
                $member->save();
                return redirect()->back();
            }
            else{
                abort(404);
            }
        }
        else{
            abort(404);
        }
    }

    public function getRegistrationList(){
        $data=[
            'rlist'=>Registration::where('lion_year', env('lion_year'))->get()
        ];
        return view('club.registration.list', $data);
    }
    public function getRegistrationProcess($registration){
        $data =[
            'registration'=> Registration::where('slug', $registration)->limit(1)->first(),
            'members' =>Member::where('club_id', Auth()->user()->club_id)->where('status', 'Active')->get(),

        ];
        return view('club.registration.form', $data);
    }
    public function postEventRegister(Request $request){
        $registration_id = $request->input('eventid');
        $totalmember = count(collect($request)->get('membercheckbox'));
        
        $event = Registration::where('id', $registration_id)->limit(1)->first();
        $cost = $event->cost;
        $random2 = date('y').Str::random(6);
        for ($i = 0; $i < $totalmember; $i++)
        {
            // hash = clubid-eventid-memberno-randamnumber
            $hash = Auth()->guard('web')->user()->club_id.'-'.$registration_id.'-'.$request->input('membercheckbox')[$i].'-'.$random2;
            $register = New EventRegisterMember;
            $register->registration_id = $registration_id;
            $register->club_id = Auth()->user()->club_id;
            $register->member_id = $request->input('membercheckbox')[$i];
            $register->groupcode = $random2;
            $register->hash = $hash;
            $register->cost = $cost;
            $register->lion_year = env('lion_year');
            $register->save();
        }
        return redirect()->route('club.getPayment', $random2);
    }
public function getPayment($groupcode){
    $geteventid = EventRegisterMember::where('groupcode', $groupcode)->limit(1)->first();
    $geteventinformation = Registration::where('id', $geteventid->registration_id)->limit(1)->first();
    $registedmembers = EventRegisterMember::where('groupcode', $groupcode)->get();
    $totalcost =  EventRegisterMember::where('groupcode', $groupcode)->sum('cost');
        if(env('TEST_ON') == 'test'){
            $PID = env('TEST_FONEPAY_MID');
            $sharedSecretKey = env('TEST_FONEPAY_SID');
            $paymentUrl = 'https://dev-clientapi.fonepay.com/api/merchantRequest';
        }
        else{
            $PID = env('LIVE_FONEPAY_MID');
            $sharedSecretKey = env('LIVE_FONEPAY_SID');
            $paymentUrl = 'https://clientapi.fonepay.com/api/merchantRequest';
        }
        $MD = 'P';
        $AMT = $totalcost;
        $CRN = 'NPR';
        $DT = date('m/d/Y');
        $R1 = 'Registration for '.$geteventinformation->title;
        $R2 = $registedmembers->count().' /person';
        $RU = route('club.getFonepayResult');
        $PRN = $groupcode;
        $DV = hash_hmac('sha512', $PID . ',' . $MD . ',' . $PRN . ',' . $AMT . ',' . $CRN . ',' . $DT . ',' . $R1 . ',' . $R2 . ',' . $RU, $sharedSecretKey);
        $data =[
            'registration' => $geteventinformation,
            'members' => $registedmembers,
            'totalcost' => $totalcost,
            'ucode' => Str::random(4),
            'MD' => 'P',
            'AMT' => $totalcost,
            'CRN' => 'NPR',
            'DT' => date('m/d/Y'),
            'R1' => 'Registration for '.$geteventinformation->title,
            'R2' => $registedmembers->count().' /person',
            'RU' => route('club.getFonepayResult'),
            'PRN' => $groupcode,
            'DV' => $DV,
            'paymentDevUrl'=> $paymentUrl,
            'PID' => $PID
        ];
    return view('club.registration.payment', $data);
    //return view('club.registration.payment', $data);
}

public function getFonepayResult(Request $request){
  
    $amount =  EventRegisterMember::where('groupcode', $request->PRN)->sum('cost');
    $eventinfo = EventRegisterMember::where('groupcode', $request->PRN)->limit(1)->first();

        if(env('TEST_ON') == 'test'){
            $PID = env('TEST_FONEPAY_MID');
            $sharedSecretKey = env('TEST_FONEPAY_SID');
            $verifyUrl = 'https://dev-clientapi.fonepay.com/api/merchantRequest/verificationMerchant';
                
        }
        else{
            $PID = env('LIVE_FONEPAY_MID');
            $sharedSecretKey = env('LIVE_FONEPAY_SID');
            $verifyUrl = 'https://clientapi.fonepay.com/api/merchantRequest/verificationMerchant';
        }
    $prn = $request->PRN;
    $bid = $request->BID ?? '';
    $uid = $request->UID;
    $bc = $request->BC;
    $ini = $request->INI;
    $r_amt = $request->R_AMT;

    $requestData = [
        'PRN' => $prn,
        'PID' => $PID,
        'BID' => $bid,
        'AMT' => $amount,
        'UID' => $uid,
        'DV' => hash_hmac('sha512', $PID . ',' . $amount . ',' . $prn . ',' . $bid . ',' . $uid, $sharedSecretKey),
    ];


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $verifyUrl . '?' . http_build_query($requestData));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseXML = curl_exec($ch);

    if ($response = simplexml_load_string($responseXML)) {
        if ($response->success == 'true') {
            DB::table('event_register_members')
            ->where('groupcode', $prn)
            ->update(array('status' => 'Y', 'payment_type' => 'Fonepay', 'payment_id'=> $uid.'-'.$bc.'-'.$ini.'-'.$r_amt, 'payment_status'=> 'Y'));
            return redirect()->route('club.getBookingDetail',$eventinfo->registration_id)->with('message', 'Thank you for your payment.');
        } else {
           return redirect()->route('club.getPayment', $prn)->with('message', 'Payment Verifcation Failed, Please try again');
        }
    }


}
public function postNewDesignationofNewLionYear(Request $request, $memberno){
    $checkmember = Member::where('member_membership_no', $memberno)->limit(1)->first();
    if($checkmember->club_id == Auth()->user()->club_id){
        $checkdoubleentry = Member_Designation_Enroll::CheckDoubleEntryOfPostInLionYear($checkmember->id, $request->get('officer'));
        
        if($checkdoubleentry == 'true'){
            $checkforthisyearmemberexit = Member_Designation_Enroll::where('member_id', $checkmember->id)->where('lion_year', env('lion_year'))->where('designation_id', Null)->count();
        if($checkforthisyearmemberexit == 0){
            $add = New Member_Designation_Enroll;
            $add->member_id = $checkmember->id;
            $add->club_id = $checkmember->club_id;
            $add->designation_id = $request->get('officer');
            $add->lion_year = env('lion_year');
            $add->save();
            return redirect()->back()->with('message', 'Member Designation added for lion year '.env('lion_year').'.');

        }
        else{
            return 'This year her/her post already exit';
        }
        }
        else{
            return 'Post already used for lion Year '. env('lion_year');
        }
    }
    else{
        abort('404');
    }
}
public function getBookingDetail(Registration $registration){
    $check = EventRegisterMember::where('club_id', Auth()->guard('web')->user()->club_id)->where('registration_id', $registration->id)->count();
    if($check != 0){
        $data =[
            'eventinfo' => $registration,
            'register_members' => EventRegisterMember::where('club_id', Auth()->guard('web')->user()->club_id)->where('registration_id', $registration->id)->where('payment_status', 'Y')->get(),
            'totalpaidamount' => EventRegisterMember::where('club_id', Auth()->guard('web')->user()->club_id)->where('registration_id', $registration->id)->where('payment_status', 'Y')->sum('cost'),
            'register_members_invoices' => EventRegisterMember::where('club_id', Auth()->guard('web')->user()->club_id)->where('registration_id', $registration->id)->where('payment_status', 'Y')->select('groupcode')->distinct()->get(),
            'totalmembers' => Member::where('club_id', Auth()->guard('web')->user()->club_id)->where('status', 'Active')->count(),
        ];
       
        return view('club.registration.bookingdetail', $data);
    }
    else{
        abort(404);
    }
}
public function getAjaxInvoice(Request $request){
    $groupcode = $request->get('groupcode');
    $pmembers = EventRegisterMember::where('groupcode', $groupcode)->where('payment_status', 'Y')->get();
    $totalamount = EventRegisterMember::where('groupcode', $groupcode)->where('payment_status', 'Y')->sum('cost');
    $pmembers1 = EventRegisterMember::where('groupcode', $groupcode)->where('payment_status', 'Y')->limit(1)->first();
    $output = '';
    foreach($pmembers as $row){
        $memberinfo = Member::where('member_membership_no', $row->member_id)->limit(1)->first();
        $memberpost = Member_Designation_Enroll::where('member_id', $memberinfo->id)->where('lion_year', env('lion_year'))->limit(1)->first();
        $post = Officer::find($memberpost->designation_id);
        $postname = $post->title;
        if($memberpost->department_id == Null){
            $department = '';
        }
        else{
            $departmentinfo = Depatment::find($memberpost->department_id);
            $department = $departmentinfo->title;
        }
        $output .= '
            <tr class="service">
                <td class="tableitem"><p class="itemtext"></p></td>
                <td class="tableitem"><p class="itemtext">'.$memberinfo->name.'</p></td>
                <td class="tableitem"><p class="itemtext">'.$department.' '.$postname.'</p></td>
                <td class="tableitem"><p class="itemtext"> NPR.'.$row->cost.'</p></td>
            </tr>
        ';
    }
    
    return response()->json( array('outputtr' => $output, 'paydate' => $pmembers1->created_at->format('d M, Y'), 'totalamount' => $totalamount, 'paymentmethod' => $pmembers1->payment_type, 'paymentid' => $pmembers1->payment_id));
}
public function getBookingInvoice(Request $request){
    return view('club.registration.invoice');
}

    
}
