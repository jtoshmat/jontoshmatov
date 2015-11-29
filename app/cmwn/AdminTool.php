<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class AdminTool extends Model
{
	public static $uploadCsvRules = array(
		//'yourcsv'=>'required|mimes:csv,txt',
		//'importype'=>'required',
	);

	public static $uploadImageRules = array(
		'yourfile'=>'required|image',
	);
}
