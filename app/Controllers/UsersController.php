<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UsersController extends BaseController
{
    public function index()
    {
        $data = [
            'page_title'   => 'My title',
        ];

        return view('pages/users', $data, ['saveData' => false]);
    }
}
