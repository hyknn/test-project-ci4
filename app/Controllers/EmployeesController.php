<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmployeesController extends BaseController
{
    public function index()
    {
        return view('pages/employees');
    }
}
