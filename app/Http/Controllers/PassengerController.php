<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Passenger;
use App\Driver;
use App\Automobile;
use App\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class PassengerController extends Controller
{
    public function getName()
    {
        $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

        return $user['name'];
    }

    public function mainPassengerPanel()
    {
        if(!Gate::allows('isPassenger'))
        {
            return abort(404, "Дядя, а вы точно пассажир?");
        }

        return view('passenger/passengerMain', ['name' => $this->getName()]);
    }

    public function showAllOrders()
    {
        if(!Gate::allows('isPassenger'))
        {
            return abort(404, "Дядя, а вы точно пассажир?");
        }

        $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

        $orders = Order::all()->where('phone_number', '=', $user['login']);

        return view('passenger/showPassengerOrders', ['name' => $this->getName(), 'orders' => $orders]);
    }

    public function checkSomething()
    {
        date_default_timezone_set('Europe/Moscow');

        $currentDate = date('Y-m-d H:i:s');

//        $currentDate = date('2018-12-31 12:12:12');

        $orders = Order::where('date_of_the_travel', '<', $currentDate)
            ->where('license_number', '=', NULL)
            ->update(['is_cancelled' => true]);


        return $orders;
    }
}
