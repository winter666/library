<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Books;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard ($id) {
    	$book = Books::find($id); 
    	return view('admin.dashboard', compact('book'));
    }
}
