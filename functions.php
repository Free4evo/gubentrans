<?php

$dbc = new PDO('mysql:host=localhost;dbname=euia_city;charset=utf8', 'root', '', array(
        PDO::ATTR_PERSISTENT => true,
    ));

function citiesDatalist($country_name = 'Украина'){
    global $dbc;
    
    $query = "SELECT cities.city AS city_name, countries.name AS country_name, cities.country_id AS country_id  FROM cities 
                        LEFT JOIN `countries` ON countries.country_id = cities.country_id WHERE countries.name='".$country_name."'";

    $res = $dbc->query($query);
    $result = $res->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $city){
        echo '<option value="'.$city['city_name'] . ' (' . $city['country_name'] .')"></option>';
    }
}

function countryDatalist(){

    $result = getCountry();
    echo '<datalist id="country">';
    foreach ($result as $country){
        echo '<option value="' . $country['name'] .'"></option>';
    }
    echo '</datalist>';
}


function getCountry(){
    global $dbc;

    $query = "SELECT name, country_id  FROM countries";

    $res = $dbc->query($query);

    $result = $res->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}