<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Governorteam;
use App\Models\Program;
use App\Models\Donortype;
use App\Models\Officer;
use App\Models\News;
use App\Models\Notice;

class AdminCMSController extends Controller
{
    public function getManageGovernorTeam(){
        $data =[
            'teams'=>Governorteam::where('lion_year', env('lion_year'))->get()
        ];
        return view('admin.cms.governorteam.manage', $data);
    }
    public function postAddGovernorTeam(Request $request){
        $photo = $request->file('photo');
        $getuniquename_photo = sha1($photo->getClientOriginalName().time());
        $getextension_photo = $photo->getClientOriginalExtension();
        $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
        $photo->move('site/uploads/governorteams/', $getrealname_photo);

        $team = New Governorteam;
        $team->name = $request->input('name');
        $team->lion_year = env('lion_year');
        $team->designation =$request->input('designation');
        $team->membership_id = $request->input('membership_id');
        $team->motherclub = $request->input('mother_club');
        $team->contactnumber = $request->input('contact_number');
        $team->email = $request->input('email');
        $team->photo = $getrealname_photo;
        $team->save();
        return redirect()->back();

    }
    public function getManageProgram(){
        $data =[
        'programs'=>Program::where('lion_year', env('lion_year'))->get()
        ];
        return view('admin.cms.program.manage', $data);
    }
    public function postAddProgram(Request $request){
        $photo = $request->file('photo');
        $slug = Str::slug($request->input('title'));
        $getuniquename_photo = sha1($photo->getClientOriginalName().time());
        $getextension_photo = $photo->getClientOriginalExtension();
        $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
        $photo->move('site/uploads/program/', $getrealname_photo);

        $program = New Program;
        $program->title = $request->input('title');
        $program->slug = $slug;
        $program->detail = $request->input('detail');
        $program->photo = $getrealname_photo;
        $program->lion_year = env('lion_year');
        $program->save();
        return redirect()->back();
        
    }
    public function getManageDonorType(){
        $data =[
            'donors'=>Donortype::all()
        ];
        return view('admin.cms.donor.managedonortype', $data);
    }
    public function postAddDonorType(Request $request){
        if($request->file('photo')){
            $photo = $request->file('photo');
            $getuniquename_photo = sha1($photo->getClientOriginalName().time());
            $getextension_photo = $photo->getClientOriginalExtension();
            $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
            $photo->move('site/uploads/program/', $getrealname_photo);
        }
        else{
            $getrealname_photo = Null;
        }

        $slug = Str::slug($request->input('title'));

        $donortype = New Donortype;
        $donortype->title = $request->input('title');
        $donortype->slug = $slug;
        $donortype->photo = $getrealname_photo;
        $donortype->detail = $request->input('detail');
        $donortype->mincost = $request->input('mincost');
        $donortype->lion_year = env('lion_year');
        $donortype->save();
        return redirect()->back();
    }

    public function getManagePost(){
        $data =[
            'officers' => Officer::all()
        ];
        return view('admin.cms.post.manage', $data);
    }
    public function postAddOfficer(Request $request){
        $slug = Str::slug($request->input('officertitle'));
       
            $officer = New Officer;
            $officer->title = $request->input('officertitle');
            $officer->slug = $slug;
            $officer->type = $request->input('associatewith');
            $officer->lion_year = env('lion_year');
            $officer->save();
        return redirect()->back()->with('message', 'Officer Designation added successfully.'); 
    }
    public function getEditOfficer(Officer $officer){
       
        $data =[
            'officer' => $officer
        ];
        return view('admin.cms.post.edit', $data);
    }
    public function postEditOfficer(Request $request, Officer $officer){
        $slug = Str::slug($request->input('officertitle'));
            $officer->title = $request->input('officertitle');
            $officer->slug = $slug;
            $officer->type = $request->input('associatewith');
            $officer->lion_year = $request->input('lion_year');
            $officer->save();
        return redirect()->back()->with('message', 'Officer Designation edited successfully.'); 
    }

