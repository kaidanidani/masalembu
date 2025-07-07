<?php

namespace App\Controllers;

class User extends BaseController
{
    public function dashboard()
    {
        if ($redirect = $this->requireUser()) {
            return $redirect;
        }

        return view('user/dashboard'); // sesuaikan dengan nama file view-nya
    }
}
