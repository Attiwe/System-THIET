<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstituteRequirement;
use App\ApiResponse;
    
class InstituteRequirementsController extends Controller
{
    use ApiResponse;
       // InstituteRequirement for Computer and Communication Engineering
       public function BasicSciences()
       {
           $institute = InstituteRequirement::where('department_id', 1)
               ->with('department:id,name')
               ->select('id', 'file_path', 'department_id')
               ->first();
   
           if (is_null($institute)) {
               return $this->errorResponse('InstituteRequirement not found data not found', 404);
           }
   
    
           $departmentName = $institute->department?->name ?? 'Unknown Department';
   
           $data = [
               'department_name' => $departmentName,
               'file_path'   => asset('storage/institute_requirements/' . $institute->file_path),
           ];
   
           return $this->successResponse($data, 'The InstituteRequirement fetched successfully', 200);
       }
   
   
       // // InstituteRequirement for Computer and BasicSciencesPlan
       public function ComputerEngineering()
       {
           $InstituteRequirement = InstituteRequirement::where('department_id', 4)
               ->with('department:id,name')
               ->select('id', 'file_path', 'department_id')
               ->first();
   
           if (is_null($InstituteRequirement)) {
               return $this->errorResponse('InstituteRequirement not found data not found', 404);
           }
   
    
           $departmentName = $InstituteRequirement->department?->name ?? 'Unknown Department';
   
           $data = [
               'department_name' => $departmentName,
               'file_path'   => asset('storage/institute_requirements/' . $InstituteRequirement->file_path),
           ];
   
           return $this->successResponse($data, 'The InstituteRequirement fetched successfully', 200);
       }
   
   
       // // InstituteRequirement for Computer and ConstructionAndBuildingEngineeringPlan
       public function ConstructionAndBuildingEngineering()
       {
           $InstituteRequirement = InstituteRequirement::where('department_id', 2)
               ->with('department:id,name')
               ->select('id', 'file_path', 'department_id')
               ->first();
   
           if (is_null($InstituteRequirement)) {
               return $this->errorResponse('InstituteRequirement not found data not found', 404);
           }
   
    
           $departmentName = $InstituteRequirement->department?->name ?? 'Unknown Department';
   
           $data = [
               'department_name' => $departmentName,
               'file_path'   => asset('storage/institute_requirements/' . $InstituteRequirement->file_path),
           ];
   
           return $this->successResponse($data, 'The InstituteRequirement fetched successfully', 200);
       }
   
       // InstituteRequirement for Chemical Engineering
       public function ChemicalEngineering()
       {
           $InstituteRequirement = InstituteRequirement::where('department_id', 3)
               ->with('department:id,name')
               ->select('id', 'file_path', 'department_id')
               ->first();
   
           if (is_null($InstituteRequirement)) {
               return $this->errorResponse('InstituteRequirement not found data not found', 404); 
           }
   
    
           $departmentName = $InstituteRequirement->department?->name ?? 'Unknown Department';
   
           $data = [
               'department_name' => $departmentName,
               'file_path'   => asset('storage/institute_requirements/' . $InstituteRequirement->file_path),
           ];    
   
           return $this->successResponse($data, 'The InstituteRequirement fetched successfully', 200);
       }
 
}
