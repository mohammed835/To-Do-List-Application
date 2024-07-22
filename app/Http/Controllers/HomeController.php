<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function redirects(){
        if (Auth::check()) {

            return view('dashboard.index');

        } else {
            return redirect()->route('login');
        }
    }

}
