<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use App\Models\Club;
use App\Models\User;
use App\Models\Officer;
use App\Models\Donor;
use App\Models\Donortype;
use App\Models\Member;
use App\Models\Districtofficer;
use App\Models\Department;
use App\Models\Registration;
use App\Models\Member_Designation_Enroll;
use App\Models\Occupation;
use App\Models\EventRegisterMember;
use App\Models\Admin;
use App\Rules\MatchOldPassword;
use App\Models\Region_zone_enroll;
use App\Models\Zone_club_enroll;
use App\Models\Registrationhostenroll;
use DB;
use App\Models\Host;

class AdminController extends Controller
{
    public function getDashboard(){
        $data = [
            'membersdob' => Member::whereMonth('dob', date('m'))->whereDay('dob', date('d'))->get(),
            'ccharterdate' => Club::whereMonth('charter_date', date('m'))->whereDay('charter_date', date('d'))->get()
        ];
        return view('admin.pages.dashboard.dashboard', $data);
    }
    public function getManageClub(){
        $data=[
            'clubs'=>Club::where('deleted', 'N')->get(),
            'officers' =>Officer::all()
        ];
        
        return view('admin.pages.club.manage', $data);
    }
    public function getClubAdd(){
        $data=[
            'officers' =>Officer::where('type', 'Club')->get()
        ];
        return view('admin.pages.club.add', $data);
    }
    public function postAddNewClub(Request $request){
        
        $club_name = $request->input('name');
        $slug = Str::slug($request->input('name'));

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:clubs'],
            'club_membership_id' => ['required', 'string', 'max:255', 'unique:clubs'],
            'club_membership_id' => ['required', 'string', 'max:255', 'unique:users,email']
        ]);
        $check_slug = Club::where('slug', $slug)->count();
        if($check_slug == 0){
        $club_membership_id = $request->input('club_membership_id');
        $charter_date = $request->input('charter_date');
        $mother_club = $request->input('mother_club');
        $contact_name = $request->input('contact_name');
        $club_officer_id = $request->input('club_officer_id');    
        $mobile = $request->input('mobile');
        
        $club = New Club;
        $club->name = $club_name;
        $club->slug = $slug;
        $club->club_membership_id = $club_membership_id;
        $club->charter_date = $charter_date;
        $club->mother_club = $mother_club;
        $club->contact_person = $contact_name;
        $club->contact_person_designation = $club_officer_id;
        $club->contact_number = $mobile;
        $club->save();

        // Create login
        $password = random_int(1000, 9999);
        $password_hash = Hash::make($password);
        $account = New User;
        $account->name = $contact_name;
        $account->email = $club_membership_id;
        $account->password = $password_hash;
        $account->club_id = $club->id;
        $account->mobile = $mobile;
        $account->save();
        
        // send to sms
        // $client = new Client();
       // $text_message = 'Dear Lion, \r\n Your login username: '.$club_membership_id. ' password: '. $password;
        // $res = $client->request('POST', 'https://sms.aakashsms.com/sms/v3/send', [
            // 'form_params' => [
                
                // 'auth_token' => '83f2508165a6b80932415d977644b1ccf83c58fddf380ba4349637751ce03f8a',
                // 'from' => '31001',
                // 'to' => $mobile,
                // 'text' => $text_message,
            // ]


       // ]);
        return redirect()->route('admin.getManageClub')->with('message', 'Club Added Successfully !!!');
        }
        else{
            return redirect()->back()->with('message', 'Club Name Already Exisit !!!');
        }

    }
    public function getEditClub(Club $club){
        $data=[
            'club'=>$club,
            'officers' =>Officer::where('type', 'Club')->get(),
            'user'=>User::where('club_id', $club->id)->limit(1)->first()
        ];
        return view('admin.pages.club.edit', $data);
    }
    public function postEditClub(Club $club, Request $request){
        $club_name = $request->input('name');
        $slug = Str::slug($request->input('name'));
        
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:clubs,name,'.$club->id],
            'club_membership_id' => ['required', 'string', 'max:255', 'unique:clubs,club_membership_id,'.$club->id],
            'club_membership_id' => ['required', 'string', 'min:4', 'unique:users,email,'.$request->input('userid')]
        ]);
        
        $check_slug = Club::where('slug', $slug)->where('id', '!=', $club->id)->count();
        if($check_slug == 0){
        $address = $request->input('address');
        $province = $request->input('province');
        $district = $request->input('district');
        $VDC_Metro = $request->input('VDC_Metro');
        $wordno = $request->input('wordno');
        $club_email = $request->input('club_email');
        $club_website = $request->input('club_website');
        $regular_meeting_location = $request->input('regular_meeting_location');
        $club_membership_id = $request->input('club_membership_id');
        $charter_date = $request->input('charter_date');
        $mother_club = $request->input('mother_club');
        
           
        $mobile = $request->input('contact_person_mobile');
        $introduction = $request->input('introduction');
        
        $club->name = $club_name;
        $club->slug = $slug;
        $club->club_membership_id = $club_membership_id;
        $club->address = $address;
        $club->province = $province;
        $club->district = $district;
        $club->VDC_Metro = $VDC_Metro;
        $club->wordno = $wordno;
        $club->email = $club_email;
        $club->website = $club_website;
        $club->charter_date = $charter_date;
        $club->mother_club = $mother_club;
        $club->introduction = $introduction;
        
        $club->regular_meeting_location = $regular_meeting_location;
        
        $club->contact_number = $mobile;
        $club->save();

        

        return redirect()->route('admin.getManageClub')->with('message', 'Club Edited Successfully !!!');
        }
        else{
            return redirect()->back()->with('message', 'Club Name Already Exisit !!!');
        }
    }
    public function getHideORDeleteClub(Club $club){
        $club->deleted = 'Y';
        $club->save();
        return redirect()->route('admin.getManageClub')->with('message', $club->name.' Deleted Successfully !!!');
    }
    public function getManageDonor(){
        $data =[
            'donors' =>Donor::all(),
            'donortypes' => Donortype::all()
        ];
        return view('admin.pages.donor.manage', $data);
    }
    public function getAjaxMembership(Request $request){
       
        $membershipid = $request->membershipid;
        
        $member = Member::where('member_membership_no', $membershipid)->limit(1)->first();
        if($member){
        $designationinfo = Member_Designation_Enroll::where('member_id', $member->id)->limit(1)->first();
        
        $designation = Officer::where('id', $designationinfo->designation_id)->limit(1)->first();
            
        $club = Club::where('id', $member->club_id)->limit(1)->first();
        if($request->get('eventid')){
            $booked = EventRegisterMember::where('member_id',$membershipid)->where('registration_id', $request->get('eventid'))->count();
            if($booked == '0'){
                $booked = 'allowbooking';
            }
            else{
                $booked = 'notallowbooking';
            }
        }
        else{
            $booked = 'notallowbooking';
        }
        if($member->photo != Null){
            $photo = "<img src='https://lionsclubsdistrict325jnepal.org.np/site/uploads/members/".$member->photo."'>";
        }
        else{
            $photo = "<img src='https://lionsclubsdistrict325jnepal.org.np/admin/assets/img/default_logo.jpg' style='width:100%;'>";
        }
       
        return response()->json( array('membername' => $member->name, 'memberphoto'=> $photo, 'memberdesignation'=>$designation->title, 'memberhomeclub'=> $club->name, 'clubid'=> $club->id, 'status' => 'true', 'booked' => $booked));
        
    }
    else{
        return response()->json( array('membername' => 'NULL', 'memberphoto'=> 'NULL', 'memberdesignation'=>'NULL', 'memberhomeclub'=> 'NULL', 'clubid'=> 'NULL', 'status' => 'flase', 'booked' => $booked));
    }
    }
    public function postAddNewDonor(Request $request){
        $member = Member::where('member_membership_no', $request->input('membership_id'))->limit(1)->first();
        $donor = New Donor;
        $donor->donor_type_id = $request->input('donor_type');
        $donor->membership_id = $member->id;
        $donor->club_id = $request->input('clubid');
        $donor->lion_year = env('lion_year');
        $donor->amount = $request->input('amount');
        $donor->save();
        return redirect()->back();
        
    }
    public function getManageDistrictTeam(){
        $data = [
            'districtofficers'=> Districtofficer::all()
        ];
        return view('admin.pages.districtofficer.manage', $data);
    }
    public function getManageDistrictDepartment(){
        $data =[
            'departments'=>Department::where('lion_year', env('lion_year'))->orderby('position', 'asc')->get(),
            'posts' => Officer::all()
        ];
        
        
        return view('admin.pages.department.manage', $data);
    }
    public function getAddDepartmentMember($department){
        $departmentinfo = Department::where('id', $department)->limit(1)->first();
        if($departmentinfo->region == 'Y'){
            $data =[
                'members' => Member_Designation_Enroll::where('department_id', $department)->where('lion_year', env('lion_year'))->get(),
                'departments'=>Department::all(),
                'departmentinfo' => $departmentinfo,
                'posts' => Officer::whereIn('type', ['District', 'other'])->get(),
                'zones' => Region_zone_enroll::where('department_id_region', $departmentinfo->id)->where('lion_year', env('lion_year'))->get(),
                'type' => 'region'
            ];
        }
        elseif($departmentinfo->zone == 'Y'){
            $data =[
                'members' => Member_Designation_Enroll::where('department_id', $department)->where('lion_year', env('lion_year'))->get(),
                'departments'=>Department::all(),
                'departmentinfo' => $departmentinfo,
                'posts' => Officer::whereIn('type', ['District', 'other'])->get(),
                'enrollclubs' => Zone_club_enroll::where('department_id_zone', $departmentinfo->id)->where('lion_year', env('lion_year'))->get(),
                'type' => 'zone'
                
            ];
        }
        else{
            $data =[
                'members' => Member_Designation_Enroll::where('department_id', $department)->where('lion_year', env('lion_year'))->get(),
                'departments'=>Department::all(),
                'departmentinfo' => $departmentinfo,
                'posts' => Officer::whereIn('type', ['District', 'other'])->get(),
                'zones' => '',
                'type' => 'other'
            ];

        }
        
        return view('admin.pages.department.membermanage', $data);
    }
    public function postAddDepartmentMember(Request $request){
        
        $request->validate([
            'membership_id' => ['required'],
            'clubid' => ['required'],
            'departmentid' => ['required'],
            'post_id' => ['required']
        ]);
        

        $member = Member::where('member_membership_no', $request->membership_id)->limit(1)->first();
        $add = New Member_Designation_Enroll;
        $add->member_id = $member->id;
        $add->department_id = $request->departmentid;
        $add->club_id = $request->clubid;
        $add->designation_id = $request->post_id;
        $add->lion_year = env('lion_year');
        $add->save();
        return redirect()->back()->with('status', 'Department member add successfully');
    }
    public function postAddDepartment(Request $request){
       
            $request->validate([
                'department' => ['required']
        ]);
        if($request->zone == 'Y' && $request->region == 'Y'){
            return redirect()->back()->with('message', 'Can not add Zone and Region in same department');
        }
        else{
            $lion_year_slug = Str::slug(env('lion_year'));
            $slug = Str::slug($request->input('department')).'-'.$lion_year_slug;
            $department = New Department;
            $department->title = $request->input('department');
            $department->slug = $slug;
            $department->lion_year = env('lion_year');
            $department->zone = $request->input('zone');
            $department->region = $request->input('region');
            $department->save();
            return redirect()->back()->with('message', 'Department Added Successfully.');
        }
    }
    public function getAddDistrictTeam(){
        $data =[
            'departments'=>Department::all(),
            'designations' => Officer::where('type', 'District Department')->where('lion_year', env('lion_year'))->get()
        ];
        return view('admin.pages.districtofficer.add', $data);
    }
    public function getClubDetail($club){
        $clubinfo = Club::where('slug', $club)->limit(1)->first();
        $data=[
            'club'=>$clubinfo,
            'members'=>Member::where('club_id', $clubinfo->id)->orderby('level', 'desc')->get(),
            'donationtypes' => Donortype::all(),
            'officers' => Officer::where('type', 'Club')->get(),
            'occupations' => Occupation::all()
        ];
        return view('admin.pages.club.detail', $data);
    }
    public function getManageRegistration(){
        return view('admin.pages.registration.manage');
    }
    public function postAddNewRegistration(Request $request){
       
        $request->validate([
            'title' => ['required', 'string', 'max:255']
        ]);
       
        $slug = Str::slug($request->input('title')).'-'.Str::slug(env('lion_year'));
        $check = Registration::where('slug', $slug)->count();
        if($check == 0){
            $registration = New Registration;
            $registration->title = $request->input('title');
            $registration->slug =$slug; 
            $registration->lion_year = env('lion_year');
            $registration->maxperson = $request->input('maxperson');
            $registration->cost = $request->input('cost');
            $registration->date = $request->input('date');
            $registration->vennue = $request->input('vennue');
            $registration->time = $request->input('time');
            $registration->detail = $request->input('detail');
            $registration->registration_stop = $request->input('deadline');
            $registration->hostclub = $request->input('hostclub');
            $registration->BFC = $request->input('BFC');
            $registration->LC = $request->input('LC');
            $registration->DC = $request->input('DC');
            $registration->TC = $request->input('TC');
            $registration->registrationfor = $request->input('registrationfor');
            $registration->save();
            return redirect()->route('admin.getRegistrationList')->with('message', 'New Registration added successfully');
        }
        else{
            return redirect()->back()->with('message', 'Unable to add, due to dublicate title');
        }
    }
    public function getRegistrationList(){
        $data =[
            'events'=> Registration::all()
        ];
        return view('admin.pages.registration.list', $data);
    }
    public function getResetPasswordAndSendSMS($club){
        
        $clubinfo = Club::where('club_membership_id', $club)->limit(1)->first();
        $user = User::where('club_id', $clubinfo->id)->limit(1)->first();
        $password = random_int(1000, 9999);
        $password_hash = Hash::make($password);

        $user->password = $password_hash;
        $user->save();
        // send to sms
        $client = new Client();
       $text_message = 'Dear Lion, Your New login username: '.$club. ' password: '. $password.' For login visit lionsclubsdistrict325jnepal.org.np';
        $res = $client->request('POST', 'https://sms.aakashsms.com/sms/v3/send', [
            'form_params' => [
            
                //'auth_token' => '83f2508165a6b80932415d977644b1ccf83c58fddf380ba4349637751ce03f8a',
                'auth_token' => 'e17b9097e6ec4450ed488ee536924d2b41e4ec8a6ffdac7cff5e2aed0cf4a3c7',
                'from' => '31001',
                'to' => $user->mobile,
                'text' => $text_message,
            ]


        ]);
        return redirect()->route('admin.getManageClub')->with('message', 'Club new password send into '. $user->mobile . ' mobile number');
    }

    public function getMemberDetail($member){
        $member = Member::where('id', $member)->limit(1)->first();
        $club_designation_enroll_check = Member_Designation_Enroll::where('member_id', $member->id)->where('lion_year', env('lion_year'))->limit(1)->first();
        if($club_designation_enroll_check){
            $club_designation = Officer::where('id',$club_designation_enroll_check->designation_id)->limit(1)->first();
        }
        else{
            $club_designation = Null;
        }
        if($member){
            
                $data =[
                    'member' => $member,
                    'club' => Club::where('id', $member->club_id)->limit(1)->first(),
                    'designation' => $club_designation,
                    'donations' => Donor::where('membership_id', $member->member_membership_no)->get(),
                    'occupation' => Occupation::where('id', $member->occupation_id)->limit(1)->first(),
                    'memberPostHistories' => Member_Designation_Enroll::where('member_id', $member->id)->orderby('lion_year', 'desc')->get(),
                    'officers' => Officer::where('type', 'Club')->get(),
                    'occupations' => Occupation::all()
                ];
                return view('admin.pages.club.memberdetail', $data);
            
        }
        else{
            abort(404);
        }
        
    }
    public function postAddNewMember(Request $request){
        
        $request->validate([
            'member_membership_no' => ['required', 'unique:members']
        ]);
        
        if($request->file('photo')){
            $photo = $request->file('photo');
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
        $member->club_id = $request->input('club_id');
        
        $member->name = $request->input('fname');
        $member->member_membership_no = $request->input('member_membership_no');
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
        $enroll_designation->club_id = $request->input('club_id');
        $enroll_designation->designation_id = $request->input('designation_id');
        $enroll_designation->lion_year = env('lion_year');
        $enroll_designation->save();

        return redirect()->route('admin.getClubDetail', $request->input('club_slug'))->with('message', 'Member Added Successfully!!!');
    }
    
    public function getMemberDeleteParmantly($membership_no){
        $checkMemberTable = Member::where('member_membership_no', $membership_no)->limit(1)->first();
        $clubinfo = Club::where('id', $checkMemberTable->club_id)->limit(1)->first();
        if($checkMemberTable){
            DB::table('members')
                ->where('id', $checkMemberTable->id)
                ->delete();
        }

        $checkMemberDesignationEnrollTable = Member_Designation_Enroll::where('member_id', $checkMemberTable->id)->get();
        if($checkMemberDesignationEnrollTable->count()){
            DB::table('member__designation__enrolls')
                ->where('id', $checkMemberTable->id)
                ->delete();
        }

        $checkDonorTable = Donor::where('membership_id',$membership_no)->get();
        if($checkDonorTable->count()){
            DB::table('Donors')
                ->where('membership_id', $membership_no)
                ->delete();
        }
        $checkEventReisterMemberTable = EventRegisterMember::where('member_id',$checkMemberTable->id)->get();
        if($checkEventReisterMemberTable->count()){
            DB::table('EventRegisterMember')
                ->where('member_id', $checkMemberTable->id)
                ->delete();
        }

        return redirect()->route('admin.getClubDetail',$clubinfo->slug)->with('message', 'Member pramantly deleted from system.');
    }
    public function getMemberDrop($membership_no){
        Member::where('member_membership_no', $membership_no)
            ->update([
                'status' => 'Drop'
                ]);
                return redirect()->back()->with('message', 'Member status changed to Drop Memeber successfully.');
    }

    public function getMakeActiveMember($membership_no){
        $check = Member::where('member_membership_no', $membership_no)->limit(1)->first();

        if($check->status == 'Drop'){
            Member::where('member_membership_no', $membership_no)
            ->update([
                'status' => 'Active'
                ]);
                return redirect()->back()->with('message', 'Member status changed to Active Memeber successfully.');
        }
        else{
            abort('404');
        }
    }
    public function postEditMember(Request $request, Member $member){

        $request->validate([
            'member_membership_no' => ['required', 'string', 'max:10', 'unique:members,member_membership_no,'.$member->id]
         ]);

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

        if($request->file('photo')){
            $photo = $request->file('photo');
            $getuniquename_photo = sha1($photo->getClientOriginalName().time());
            $getextension_photo = $photo->getClientOriginalExtension();
            $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
            $photo->move('site/uploads/members/', $getrealname_photo);

            $member->photo = $getrealname_photo;
            $member->name = $request->input('fname');
            $member->member_membership_no = $request->input('member_membership_no');
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
        }
        else{
            $member->name = $request->input('fname');
            $member->member_membership_no = $request->input('member_membership_no');
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
        }
       
        //check for for new lion year or just edit
        $check = Member_Designation_Enroll::where('member_id', $member->id)->where('department_id', NULL)->where('lion_year', env('lion_year'))->count();
        
        if($check != 0){
            Member_Designation_Enroll::
                where('member_id', $member->id )->
                where('department_id', NULL)->
                where('lion_year', env('lion_year'))->
                update([
                    'designation_id' => $request->input('designation_id')
                ]);
                return redirect()->back()->with('message', 'Member edited Successfully!!!');
        }
        else{
            $newlion_year_member = New Member_Designation_Enroll;
            $newlion_year_member->member_id = $member->id;
            $newlion_year_member->club_id = $request->club_id;
            $newlion_year_member->designation_id = $request->input('designation_id');
            $newlion_year_member->lion_year = env('lion_year');
            $newlion_year_member->save();
            return redirect()->back()->with('message', 'Member updated for lion year '.env('lion_year').' Successfully!!!');
        }   
    }

    public function getDepartmentEdit(Department $department){
        $data =[
            'department' => $department
        ];
        return view('admin.pages.department.departmentedit', $data);
    }
    public function postEditDepartment(Department $department, Request $request){
        if($request->zone == 'Y' && $request->region == 'Y'){
            return redirect()->back()->with('message', 'Can not add Zone and Region in same department');
        }
        else{
            $lion_year_slug = Str::slug(env('lion_year'));
            $slug = Str::slug($request->input('department')).'-'.$lion_year_slug;
            $check = Department::where('slug', $slug)->where('id', '!=', $department->id)->where('lion_year', env('lion_year'))->count();
            if($check == 0){
                $department->title = $request->input('department');
                $department->slug = $slug;
                $department->zone = $request->input('zone');
                $department->region = $request->input('region');
                $department->save();
                return redirect()->back()->with('message', 'Department Edited Successfully.');
            }
            else{
                return redirect()->back()->with('message', 'Unable to edit due to dublicate department title');
            }
        }
    }
    public function postSortMember(Request $request){
        dd($request->all());
        foreach ($request->level as $key => $level) {
            //dd($level['id']);
            $post = Member::find($level['id'])->update(['level' => $level['level']]);
        }

        return response('Update Successfully.', 200);
    }

    public function getProfile(){
        $data =[
            'profile' => Admin::where('id', Auth()->user()->id)->limit(1)->first()
        ];
        return view('admin.pages.profile.index', $data);
    }
    public function postAdminPasswordChange(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],

        ]);
        Admin::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->with('message', 'Password changed successfully.');
    }
    public function getAutoCompleteZoneList(Request $request){
        if($request->ajax()){
            $data = Department::where('title', 'LIKE', '%'.$request->zonename.'%')->where('zone', 'Y')->get();
            $output = '';
            if(count($data) > 0){
                $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999">';
                    foreach($data as $row){
                        $output .= '<li class="list-group-item listed-zone-name" id="'.$row->id.'">'.$row->title.'</li>';
                    }
                $output .= '</ul>';
            }
            else{
                $output .= '<li class="list-group">No zone found.</li>';
            }

        }
        return $output;
    }

    public function postAddRegionKoZone(Request $request){
        $request->validate([
            'regionid' => ['required'],
            'zoneid' => ['required']
         ]);
         //check double entry
         $check = Region_zone_enroll::where('department_id_zone', $request->input('zoneid'))->where('lion_year', env('lion_year'))->count();
         if($check == 0){
            $regionkozoneenroll = New Region_zone_enroll;
            $regionkozoneenroll->department_id_region = $request->input('regionid');
            $regionkozoneenroll->department_id_zone = $request->input('zoneid');
            $regionkozoneenroll->lion_year = env('lion_year');
            $regionkozoneenroll->save();
            return redirect()->back()->with('message', 'Zone added to region successfully');
         }
         else{
            $check1 = Region_zone_enroll::where('department_id_zone', $request->input('zoneid'))->where('lion_year', env('lion_year'))->limit(1)->first();
            $zoneinfo = Department::find($request->input('zoneid'));
            $regioninfo = Department::find($request->input('regionid'));

            return redirect()->back()->with('message', $zoneinfo->title.' already added in '.$regioninfo->title);
         }
         
    }
    public function getAutoCompleteClubList(Request $request){
        if($request->ajax()){
            $data = Club::where('name', 'LIKE', '%'.$request->clubname.'%')->where('deleted', 'N')->get();
            $output = '';
            if(count($data) > 0){
                $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999">';
                    foreach($data as $row){
                        $output .= '<li class="list-group-item listed-club-name" id="'.$row->id.'">'.$row->name.'('.$row->club_membership_id.')</li>';
                    }
                $output .= '</ul>';
            }
            else{
                $output .= '<li class="list-group">No Club found</li>';
            }

        }
        return $output;
    }
    public function postAddZoneKoClub(Request $request){
        $request->validate([
        'clubid' => ['required'],
        'zoneid' => ['required']
     ]);
        //check double entry
        $check = Zone_club_enroll::where('club_id', $request->input('clubid'))->where('lion_year', env('lion_year'))->count();
        if($check == 0){
                $zonekoclub = New Zone_club_enroll;
                $zonekoclub->department_id_zone = $request->input('zoneid');
                $zonekoclub->club_id = $request->input('clubid');
                $zonekoclub->lion_year = env('lion_year');
                $zonekoclub->save();
                return redirect()->back()->with('message', 'Club added to zone successfully');
        }
        else{
            $check1 = Zone_club_enroll::where('club_id', $request->input('clubid'))->where('lion_year', env('lion_year'))->limit(1)->first();
            $clubinfo = Club::find($request->input('clubid'));
            $zoneinfo =Department::where('id', $check1->department_id_zone)->limit(1)->first();
            return redirect()->back()->with('message', $clubinfo->name.' already added in '.$zoneinfo->title);
        }
     
    }
    public function getZoneEnrollClubDelete(Zone_club_enroll $zonekoclub){
        $zonekoclub->delete();
        return redirect()->back()->with('message', 'Club remove from zone successfully');
    }
    public function getDeleteDepartment(Department $department){
        if($department->zone == Null && $department->region == Null){
            $checkenroll = Member_Designation_Enroll::where('department_id', $department->id)->count();
            if($checkenroll == 0){
                $department->delete();
                return redirect()->back()->with('message', 'Department deleted successfully');
            }
            else{
                return redirect()->back()->with('message', 'Unable to delete Department due to Member exit on this department');
            }
        }
        else{
            $checkenroll = Member_Designation_Enroll::where('department_id', $department->id)->count();
            if($checkenroll == 0){
                $department->delete();
                return redirect()->back()->with('message', 'Department deleted successfully');
            }
            else{
                return redirect()->back()->with('message', 'Unable to delete Department due to Member exit on this department');
            }

            if($department->zone != Null){
                $checkzoneenroll = Region_zone_enroll::where('department_id_zone', $department->id)->get();
                
                if($checkzoneenroll->count()){
                    $checkzoneenroll = Region_zone_enroll::where('department_id_zone', $department->id)->delete();
                    $department->delete();
                    return redirect()->back()->with('message', 'Department deleted successfully');
                }
                else{
                    $department->delete();
                    return redirect()->back()->with('message', 'Department deleted successfully');
                }
            }
            else{
                $checkregionenroll = Region_zone_enroll::where('department_id_region', $department->id)->get();
                if($checkregionenroll->count()){
                    $checkregionenroll = Region_zone_enroll::where('department_id_region', $department->id)->delete();
                    $department->delete();
                    return redirect()->back()->with('message', 'Department deleted successfully');
                }
                else{
                    $department->delete();
                    return redirect()->back()->with('message', 'Department deleted successfully');
                }
            }
        }
        
    }
    public function getDeleteEnrollMember(Member_Designation_Enroll $member){
        $member->Delete();
        return redirect()->back()->with('message', 'Member enrollment has been deleted.');
    }
    public function getAllMembers(){
        $data =[
            'members' => Member::orderby('name', 'desc')->get()
        ];
        return view('admin.pages.members.list', $data);
    }
    public function getRegstrationDetail(Registration $registration){
        $data=[
            'eventinfo' => $registration,
            'registered_members' =>EventRegisterMember::where('registration_id', $registration->id)->where('payment_status', 'Y')->get(),
            'allclubs' => Club::where('deleted', 'N')->get()
        ];
        return view('admin.pages.registration.bookingdetail', $data);
    }
    public function getBookingMemberPrintMaterials(EventRegisterMember $register){
        $memberinfo = Member::where('member_membership_no', $register->member_id)->limit(1)->first();
        $post = Member_Designation_Enroll::where('member_id', $memberinfo->id)->where('department_id', '!=', Null)->where('lion_year', $register->lion_year)->limit(1)->first();
        if($post){
            $departmentinfo = Department::find($post->department_id);
            $designationinfo = Officer::find($post->designation_id);
        }
        else{
            $departmentinfo = '';
            $post1 = Member_Designation_Enroll::where('member_id', $memberinfo->id)->where('department_id', Null)->where('lion_year', $register->lion_year)->limit(1)->first();
            $designationinfo = Officer::find($post1->designation_id);
        }
        
        $data =[
            'eventinfo' => Registration::find($register->registration_id),
            'memberinfo' => $memberinfo,
            'clubinfo' => Club::find($register->club_id),
            'departmentinfo' => $departmentinfo,
            'designationinfo' => $designationinfo,
            'bookinginfo' => $register
        ];
        return view('admin.pages.registration.bookingmaterialprint', $data);
    }
    public function getEventDashboard(Registration $registration){
        $data=[
            'eventinfo' => $registration,
            'registered_members' =>EventRegisterMember::where('registration_id', $registration->id)->where('payment_status', 'Y')->get(),
            'allclubs' => Club::where('deleted', 'N')->get()
        ];
        return view('admin.pages.registration.dashboard', $data);

    }
    public function getContactpersonChangeAjax(Request $request){
        $clubid = $request->get('clubid');
        $clubinfo = Club::find($clubid);
        $user = User::where('club_id', $clubid)->limit(1)->first();
        $officer = Officer::find($clubinfo->contact_person_designation);
       
        return response()->json(array('clubname' => $clubinfo->name, 'clubmemberid'=> $clubinfo->club_membership_id, 'contactperson'=>$clubinfo->contact_person, 'mobilenumber'=> $user->mobile, 'contact_person_designation' => $clubinfo->contact_person_designation, 'contact_person_designation_title' => $officer->title ));

    }
    public function postContactPersonModeify(Request $request){
        
        $smspassword = $request->get('smspassword');
        $clubinfo = Club::where('club_membership_id', $request->get('club_membership_id'))->limit(1)->first();
        $userinfo = User::where('club_id', $clubinfo->id)->limit(1)->first();

        $clubinfo->contact_person = $request->get('contact_name');
        $clubinfo->contact_person_designation = $request->get('club_officer_id');
        $clubinfo->save();

        $userinfo->mobile = $request->get('mobile');
        if($smspassword == 'on'){
            $password = random_int(1000, 9999);
            $password_hash = Hash::make($password);
            $userinfo->password = $password_hash;
            
       
        
        // send to sms
        $client = new Client();
       $text_message = 'Dear '. $clubinfo->type .', Your New login username: '.$userinfo->email. ' password: '. $password;
        $res = $client->request('POST', 'https://sms.aakashsms.com/sms/v3/send', [
            'form_params' => [
                'auth_token' => 'e17b9097e6ec4450ed488ee536924d2b41e4ec8a6ffdac7cff5e2aed0cf4a3c7',
                'from' => '31001',
                'to' => $userinfo->mobile,
                'text' => $text_message,
            ]


        ]);
        }
        $userinfo->save();
        if($smspassword != 'on'){
            return redirect()->back()->with('message', 'Club contact person modified success');
        }
        else{
            return redirect()->back()->with('message', 'Club contact person modified success and new password has been send on mobile Number');
        }

    }
    public function Ajaxmembersforregister(Request $request){
       if(is_numeric($request->get('searchvalue'))){
        if($request->ajax()){
            $data = Member::where('member_membership_no', 'LIKE', '%'.$request->get('searchvalue').'%')->get();
            $output = '';
            if(count($data) > 0){
                $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999">';
                    foreach($data as $row){
                        $output .= '<li class="list-group-item listed-zone-name" id="'.$row->member_membership_no.'">'.$row->name.'('.$row->member_membership_no.')</li>';
                    }
                    $output .= '</ul>';
            }
            else{
                $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999">';
                $output .= '<li class="list-group-item">Sorry Member not found on system</li>';
                $output .= '</ul>';
            }
            

        }
        return response()->json( array('data' => $output, 'memberphoto'=> 'photo', 'memberdesignation'=>'NULL', 'memberhomeclub'=> 'NULL', 'clubid'=> 'NULL', 'status' => 'flase'));
        
       }
       else{
        if($request->ajax()){
            $data = Member::where('name', 'LIKE', '%'.$request->get('searchvalue').'%')->get();
            $output = '';
            if(count($data) > 0){
                $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999">';
                    foreach($data as $row){
                        $output .= '<li class="list-group-item listed-zone-name" id="'.$row->member_membership_no.'">'.$row->name.'('.$row->member_membership_no.')</li>';
                    }
                $output .= '</ul>';
            }
            else{
                $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999"><li class="list-group">Sorry member not found in system.</li></ul>';
                
            }

        }
        return response()->json( array('data' => $output, 'memberphoto'=> 'photo', 'memberdesignation'=>'NULL', 'memberhomeclub'=> 'NULL', 'clubid'=> 'NULL', 'status' => 'flase'));
       }
    }
    public function AjaxMemberRegistration(Request $request){
        $memberno = $request->get('membershipno');
        $memberinfo = Member::where('member_membership_no', $memberno)->limit(1)->first();
       
        $eventinfo = Registration::find($request->get('eventid'));
        
        // clubid-eventid-memberno
        $register = New EventRegisterMember;
        $register->registration_id = $request->get('eventid');
        $register->club_id = $memberinfo->club_id;
        $register->member_id = $memberno;
        $register->hash = $memberinfo->club_id.'-'.$request->get('eventid').'-'.$memberno;
        $register->status = 'Y';
        $register->payment_type = 'Pay on Office';
        $register->cost = $eventinfo->cost;
        $register->lion_year = env('lion_year');
        $register->payment_id = $request->get('billno');
        $register->payment_status = 'Y';
        $register->save();
        return redirect()->back()->with('message', 'Member Register successfully.');
    }
    public function AjaxAutocompleteClubList(Request $request){
        if(is_numeric($request->get('clubsearch'))){
            if($request->ajax()){
                $data = Club::where('club_membership_id', 'LIKE', '%'.$request->get('clubsearch').'%')->get();
                $output = '';
                if(count($data) > 0){
                    $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999">';
                        foreach($data as $row){
                            $output .= '<li class="list-group-item listed-zone-name" id="'.$row->club_membership_id.'">'.$row->name.'('.$row->club_membership_id.')</li>';
                        }
                        $output .= '</ul>';
                }
                else{
                    $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999">';
                    $output .= '<li class="list-group-item">Sorry club not found on system</li>';
                    $output .= '</ul>';
                }
                
    
            }
            return response()->json( array('data' => $output, 'memberphoto'=> 'photo', 'memberdesignation'=>'NULL', 'memberhomeclub'=> 'NULL', 'clubid'=> 'NULL', 'status' => 'flase'));
            
           }
           else{
            if($request->ajax()){
                $data = Club::where('name', 'LIKE', '%'.$request->get('clubsearch').'%')->get();
                $output = '';
                if(count($data) > 0){
                    $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999">';
                        foreach($data as $row){
                            $output .= '<li class="list-group-item listed-club-name" id="'.$row->id.'">'.$row->name.'('.$row->club_membership_id.')</li>';
                        }
                    $output .= '</ul>';
                }
                else{
                    $output .= '<ul class="list-group" style="display:block; position:relative; z-index:9999"><li class="list-group">Sorry Club not found in system.</li></ul>';
                    
                }
    
            }
            return response()->json( array('data' => $output, 'memberphoto'=> 'photo', 'memberdesignation'=>'NULL', 'memberhomeclub'=> 'NULL', 'clubid'=> 'NULL', 'status' => 'flase'));
           }
    }
    public function AjaxgetClubMembers(Request $request){
       
        $members = Member::where('club_id', $request->get('clubid'))->where('status', 'Active')->get();
        $clubinfo = Club::find($request->get('clubid'));
        $registrationid = $request->get('eventid');

        $output = '';
        
        if(count($members) > 0){
            $output .= '<ul style="padding:0; margin:0; list-style-type: none; columns: 2; -webkit-columns: 2; -moz-columns: 2;">';
            foreach($members as $row){
                        $check = EventRegisterMember::where('member_id', $row->member_membership_no)->where('registration_id', $registrationid)->where('payment_status', 'Y')->get();
                        $post = Member_Designation_Enroll::where('member_id', $row->id)->where('lion_year', env('lion_year'))->limit(1)->first();
                        $degination = Officer::where('id', $post->designation_id)->limit(1)->first();
                        if($check->count() == 0){
                            $booked = '';
                        }
                        else{
                            $booked = 'disabled';
                        }
                    
                    $output  .= '
                        <li class="listed-club-name1" style="line-height: 50px; padding-bottom: 20px; overflow:hidden; display:block; min-height:30px">
                            <input type="checkbox" class="membercheckbox" value="'.$row->member_membership_no.'" name="membercheckbox[]" class="membercheckbox"'.$booked.'> '
                            . $clubinfo->club_type.' '.$row->name.'
                            <small style="display: block; line-height:3px; color: blue;">&nbsp; &nbsp; &nbsp;'.$degination->title.'</small>
                        </li>
                    ';
            }

            $output .= '</ul>';
        }
        else{
            $output .= '<ul style="padding:0; margin:0; list-style-type: none;"><li>No member</li></ul>';
        }
       
        return response()->json( array('members' => $output, 'memberphoto'=> 'photo', 'memberdesignation'=>'NULL', 'memberhomeclub'=> 'NULL', 'clubid'=> 'NULL', 'status' => 'flase'));
    }
    public function clubMembeRegister(Request $request, $event){
        
        $registration_id = $event;
        $totalmember = count(collect($request)->get('membercheckbox'));
        $club_id = $request->get('clubidforregistergroup');

        $event = Registration::find( $registration_id);
        $cost = $event->cost;
        
        
        

        for ($i = 0; $i < $totalmember; $i++)
        {
            // hash = clubid-eventid-memberno
            $hash = $club_id.'-'.$registration_id.'-'.$request->input('membercheckbox')[$i];
            $register = New EventRegisterMember;
            $register->registration_id = $registration_id;
            $register->club_id = $club_id;
            $register->member_id = $request->input('membercheckbox')[$i];
            $register->hash = $hash;
            $register->cost = $cost;
            $register->lion_year = env('lion_year');
            $register->payment_type = 'Pay on Office';
            $register->status = 'Y';
            $register->payment_id = $request->get('billnogroup');
            $register->save();
        }
        return redirect()->back()->with('message', 'Club Members Register successfully.');
    }
    public function getRegistrationDelete(Registration $event){
        $check = EventRegisterMember::where('registration_id', $event->id)->count();
        if($check == 0){
            $event->delete();
            return redirect()->back()->with('message', 'Successfully Deleted Registration');
        }
        else{
            return redirect()->back()->with('message', 'Unable to delete, due to already book.');
        }
    }
    public function getRegirationEdit(Registration $event){
        $data =[
            'event' => $event
        ];
        return view('admin.pages.registration.editregistration', $data);
    }
    public function postEditNewRegistration(Request $request, Registration $event){
        $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'cost' => ['required', 'integer'],
        'date' => ['required', 'date'],
        'vennue' => ['required', 'string', 'max:255'],
        

    ]);
   
    $slug = Str::slug($request->input('title')).'-'.Str::slug(env('lion_year'));
    $check = Registration::where('slug', $slug )->where('id', '!=', $event->id)->count();
    if($check == 0){
    
        $event->title = $request->input('title');
        $event->slug =$slug; 
        $event->lion_year = env('lion_year');
        $event->maxperson = $request->input('maxperson');
        $event->cost = $request->input('cost');
        $event->date = $request->input('date');
        $event->vennue = $request->input('vennue');
        $event->time = $request->input('time');
        $event->detail = $request->input('detail');
        $event->registration_stop = $request->input('deadline');
        $event->hostclub = $request->input('hostclub');
        $event->BFC = $request->input('BFC');
        $event->LC = $request->input('LC');
        $event->DC = $request->input('DC');
        $event->TC = $request->input('TC');
        $event->registrationfor = $request->input('registrationfor');
        $event->save();
        return redirect()->back()->with('message', 'Registration Modify successfully.');
    }
    else{
        return redirect()->back()->with('message', 'Unable to edit, due to dublicate title');
    }
    }
    public function getHostClubList(){
        $data =[
            'registrations' => Registration::all()
        ];
        return view('admin.pages.hostclub.manage', $data);
    }
    public function postAddHost(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'max:255', 'unique:hosts,email']
        ]);

        $registrationinfo = Registration::find($request->input('registration'));
        
        $password = random_int(1000, 9999);
        $host = New Host;
        $host->name = $request->input('name');
        $host->email = $request->input('email');
        $host->password = Hash::make($password);
        $host->save();

        $enroll = New Registrationhostenroll;
        $enroll->host_id = $host->id;
        $enroll->registration_id = $request->input('registrationid');
        $enroll->save();
        //send email 
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'registrationinfo' => $registrationinfo
        ];
       // Mail::to($request->input('email'))->send(new HostMail($data));
        return redirect()->back()->with('message', 'Host Panel added successfully');
    }
    public function postAjaxHostList(Request $request){
        $registrationid = $request->get('registration');
        $registration = Registration::find($registrationid);
       
        $hostusers = Registrationhostenroll::where('registration_id', $registrationid)->get();
        $output = '';
            foreach($hostusers as $user){
                $userinfo = Host::where('id', $user->host_id)->limit(1)->first();
                $output .= '
                <tr>
                    <td>'.$userinfo->name.'</td>
                    <td>'.$userinfo->email.'</td>
                    <td><a href="http://localhost:8000/admin/hostpanel/delete/'.$user->id.'">Delete</a></td>
                </tr>
                ';
            }
            return response()->json( array('output' => $output, 'registration' => $registration->title));
    
    }
    public function getDeleteHostEnroll(Registrationhostenroll $hostenroll){
        $hostenroll->delete();
        Host::where('id', $hostenroll->host_id)->delete();
        return redirect()->back()->with('message', 'Host Panel deleted successfully');
    }
    public function postDepartmentPositionChange(Request $request, Department $department){
        
        $department->position = $request->input('position');
        $department->save();
        return redirect()->back()->with('message', 'Depatment position change successfully');
    }
    public function getManagePDFDocuments(){
        $data =[

        ];
        return view('admin.pages.pdf.manage', $data);
    }
    public function postPdfDocument(Request $request, $type){
        if($type == 'bloodbank'){
            
        }
    }
}
