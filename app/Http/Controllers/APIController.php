<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return string
     */
    public function index()
    {
        return json_encode('sdfsdfsdf');
    }


}
