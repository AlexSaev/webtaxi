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
        if (!Gate::allows('isPassenger')) {
            return abort(404, "Дядя, а вы точно пассажир?");
        }

        return view('passenger/passengerMain', ['name' => $this->getName()]);
    }

    public function makeOrder()
    {
        if (!Gate::allows('isPassenger')) {
            abort(404, "Дядя, а вы точно пассажир?");
        }

        $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

        $order = Order::all()
            ->where('order_number', '=', DB::table('orders')
                ->where('phone_number', '=', $user['login'])
                ->max('order_number'))->first();

        if (!$order->is_cancelled && !$order->license_number) {
            $order = NULL;
            $message = "You already make order";
            return view('passenger/checkOrder', ['name' => $this->getName(), 'order' => $order, 'message' => $message]);
        } else {
            $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

            date_default_timezone_set('Europe/Moscow');

            $input = Input::only('pointOfArrival', 'departurePoint');

            Order::create(
                [
                    'point_of_arrival' => $input['pointOfArrival'],
                    'departure_point' => $input['departurePoint'],
                    'date_of_the_travel' => date('Y-m-d H:i:s'),
                    'phone_number' => $user['login'],
                ]);

            $order = NULL;
            $message = "Your order was registered, please stand by...";
            return view('passenger/checkOrder', ['name' => $this->getName(), 'order' => $order, 'message' => $message]);
        }

    }

    public function showAllOrders()
    {
        if (!Gate::allows('isPassenger')) {
            return abort(404, "Дядя, а вы точно пассажир?");
        }

        $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

        $orders = Order::all()->where('phone_number', '=', $user['login']);

        return view('passenger/showPassengerOrders', ['name' => $this->getName(), 'orders' => $orders]);
    }

    public function checkOrder()
    {
        if (!Gate::allows('isPassenger')) {
            return abort(404, "Дядя, а вы точно пассажир?");
        }

        $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

        $order = Order::all()
            ->where('order_number', '=', DB::table('orders')
                ->where('phone_number', '=', $user['login'])
                ->max('order_number'))->first();

        if ($order) {
            $message = NULL;

            if ($order->is_cancelled) {
                $order = NULL;
                $message = "Your order was cancelled. Please retry later... ";
                return view('passenger/checkOrder', ['name' => $this->getName(), 'order' => $order, 'message' => $message]);
            } elseif (!$order->is_cancelled && !$order->license_number) {
                $order = NULL;
                $message = "Your order is in progress. Please wait...";
                return view('passenger/checkOrder', ['name' => $this->getName(), 'order' => $order, 'message' => $message]);
            } else {
                $automobileInfo = DB::select('select * from automobiles where car_number = 
                (select car_number from road_lists where license_number = ? and valid_from < ? and valid_untill > ?)',
                    [$order->license_number, $order->date_of_the_travel, $order->date_of_the_travel]);

                foreach ($automobileInfo as $info) {
                    $orderInfo = $info;
                }
                return view('passenger/checkOrder', ['name' => $this->getName(), 'order' => $orderInfo, 'message' => $message]);
            }
        }

        $order = NULL;

        $message = "Sorry, we have no information about your last order...";

        return view('passenger/checkOrder', ['name' => $this->getName(), 'order' => $order, 'message' => $message]);
    }
}
