<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();

    }

    public function dashboard()
    {
        $data['user'] = $this->user;
        $data['sales'] = Sale::where('user_id',$this->user['id'])->get();
    	return view('dashboard',$data);
    }

    public function sales()
    {
        $data['user'] = $this->user;
        $data['sales'] = Sale::where('user_id',$this->user['id'])->get();
        return view('user.sales',$data);
    }
    
    public function createSale()
    {
    	return view('sales.create');
    }
}
