<?php
  use App\Models\Article;

  function current_user(){
    return Auth::user();
  }

  function date_to_human($date, $format = 'd/m/Y, h:i A'){
		if ($date == null) {
			return null;
		}
		$dt = Carbon::parse($date);
		return $dt->format($format);
  }
  
  function human_to_date($date, $format = 'd/m/Y, h:i A'){
		if ($date == null) {
			return null;
		}
		return Carbon::createFromFormat($format, $date);
  }
  
  // public function getNewFileName($imageFile)
  // {
	// 	$oriFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
	// 	$fileextension = $imageFile->extension();
	// 	$file_name_lowercase = strtolower($oriFileName);
	// 	$file_name_dashes = str_replace(" ", "-", $file_name_lowercase);
	// 	$file_name_dashes = preg_replace('/[^A-Za-z0-9\-]/', '', $file_name_dashes);
	// 	$uniqid = substr(md5(Carbon::now() . $file_name_dashes), 0 ,6);
	// 	$newFileName = $file_name_dashes . '_' . $uniqid . '.' . $fileextension;

	// 	return $newFileName;
	// }
