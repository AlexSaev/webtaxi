<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Passenger;
use App\Driver;
use App\Automobile;
use App\Order;
use App\RoadList;
use Illuminate\Support\Facades\Input;

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

        $passengers = Passenger::all();

        return view('admin/showPassengers', ['passengers' => $passengers]);
    }

    public function deletePassenger()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $input = Input::only('phoneNumber');
        $phoneNumber = intval($input['phoneNumber']);
        Passenger::where('phone_number', '=', $phoneNumber)->delete();

        $phoneNumber = strval($phoneNumber);
        User::where('login', '=', $phoneNumber)->delete();

        return $this->showPassengers();
    }

    public function createPassenger()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $input = Input::only('phoneNumber', 'surname', 'name', 'patronymic', 'password');
        Passenger::create(
            [
                'phone_number' => $input['phoneNumber'],
                'surname' => $input['surname'],
                'name' => $input['name'],
                'patronymic' => $input['patronymic'],
                'password' => bcrypt($input['password']),
            ]);
        User::create(
            [
                'login' => strval($input['phoneNumber']),
                'surname' => $input['surname'],
                'name' => $input['name'],
                'patronymic' => $input['patronymic'],
                'password' => bcrypt($input['password']),
            ]);

        return $this->showPassengers();
    }

    public function updatePassenger()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $input = Input::only('phoneNumber');

        return view('admin/enterPassenger', ['oldPhoneNumber' => $input['phoneNumber']]);
    }

    public function enterPassengerInfo()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $input = Input::only('phoneNumber', 'surname', 'name', 'patronymic',
            'password', 'oldPhoneNumber');


        if($input['surname'])
        {
            Passenger::where('phone_number', '=', $input['oldPhoneNumber'])
                ->update(['surname' => $input['surname']]);
            User::where('login', '=', $input['oldPhoneNumber'])
                ->update(['surname' => $input['surname']]);
        }

        if($input['name'])
        {
            Passenger::where('phone_number', '=', $input['oldPhoneNumber'])
                ->update(['name' => $input['name']]);
            User::where('login', '=', $input['oldPhoneNumber'])
                ->update(['name' => $input['name']]);
        }

        if($input['patronymic'])
        {
            Passenger::where('phone_number', '=', $input['oldPhoneNumber'])
                ->update(['patronymic' => $input['patronymic']]);
            User::where('login', '=', $input['oldPhoneNumber'])
                ->update(['patronymic' => $input['patronymic']]);
        }

        if($input['password'])
        {
            Passenger::where('phone_number', '=', $input['oldPhoneNumber'])
                ->update(['password' => bcrypt($input['patronymic'])]);
            User::where('login', '=', $input['oldPhoneNumber'])
                ->update(['password' => bcrypt($input['patronymic'])]);
        }

        if($input['phoneNumber'])
        {
            Passenger::where('phone_number', '=', $input['oldPhoneNumber'])
                ->update(['phone_number' => $input['phoneNumber']]);
            User::where('login', '=', $input['oldPhoneNumber'])
                ->update(['login' => $input['phoneNumber']]);
        }

        return $this->showPassengers();
    }

    public function showDrivers()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $drivers = Driver::all();

        return view('admin/showDrivers', ['drivers' => $drivers]);
    }
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function deleteDriver()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $input = Input::only('licenseNumber');
        $licenseNumber = intval($input['licenseNumber']);
        Driver::where('license_number', '=', $licenseNumber)->delete();

        $licenseNumber = strval($licenseNumber);
        User::where('login', '=', $licenseNumber)->delete();

        return $this->showDrivers();
    }

    public function createDriver()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $input = Input::only('licenseNumber', 'surname', 'name', 'patronymic', 'password');
        Driver::create(
            [
                'license_number' => $input['licenseNumber'],
                'surname' => $input['surname'],
                'name' => $input['name'],
                'patronymic' => $input['patronymic'],
                'password' => bcrypt($input['password']),
            ]);
        User::create(
            [
                'login' => strval($input['licenseNumber']),
                'surname' => $input['surname'],
                'name' => $input['name'],
                'user_type' => 'driver',
                'patronymic' => $input['patronymic'],
                'password' => bcrypt($input['password']),
            ]);

        return $this->showDrivers();
    }

    public function updateDriver()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $input = Input::only('licenseNumber');

        return view('admin/enterDriver', ['oldLicenseNumber' => $input['licenseNumber']]);
    }

    public function enterDriverInfo()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $input = Input::only('licenseNumber', 'surname', 'name', 'patronymic',
            'password', 'oldLicenseNumber');


        if($input['surname'])
        {
            Driver::where('license_number', '=', $input['oldLicenseNumber'])
                ->update(['surname' => $input['surname']]);
            User::where('login', '=', $input['oldLicenseNumber'])
                ->update(['surname' => $input['surname']]);
        }

        if($input['name'])
        {
            Driver::where('license_number', '=', $input['oldLicenseNumber'])
                ->update(['name' => $input['name']]);
            User::where('login', '=', $input['oldLicenseNumber'])
                ->update(['name' => $input['name']]);
        }

        if($input['patronymic'])
        {
            Driver::where('license_number', '=', $input['oldLicenseNumber'])
                ->update(['patronymic' => $input['patronymic']]);
            User::where('login', '=', $input['oldLicenseNumber'])
                ->update(['patronymic' => $input['patronymic']]);
        }

        if($input['password'])
        {
            Driver::where('license_number', '=', $input['oldLicenseNumber'])
                ->update(['password' => bcrypt($input['patronymic'])]);
            User::where('login', '=', $input['oldLicenseNumber'])
                ->update(['password' => bcrypt($input['patronymic'])]);
        }

        if($input['licenseNumber'])
        {
            Driver::where('license_number', '=', $input['oldLicenseNumber'])
                ->update(['license_number' => $input['licenseNumber']]);
            User::where('login', '=', $input['oldLicenseNumber'])
                ->update(['login' => $input['licenseNumber']]);
        }

        return $this->showDrivers();
    }
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function showAutomobiles()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $automobiles = Automobile::all();

        return view('admin/showAutomobiles', ['automobiles' => $automobiles]);
    }



    public function showOrders()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $orders = Order::all();

        return view('admin/showOrders', ['orders' => $orders ]);
    }

    public function showRoadLists()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        $roadLists = RoadList::all();

        return view('admin/showRoadLists', ['roadLists' => $roadLists]);
    }


}
