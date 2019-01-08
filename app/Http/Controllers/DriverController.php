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

class DriverController extends Controller
{
    public function getName()
    {
        $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

        return $user['name'];
    }

    public function mainDriverPanel()
    {
        return view('driver/driverMain', ['name' => $this->getName()]);
    }


    public function takeOrder()
    {
        $input = Input::only('orderNumber');

        $order = Order::all()
            ->where('order_number', '=', $input['orderNumber'])->first();

        if ($order) {
            if ($order->is_cancelled || $order->license_number) {

                $order = null;

                $message = "You cannot take this order 
                because it`s already taken or cancelled";

                return view('driver/checkOrder', ['name' => $this->getName(), 'order' => $order, 'message' => $message]);
            }
            else {

                $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

                Order::where('order_number', '=', $input['orderNumber'])
                    ->update(['license_number' => $user['login']]);
                $takenOrder = $order = Order::all()->where('order_number', '=', $input['orderNumber'])->first();
                $message = "There is information about taken order";
                return view('driver/checkOrder', ['name' => $this->getName(), 'order' => $takenOrder, 'message' => $message]);
            }
        }
        $order = NULL;
        $message = "No such order";
        return view('driver/checkOrder', ['name' => $this->getName(), 'order' => $order, 'message' => $message]);
    }

    public function showAvailableOrders()
    {
        $orders = Order::all()->where('license_number', '=', NULL)
                        ->where('is_cancelled', '=', false);
        return view('driver/showAvailableOrders', ['name' => $this->getName(), 'orders' => $orders]);
    }

    public function showTakenOrder()
    {
        $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

        $order = Order::all()
            ->where('order_number', '=', DB::table('orders')
                ->where('license_number', '=', $user['login'])
                ->max('order_number'))->first();

        $message = "There is information about taken order";

        return view('driver/checkOrder', ['name' => $this->getName(), 'order' => $order, 'message' => $message]);

    }

    public function showFinishedOrders()
    {
        $user = User::where('id', '=', Auth::user()->getAuthIdentifier())->first();

        $orders = Order::all()->where('license_number', '=', $user['login']);

        return view('driver/showFinishedOrders', ['name' => $this->getName(), 'orders' => $orders]);
    }

}
