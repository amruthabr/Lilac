<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Designation;
use App\Models\Department;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class UserController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query')?$request->input('query'):'';
        
        if (empty($query)) {
            $users = DB::table('users')
                ->join('designations', 'users.fk_designation', '=', 'designations.id')
                ->join('departments', 'users.fk_department', '=', 'departments.id')
                ->select('users.*', 'designations.name as designation_name', 'departments.name as department_name')
                ->get();
            return view('search', compact('users')); // Returns the search view without any results
        }
        $users = DB::table('users')
        ->join('designations', 'users.fk_designation', '=', 'designations.id')
        ->join('departments', 'users.fk_department', '=', 'departments.id')
        ->where('users.name', 'like', "%$query%")
        ->orWhere('designations.name', 'like', "%$query%")
        ->orWhere('departments.name', 'like', "%$query%")
        ->select('users.*', 'designations.name as designation_name', 'departments.name as department_name')
        ->get();
        if ($request->ajax()) {
            return view('search_list', compact('users'))->render();
        }

        //return view('search_list', compact('users'));
    }
}
