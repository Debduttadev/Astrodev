<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\User;
use App\Service;
use View;
use Auth;

class Helper
{

    public static function admintype()
    {
        $admintype = Auth::user()->usertype;
        return 1;
    }

    public static function numberService()
    {
        $numberservice = Service::where('u_id_fk', Auth::user()->id)->count();
        return $numberservice;
    }

    public static function numberContact()
    {
        $numbercontact = Contact::count();
        return $numbercontact;
    }
}
