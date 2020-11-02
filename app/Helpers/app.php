<?php

  use Illuminate\Support\Facades\Auth;
  use Carbon\Carbon;
  use App\Models\Article;
  use App\Models\Profile;

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

  function generate_profile_slug($length = 12){
    // $slug = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $slug = '';
    for ($i = 0; $i < $length; $i++) {
        $slug .= $characters[rand(0, $charactersLength - 1)];
    }

    if(Profile::where('slug', $slug)->exists()){
      $this->generate_profile_slug();
    }
    
    return $slug;
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
