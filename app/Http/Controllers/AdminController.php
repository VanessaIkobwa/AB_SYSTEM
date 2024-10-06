<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loadAdminDashboard()
    {
        return view('admin.dashboard');
    }
    public function loadLecturerListing()
    {
        return view('admin.lecturer-listing');
    }
    public function loadLecturerForm()
    {
        return view('admin.lecturer-form');
    }

    public function loadAllUnits()
    {
        return view('admin.units');
    }

    public function loadUnitForm()
    {
        return view('admin.unit-form');
        
    }
    public function loadEditUnitForm($unit_id)
    {
        $id = $unit_id;
        return view('admin.edit-unit-form',compact('id'));
        
    }
}
