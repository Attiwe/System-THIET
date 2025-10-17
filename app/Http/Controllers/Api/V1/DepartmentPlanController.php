<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiResponse;
use App\Models\DepartmentPlan;

class DepartmentPlanController extends Controller
{
    use ApiResponse;

    // Department Plan for Computer and Communication Engineering
    public function ComputerEngineeringPlan()
    {
        $departmentPlan = DepartmentPlan::where('department_id', 4)
            ->with('department:id,name')
            ->select('id', 'research_plan', 'department_id')
            ->first();

        if (is_null($departmentPlan)) {
            return $this->errorResponse('Department plan not found data not found', 404);
        }

 
        $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'research_plan'   => asset('storage/department_plans/' . $departmentPlan->research_plan),
        ];

        return $this->successResponse($data, 'The department plan fetched successfully', 200);
    }


    // // Department Plan for Computer and BasicSciencesPlan
    public function BasicSciencesPlan()
    {
        $departmentPlan = DepartmentPlan::where('department_id', 1)
            ->with('department:id,name')
            ->select('id', 'research_plan', 'department_id')
            ->first();

        if (is_null($departmentPlan)) {
            return $this->errorResponse('Department plan not found data not found', 404);
        }

 
        $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'research_plan'   => asset('storage/department_plans/' . $departmentPlan->research_plan),
        ];

        return $this->successResponse($data, 'The department plan fetched successfully', 200);
    }


    // // Department Plan for Computer and ConstructionAndBuildingEngineeringPlan
    public function ConstructionAndBuildingEngineeringPlan()
    {
        $departmentPlan = DepartmentPlan::where('department_id', 2)
            ->with('department:id,name')
            ->select('id', 'research_plan', 'department_id')
            ->first();

        if (is_null($departmentPlan)) {
            return $this->errorResponse('Department plan not found data not found', 404);
        }

 
        $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'research_plan'   => asset('storage/department_plans/' . $departmentPlan->research_plan),
        ];

        return $this->successResponse($data, 'The department plan fetched successfully', 200);
    }

    // Department Plan for Chemical Engineering
    public function ChemicalEngineeringPlan()
    {
        $departmentPlan = DepartmentPlan::where('department_id', 3)
            ->with('department:id,name')
            ->select('id', 'research_plan', 'department_id')
            ->first();

        if (is_null($departmentPlan)) {
            return $this->errorResponse('Department plan not found data not found', 404);
        }

 
        $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'research_plan'   => asset('storage/department_plans/' . $departmentPlan->research_plan),
        ];

        return $this->successResponse($data, 'The department plan fetched successfully', 200);
    }


    //**************** **************************************************************************** *************
                                               // اللائحة الداخلية //
    //**************** **************************************************************************** *************

      // Department Plan for Computer and Communication Engineering
      public function BasicSciencesRegulations()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 1)
              ->with('department:id,name')
              ->select('id', 'law', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'law'   => asset('storage/department_plans/' . $departmentPlan->law),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
  
      // // Department Plan for Computer and BasicSciencesPlan
      public function ComputerEngineeringRegulations()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 4)
              ->with('department:id,name')
              ->select('id', 'law', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'law'   => asset('storage/department_plans/' . $departmentPlan->law),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
  
      // // Department Plan for Computer and ConstructionAndBuildingEngineeringPlan
      public function ConstructionAndBuildingEngineeringRegulations()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 2)
              ->with('department:id,name')
              ->select('id', 'law', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'law'   => asset('storage/department_plans/' . $departmentPlan->law),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
      // Department Plan for Chemical Engineering
      public function ChemicalEngineeringRegulations()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 3)
              ->with('department:id,name')
              ->select('id', 'law', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'law'   => asset('storage/department_plans/' . $departmentPlan->law),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }


     //**************** **************************************************************************** *************
                                               //       كتاب القسم       //
    //**************** **************************************************************************** *************

      // Department Plan for Computer and Communication Engineering
      public function BasicSciencesBooks()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 1)
              ->with('department:id,name')
              ->select('id', 'department_book', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'department_book'   => asset('storage/department_plans/' . $departmentPlan->department_book),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
  
      // // Department Plan for Computer and BasicSciencesPlan
      public function ComputerEngineeringBooks()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 4)
              ->with('department:id,name')
              ->select('id', 'department_book', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'department_book'   => asset('storage/department_plans/' . $departmentPlan->department_book),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
  
      // // Department Plan for Computer and ConstructionAndBuildingEngineeringPlan
      public function ConstructionAndBuildingEngineeringBooks()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 2)
              ->with('department:id,name')
              ->select('id', 'department_book', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'department_book'   => asset('storage/department_plans/' . $departmentPlan->department_book),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
      // Department Plan for Chemical Engineering
      public function ChemicalEngineeringBooks()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 3)
              ->with('department:id,name')
              ->select('id', 'department_book', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404); 
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'department_book'   => asset('storage/department_plans/' . $departmentPlan->department_book),
          ];    
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }


         //**************** **************************************************************************** *************
                                               //       المقررات الدراسية       //
    //**************** **************************************************************************** *************

      // Department Plan for Computer and Communication Engineering
      public function BasicSciencesCourses()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 1)
              ->with('department:id,name')
              ->select('id', 'courses', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'courses'   => asset('storage/department_plans/' . $departmentPlan->courses),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
  
      // // Department Plan for Computer and BasicSciencesPlan
      public function ComputerEngineeringCourses()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 4)
              ->with('department:id,name')
              ->select('id', 'courses', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'courses'   => asset('storage/department_plans/' . $departmentPlan->courses),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
  
      // // Department Plan for Computer and ConstructionAndBuildingEngineeringPlan
      public function ConstructionAndBuildingEngineeringCourses()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 2)
              ->with('department:id,name')
              ->select('id', 'courses', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'courses'   => asset('storage/department_plans/' . $departmentPlan->courses),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
      // Department Plan for Chemical Engineering
      public function ChemicalEngineeringCourses()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 3)
              ->with('department:id,name')
                ->select('id', 'courses', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404); 
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'courses'   => asset('storage/department_plans/' . $departmentPlan->courses),
          ];    
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }


    //**************** **************************************************************************** *************
                                               //       مجلس القسم       //
    //**************** **************************************************************************** *************

      // Department Plan for Computer and Communication Engineering
      public function BasicSciencesCouncil()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 1)
              ->with('department:id,name')
              ->select('id', 'council', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'council'   => asset('storage/department_plans/' . $departmentPlan->council),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
  
      // // Department Plan for Computer and BasicSciencesPlan
      public function ComputerEngineeringCouncil()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 4)
              ->with('department:id,name')
              ->select('id', 'council', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'council'   => asset('storage/department_plans/' . $departmentPlan->council),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
  
      // // Department Plan for Computer and ConstructionAndBuildingEngineeringPlan
      public function ConstructionAndBuildingEngineeringCouncil()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 2)
              ->with('department:id,name')
              ->select('id', 'council', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404);
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'council'   => asset('storage/department_plans/' . $departmentPlan->council),
          ];
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
  
      // Department Plan for Chemical Engineering
      public function ChemicalEngineeringCouncil()
      {
          $departmentPlan = DepartmentPlan::where('department_id', 3)
              ->with('department:id,name')
                ->select('id', 'council', 'department_id')
              ->first();
  
          if (is_null($departmentPlan)) {
              return $this->errorResponse('Department plan not found data not found', 404); 
          }
  
   
          $departmentName = $departmentPlan->department?->name ?? 'Unknown Department';
  
          $data = [
              'department_name' => $departmentName,
              'council'   => asset('storage/department_plans/' . $departmentPlan->council),
          ];    
  
          return $this->successResponse($data, 'The department plan fetched successfully', 200);
      }
}
