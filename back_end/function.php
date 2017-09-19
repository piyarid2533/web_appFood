<?php

function get_date() {
	
	$arr_temp = array();
	
	for($i = 1; $i <= 31; $i++) {
		$arr_temp[$i] = $i;
	}
	
	return $arr_temp;
	
}

function get_month() {
	
	$arr_temp = array(
		"01" => "มกราคม",
		"02" => "กุมภาพันธ์",
		"03" => "มีนาคม",
		"04" => "เมษายน",
		"05" => "พฤษภาคม",
		"06" => "มิถุนายน",
		"07" => "กรกฎาคม",
		"08" => "สิงหาคม",
		"09" => "กันยายน",
		"10" => "ตุลาคม",
		"11" => "พฤศจิกายน",
		"12" => "ธันวาคม"
	);
	
	return $arr_temp;
	
}

function get_year($start,$end) {
	
	$arr_date = array();
	
	for($i = $start; $i <= $end; $i++) {
		$arr_date[$i] = $i;
	}
	
	return $arr_date;

}

?>