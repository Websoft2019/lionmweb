<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member_Designation_Enroll;

class Member_Designation_Enroll extends Model
{
    use HasFactory;

    static function CheckDoubleEntryOfPost($club_id, $post_id, $lion_year){
        $check = Member_Designation_Enroll::where('club_id', $club_id)->where('designation_id', $post_id)->where('lion_year', $lion_year)->count();
        if($check == 0){
            $status = 'allow';
        }
        else{
            $status = 'notallow';
        }
        return $status;
    }
}
