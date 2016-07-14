<?php

function fuck($time){
	$dateout = new DateTime($time);
	return $dateout -> format('l,F j,Y');
}
//di kelangan magswirchback kasi siya lang