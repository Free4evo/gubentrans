<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/functions.php');

	
if (isset($_POST['country_name'])){

	foreach (getCountry() as $id) {
		$countries[$id['country_id']] = $id['name'];
	}
	if(in_array($_POST['country_name'], $countries)){
		citiesDatalist($_POST['country_name']);
	}
}