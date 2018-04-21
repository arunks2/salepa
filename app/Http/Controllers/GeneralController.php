<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Ipaddress;

class GeneralController extends Controller
{
    public function index()
    {
        return $this->login();
    }

    public function login()
    {
    	if(Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('common.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function fbLoginAction(Request $request)
    {
        
    	$r=$request->response;

    	$user = User::where('email','=',$r['email'])->where('fb_id','=',$r['id'])->first();
    	if($user) {
    		Auth::loginUsingId($user->id);
            $client_id = $user->id;
            $ip = $request->ip();
            $Ipaddress = Ipaddress::getIp($user->id,$request->ip());
            
            if($Ipaddress)
            {
               
                $visited = $Ipaddress->visited+1;
                $Ipaddress->visited = $visited;
                $Ipaddress->save();
            }
            else
            {  
                $ipaddress = Ipaddress::create(['client_id' => $client_id,'ip' => $ip,'visited' => 1]);
            }
    		return 1;
    	}
    	
    	$created_id = User::create([
    			'email' => $request->response['email'],
    			'name' => $request->response['name'],
    			'user_source' => 'fb',
    			'password' => bcrypt('pass'),
    			'fb_id'=>$request->response['id'],
                'currency_id'=>1
    		]);
    	Auth::loginUsingId($created_id->id);
        $url = 'http://graph.facebook.com/'.$request->response['id'].'/picture/?type=large';
        $data = file_get_contents($url);
        if($data)
        {   
            $fileName = "images/profile-photos/".$created_id->id.'.jpg';
            $file = fopen($fileName, 'w+');
            $created_id->profile_pic_path = $fileName;
            $created_id->save();
            fputs($file, $data);
            fclose($file);
            
        }
        $client_id = $created_id->id;
        $ip = $request->ip();
       
        $ipaddress = Ipaddress::create(['client_id' => $client_id,'ip' => $ip,'visited' => 1]);
    	return 2;
        
    }

}
