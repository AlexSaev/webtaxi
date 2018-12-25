<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function gateTesting()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(404, "Дядя, а вы точно админ?");
        }

        return "Да, вы таки админ...";
    }
}
