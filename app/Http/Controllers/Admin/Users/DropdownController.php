<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\Designation;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function getDesignationsByDepartment(Request $request)
    {
        $departmentId = $request->input('department_id');
        $designations = Designation::where('department_id', $departmentId)->get();

        return response()->json($designations);
    }

}
