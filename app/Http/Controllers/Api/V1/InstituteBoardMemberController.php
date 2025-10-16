<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiResponse;
use App\Models\InstituteBoardMember;
use App\Http\Resources\InstituteBoardMemberCollection;

class InstituteBoardMemberController extends Controller
{
    use ApiResponse;
    
 public function index()
 {
    $instituteBoardMembers = InstituteBoardMember::with('facultyMembers')->latest()->get();

    $instituteBoardMembers =   InstituteBoardMemberCollection::make($instituteBoardMembers);

    return $this->successResponse($instituteBoardMembers, 'The institute board members fetched successfully' ,200);

  }
    
}
