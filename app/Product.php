<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Currency;
class Product extends Model
{
    protected $fillable =[
    	'name','sale_id','description','sale_price','purchase_year','cost_price','condition'
    ];

	public function owner()
	{
		return $this->belongsTo('App\User','user_id');
	}
	public function sale()
	{
		return $this->belongsTo('App\Sale','sale_id');
	}

	public function addPhoto(Photo $photo)
	{
	     return $this->photos()->save($photo);

	}

	 public function photos()
	{
	    return $this->hasMany('App\Photo');
	}

	public function conversations()
	{
		return $this->hasMany('App\Conversation');
	}
	
    protected function setCostPriceAttribute($value)
        {
        	$this->attributes['cost_price']=$this->ChangeBaseCurrency($value);
        }
     protected function ChangeBaseCurrency($value)
     {
     	$tmp = explode('_', $value);

     	$currency = Currency::find($tmp[0]);

     	return $tmp[1]*$currency->conversion_rate;
     }

     protected function setSalePriceAttribute($value)
        {
         	$this->attributes['sale_price']=$this->ChangeBaseCurrency($value);
        }

   
}
