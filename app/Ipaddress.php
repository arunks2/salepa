<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipaddress extends Model
{
    protected $table="ipadresses";
    protected $fillable =['client_id','ip','visited'];

    public static function getIp($userId, $Ip)
    {
    	return static::where([
    		['client_id', '=', $userId],
    		['ip', '=', $Ip],
    		
    		])->first();
    }
}
