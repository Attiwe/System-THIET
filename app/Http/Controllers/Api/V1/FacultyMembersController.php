<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacultyMembers;
use App\Http\Resources\FacultyMembersCollection;
use App\ApiResponse;

class FacultyMembersController extends Controller
{
    use ApiResponse;

    //===============Route Basic sciences ==============
    public function BasicSciencesPlan()
    {
            $facultyMembers = FacultyMembers::where('department_id', 1)->with('department')->paginate(9);
            if(is_null($facultyMembers)){
                return $this->errorResponse('Faculty members not found', 404);
            }

            $facultyMembers = FacultyMembersCollection::make($facultyMembers);

            return $this->successResponse($facultyMembers, 'The faculty members fetched successfully', 200);
    }

       //===============Route Basic sciences ==============
       public function ComputerEngineeringPlan()
       {
               $facultyMembers = FacultyMembers::where('department_id', 4)->with('department')->paginate(9);
               if(is_null($facultyMembers)){
                   return $this->errorResponse('Faculty members not found', 404);
               }
   
               $facultyMembers = FacultyMembersCollection::make($facultyMembers);
   
               return $this->successResponse($facultyMembers, 'The faculty members fetched successfully', 200);
       }


  //===============Route ConstructionAndBuildingEngineeringPlan ==============
  public function ConstructionAndBuildingEngineeringPlan()
  {
          $facultyMembers = FacultyMembers::where('department_id', 2)->with('department')->paginate(9);
          if(is_null($facultyMembers)){
              return $this->errorResponse('Faculty members not found', 404);
          }

          $facultyMembers = FacultyMembersCollection::make($facultyMembers);

          return $this->successResponse($facultyMembers, 'The faculty members fetched successfully', 200);
  }


  //===============Route Chemical Engineering Plan ==============
  public function ChemicalEngineeringPlan()
  {
          $facultyMembers = FacultyMembers::where('department_id', 3)->with('department')->paginate(9);
          if(is_null($facultyMembers)){
              return $this->errorResponse('Faculty members not found', 404);
          }
          
          $facultyMembers = FacultyMembersCollection::make($facultyMembers);
          return $this->successResponse($facultyMembers, 'The faculty members fetched successfully', 200);
  }

}
