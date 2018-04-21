<?php 
namespace App;
use Image;
class Full
{

	public function make($src, $destination)
	{

		Image::make($src)
	    	 	->resize(900, 900, function ($constraint) {
   					 $constraint->aspectRatio();
   					 $constraint->upsize();
					 })
	    	 	->save($destination);
	}
}