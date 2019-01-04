<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Gate::allows('isAdmin'))
        {
            $adminController = new AdminController();
            return $adminController->mainAdminPanel();
        }
        elseif (Gate::allows('isDriver'))
        {
            $driverController = new DriverController();
            return $driverController->mainDriverPanel();
        }
        elseif (Gate::allows('isPassenger'))
        {
            $passengerController = new PassengerController();
            return $passengerController->mainPassengerPanel();
        }
//        return view('home');
    }
}
