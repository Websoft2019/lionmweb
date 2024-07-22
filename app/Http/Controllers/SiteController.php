<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Governorteam;
use App\Models\Program;
use App\Models\Club;
use App\Models\Donortype;
use App\Models\Donor;
use App\Models\News;
use App\Models\Notice;
use App\Models\Department;
use App\Models\Member_Designation_Enroll;
use App\Models\Member;
use App\Models\Officer;
use PDF;
use App\Models\DCalendar;

class SiteController extends Controller
{
    private function getCalender()
    {
        $lionYear = explode('/', env("lion_year"));
        $startYear = $lionYear[0];
        $endYear = 20 . $lionYear[1];

        return [
            'july' => DCalendar::where('event_month', $startYear . "-" . "07")->get(),
            'august' => DCalendar::where('event_month', $startYear . "-" . "08")->get(),
            'september' => DCalendar::where('event_month', $startYear . "-" . "09")->get(),
            'october' => DCalendar::where('event_month', $startYear . "-" . "10")->get(),
            'november' => DCalendar::where('event_month', $startYear . "-" . "11")->get(),
            'december' => DCalendar::where('event_month', $startYear . "-" . "12")->get(),
            'january' => DCalendar::where('event_month', $endYear . "-" . "01")->get(),
            'february' => DCalendar::where('event_month', $endYear . "-" . "02")->get(),
            'march' => DCalendar::where('event_month', $endYear . "-" . "03")->get(),
            'april' => DCalendar::where('event_month', $endYear . "-" . "04")->get(),
            'may' => DCalendar::where('event_month', $endYear . "-" . "05")->get(),
            'june' => DCalendar::where('event_month', $endYear . "-" . "06")->get(),
        ];
    }

