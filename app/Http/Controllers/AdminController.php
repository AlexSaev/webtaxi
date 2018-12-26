<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function mainAdminPanel()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        return view('admin/adminMain');
    }

    public function showPassengers()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        return view('admin/showPassengers');
    }

    public function showDrivers()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        return view('admin/showDrivers');
    }

    public function showAutomobiles()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        return view('admin/showAutomobiles');
    }

    public function showOrders()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }
        $orders =

        return view('admin/showOrders');
    }

    public function showRoadLists()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        return view('admin/showRoadLists');
    }
}
