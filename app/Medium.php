<?php 
namespace App;
use Image;
class Medium
{

	public function make($src, $destination)
	{

		Image::make($src)
	    	 	->resize(500, 500, function ($constraint) {
   					 $constraint->aspectRatio();
   					 $constraint->upsize();
					 })
	    	 	->save($destination);
	}
}