    public function getHome(){
        $data =[
            'programs'=>Program::where('lion_year', '2022/23')->get(),
            'notices' => Notice::orderby('id', 'desc')->get(),
            'donations' => Donortype::all(),
            'dates' => $this->getCalender(),
        ];
        return view('site.home', $data);

    }
    public function getAboutUs(){
        return view('site.aboutus');
    }
    public function getgovernorTeams(){
        $data =[
            'teams'=>Department::where('lion_year', env('lion_year'))->where('region', Null)->where('zone', Null)->get()
        ];
        return view('site.governorteam', $data);
    }
    public function getProgramDetail($program){
        $data =[
            'program'=>Program::where('slug', $program)->limit(1)->first(),
            'programs'=>Program::where('slug', '!=', $program)->get()
        ];
        return view('site.programdetail', $data);
    }
    public function getDonorDetail($donortype){ 
        $donortype = Donortype::where('slug', $donortype)->limit(1)->first();
        $data =[
            'donortype' => $donortype,
            'donors' => Donor::where('donor_type_id', $donortype->id)->get()
        ];
        
        return view('site.donor', $data);
    }
    public function getClubs(){
        $data=[
            'clubs' =>Club::where('status', 'Y')->orderby('name', 'asc')->get()
        ];
        return view('site.club', $data);
    }
    public function getContact(){
        return view('site.contact');
    }
    public function getDepartmentTeams($department){
        $departmentinfo = Department::where('slug', $department)->limit(1)->first();
          
        $data =[
            'teams' => Member_Designation_Enroll::where('department_id', $departmentinfo->id)->where('lion_year', env('lion_year'))->get(),
            'department' => $departmentinfo
        ];
        return view('site.departmentteam', $data);
    }
    public function getRegionzonedevision(){
        $data =[
            'regions' => Department::where('region', 'Y')->where('lion_year', env('lion_year'))->get(),
        ];
        
        return view('site.region-zone', $data);
    }
    public function getNews(){
        $data =[
            'news' => News::all()
        ];
        return view('site.news', $data);
    }
    public function getProjects(){
        $data =[
            'programs' => Program::all()
        ];
        return view('site.projects', $data);
    }
    public function getNewsDetail($slug){
        $new = News::where('slug', $slug)->limit(1)->first();
        $data =[
            'new' => $new,
            'news' => News::where('id', '!=', $new->id)->get()
        ];
        return view('site.newsdetail', $data);
    }
    public function getNoticeDetail (Notice $notice){
        $data =[
            'notice' => $notice,
            'notices' => Notice::where('id', '!=', $notice->id)->get()
        ];
        return view('site.noticedetail', $data);
    }
    public function getPrintCard($membershipno){
            $memberinfo = Member::where('member_membership_no',$membershipno)->limit(1)->first();
            $clubinfo = Club::where('id', $memberinfo->club_id)->limit(1)->first();
            $degination = Member_Designation_Enroll::where('member_id', $memberinfo->id)->where('lion_year', env('lion_year'))->where('department_id', '!=', Null)->limit(1)->first();
                  if($degination){
                    $enrollpost = $degination;
                    $departmentinfo = Department::find($enrollpost->department_id);
                    $post = Officer::find($enrollpost->designation_id);
                    $departmenttitle = $departmentinfo->title;
                  }
                  else{
                    $enrollpost = Member_Designation_Enroll::where('member_id', $memberinfo->id)->where('lion_year', env('lion_year'))->limit(1)->first();
                    $post = Officer::find($enrollpost->designation_id);
                    $departmenttitle = '';
                  }
                $gov = Member_Designation_Enroll::where('designation_id', '33355')->where('lion_year', env('lion_year'))->where('department_id', '!=', Null)->limit(1)->first();
                $govinfo = Member::find($gov->member_id);
                $govname = $govinfo->name;
                $donnerinfo = Donor::where('membership_id', $membershipno)->limit(1)->first();
                if($donnerinfo){
                    $donortypeinfo = Donortype::find($donnerinfo->id);
                    $donor = $donortypeinfo->title;
                }
                else{
                    $donor = '';
                }
                



        $data =[
            'membername' => $memberinfo->name,
            'member_membership_no' => $memberinfo->member_membership_no,
            'personal_contact_number' => $memberinfo->personal_contact_number,
            'email' => $memberinfo->email,
            'blood_group' => $memberinfo->blood_group,
            'clubname' => $clubinfo->name,
            'clubno' => $clubinfo->club_membership_id,
            'memberphoto' => $memberinfo->photo,
            'posttitle' => $post->title,
            'departmenttitle' => $departmenttitle,
            'govname' => $govname,
            'membertype' => $clubinfo->club_type,
            'membercontribution' => $donor,
            'qrcode' => $clubinfo->id.'-'.$membershipno.'-'.env('lion_year')
        ];
        return view('site.card', $data);
    }
    public function getAjaxclubMember(Request $request){

        $clubid = $request->get('clubid');
        $clubinfo = Club::find($clubid);
        $members = Member::where('club_id', $clubid)->where('status', 'Active')->get();
       
        $data ='';
        foreach($members as $member){
                $checkdonorPMJF = Donor::where('donor_type_id', 1)->where('membership_id',$member->id)->get();
                if($checkdonorPMJF->count()){
                    $donortitle = 'PMJF';
                }
                else{
                    $checkdonorMJF = Donor::where('donor_type_id', 2)->where('membership_id',$member->id)->get();
                    if($checkdonorMJF->count()){
                        $donortitle = 'MJF';
                    }
                    else{
                        $donortitle = '';
                    }
                }

            $postenroll = Member_Designation_Enroll::where('member_id', $member->id)->where('department_id', Null)->where('lion_year', env('lion_year'))->limit(1)->first();
            $post = Officer::find($postenroll->designation_id);
            $data .= "
                <tr>
                    
                    <td>".$donortitle.' '.$clubinfo->club_type.' '.$member->name."</td>
                    <td>".$post->title."</td>
                </tr>
            ";
        }
        return response()->json([
        'memberlist'=> $data,
        'modeltitle' => $clubinfo->name.' Club Members List'
        ]);
    }
    public function getPrivacy(){
        return view('site.privacy');
    }
    public function getTerms(){
        return view('site.terms');
    }
}
