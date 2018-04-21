<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable= [
        	'name','description','address','starts_on','ends_on','contact_info','pvt_address',
        	'pvt_contact_info','slug'
        ];

    protected $dates = ['starts_on', 'ends_on', 'created_at', 'updated_at'];

    protected function setNameAttribute($value)
    {
    	$this->attributes['name']=$value;
    	$this->slug=$this->createSlugOutOfName($this->name);
    }
    
    public function owner(){

    	return $this->belongsTo('App\User','user_id');
    }


    protected function createSlugOutOfName($name) {
    	$n=$name;
    	$clean = preg_replace("/[^a-zA-Z0-9_|+ -]/", '', $n);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[_|+ -]+/", '-', $clean);

		$clean=$this->checkIfSlugExists($clean);

		return $clean;
    }

    public function checkIfSlugExists($slug, $first=0)
    {
    	$count=Sale::where('slug','like',$slug.'%')->count();
    	if($count>0) {
    		$count++;
    		$slug.=('-'.$count);
    	}
    	return $slug;
    }
         
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public static function allSales()
    {
        return static::get();
    }
    public function ownedBy(User $user)
    {
    	return $this->user_id == $user_id;
    }

    public function salelogs()
    {
        return $this->hasMany(SaleIpLog::class);
    }
}
