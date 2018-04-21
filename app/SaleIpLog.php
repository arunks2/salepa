<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleIpLog extends Model
{
    protected $table='saleiplogs';
    protected $fillable = ['client_id','sale_id','ip','visited'];

    public static function getActiveUserIpInformation($userId, $saleId, $ip)
    {
    	return static::where([
    		['client_id', '=', $userId],
    		['sale_id', '=', $saleId],
    		['ip','=', $ip],

    		])->first();
    }

    public static function getIpInformation($saleId, $ip)
    {
    	return static::where([
    		['sale_id', '=', $saleId],
    		['ip','=',$ip],
    		])->first();
    }
}
