<?php

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