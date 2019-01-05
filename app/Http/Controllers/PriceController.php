<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PriceController extends Controller
{
    // в общем, в Яндекс сидят жадные люди и платить 100 т.р. я точно не буду, а чтобы использовать карты гугла нужен впн и та же платная подписка
    // идут они нахер
    // от така фигня малята
//    // координаты можно в параметры закидывать
    public function getTravelDistance()
    {


//        $client = new Client();
//
//        $from = "Санкт-Петергубг Ленина 5";
//        $to = "Выборг Ленина 20";
//
//        $from = urlencode($from);
//        $to = urlencode($to);
//
//        $url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins={$from}&destinations={$to}&language=ru-RU&sensor=false";
//
//        $response = $client->get($url);
//
//        return $response;
    }
}
