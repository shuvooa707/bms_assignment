<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function accept()
    {
        User::find( request()->uid )->update([
            "user_role" => 1
        ]);
        return [ "msg" => "success" ];
    }
    public function ignore()
    {
        User::find( request()->uid )->delete();

        return [ "msg" => "success" ];
    }
}
