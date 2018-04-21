<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Request;
class IpaddressesController extends Controller
{
    public function __construct()
    	{
    	    $this->middleware('auth');

    	    parent::__construct();

    	}

    public function store()
    {

    }
}
