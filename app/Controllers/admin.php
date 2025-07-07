<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        if ($redirect = $this->requireAdmin()) {
            return $redirect;
        }

        return view('admin/dashboard_admin'); // Sesuaikan dengan nama view
    }
}
