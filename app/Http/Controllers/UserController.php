<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Management;
use App\Models\Sale;
use App\Models\Sales_name;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function getData(){
        // $dept_users = Department::all();
        // return view('auth.register',compact('dept_users'));
        // return $dept_users;
    }

    // public function deptTest(){
    //     $data = Department::get()->where('id',1);
    //     return $data ;
    // }
    public function users(){
       $usersWithDepartments = User::get();

        return view('dashboard.users.users',compact('usersWithDepartments'));
    }

    // start add user
    public function add_user(){
        // $dept_users = Department::all();
        $users = User::all();

        return view('dashboard.users.add_user',compact('users'));
    }

}