    public function getManageNews(){
        $data =[
            'news' => News::all()
        ];
        return view('admin.pages.news.manage', $data);
    }
    public function postAddNews(Request $request){
        $photo = $request->file('photo');
        $slug = Str::slug($request->input('title'));
        $check = News::where('slug', $slug)->count();
        if($check == 0){
            if($photo){
                $getuniquename_photo = sha1($photo->getClientOriginalName().time());
                $getextension_photo = $photo->getClientOriginalExtension();
                $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
                $photo->move('site/uploads/news/', $getrealname_photo);
            }
            else{
                $getrealname_photo = Null;
            }

            $news = New News;
            $news->title = $request->input('title');
            $news->slug = $slug;
            $news->detail = $request->input('detail');
            $news->photo = $getrealname_photo;
            $news->save();
            return redirect()->back()->with('message', 'News added successfully.'); 
        }
        else{
            return redirect()->back()->with('message', 'Unable to add news due to dublicate title');
        }
    }
    public function getEditNews(News $news){
        $data =[
            'news' => $news
        ];
        return view('admin.pages.news.edit', $data);
    }
    public function postEditNews(Request $request, News $news){
        $photo = $request->file('photo');
        $slug = Str::slug($request->input('title'));
        $check = News::where('slug', $slug)->where('id', '!=', $news->id)->count();
        if($check == 0){
            if($photo){
                $getuniquename_photo = sha1($photo->getClientOriginalName().time());
                $getextension_photo = $photo->getClientOriginalExtension();
                $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
                $photo->move('site/uploads/news/', $getrealname_photo);
                $news->title = $request->input('title');
                $news->slug = $slug;
                $news->detail = $request->input('detail');
                $news->photo = $getrealname_photo;
                $news->save();
                return redirect()->route('getManageNews')->with('message', 'News edited successfully.'); 
            }
            else{
                $news->title = $request->input('title');
                $news->slug = $slug;
                $news->detail = $request->input('detail');
                $news->save();
                return redirect()->route('admin.getManageNews')->with('message', 'News edited successfully.'); 
            }

            
        }
        else{
            return redirect()->back()->with('message', 'Unable to edit news due to dublicate title');
        }
    }
    public function getDeleteNews(News $news){
        $news->delete();
        return redirect()->back()->with('message', 'News Deleted Successfully');
    }

    public function getManageNotice(){
        $data =[
            'notices' => Notice::all()
        ];
        return view('admin.pages.notice.manage', $data);
    }
    public function postAddNotice(Request $request){
        $photo = $request->file('photo');
       
            if($photo){
                $getuniquename_photo = sha1($photo->getClientOriginalName().time());
                $getextension_photo = $photo->getClientOriginalExtension();
                $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
                $photo->move('site/uploads/notices/', $getrealname_photo);
            }
            else{
                $getrealname_photo = Null;
            }

            $news = New Notice;
            $news->title = $request->input('title');
            $news->detail = $request->input('detail');
            $news->photo = $getrealname_photo;
            $news->save();
            return redirect()->back()->with('message', 'Notice added successfully.'); 
    }
    public function getEditNotice(Notice $notice){
        $data =[
            'news' => $notice
        ];
        return view('admin.pages.notice.edit', $data);
    }
    public function postEditNotice(Request $request, Notice $notice){
        $photo = $request->file('photo');
           //dd($request->all());
            if($photo){
                $getuniquename_photo = sha1($photo->getClientOriginalName().time());
                $getextension_photo = $photo->getClientOriginalExtension();
                $getrealname_photo = $getuniquename_photo.'.'.$getextension_photo;
                $photo->move('site/uploads/notices/', $getrealname_photo);

                $notice->title = $request->input('title');
                $notice->detail = $request->input('detail');
                $notice->photo = $getrealname_photo;
                $notice->save();
                return redirect()->route('getManageNews')->with('message', 'Notice edited successfully.'); 
            }
            else{
                $notice->title = $request->input('title');
                $notice->detail = $request->input('detail');
                $notice->save();
                return redirect()->route('admin.getManageNotice')->with('message', 'Notice edited successfully.'); 
            }
        
    }
    public function getDeleteNotice(Notice $notice){
        $notice->delete();
        return redirect()->back()->with('message', 'Notice Deleted Successfully');
    }

}
