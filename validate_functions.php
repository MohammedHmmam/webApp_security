<?php

//Check allowed URL parameters
//Useage:
    //$get_params = allowed_get_params(['username' , 'password']);
    //var_dump($get_params);
function allowed_get_params($allowed_params = []){
    //$allowed_array will contain only allowed url parameters
    $allowed_array = [];
    foreach($allowed_params as $param){
        if(isset($_GET[$param])){
            $allowed_array[$param] = $_GET[$param];
        }else{
            $allowed_array[$param] = NULL;
        }
    }
    return $allowed_array;

}
/////////////////////////////////////////////////////////////////////////////

//*Validate Value has presence
//use trim() so empty spaces do not count
//empty() allow White space as non-empty
// so , empty('White space') = false
function has_presence($value){
    $trimmed_value = trim($value);
    return isset($trimmed_value) && $trimmed_value !== "";

}
/////////////////////////////////////////////////////////////////////////////
//* Validate value has string length
//leadnig and trailing spaces will count
//options: exact , max , min
//has_lenght($username , ['exact' => 20])
//has_length($username , ['min' => 5 , 'max' => 100])
function has_length($value , $options = []){
    if(isset($options['max']) && (strlen($value) > (int)$options['max'])){
        return false;
    }
    if(isset($options['min']) && (strlen($value) < (int)$options['min'])){
        return false;
    }
    if(isset($options['exact']) && (strlen($value) != (int)$options['exact'])){
        return false;
    }
    return true;
}
///////////////////////////////////////////////////////////////////////////////

//* Validate value has a format matching a regular expression
// Be sure to user anchor expressions to match start an end of string
//(Use \A and \Z not ^ ans $ which allow line returns)
//Example:
    //has_format_matching('1234' , '/\d{4}/') is true
    //has_format_matching('12345' , '/\d{4}/'); is also true
    //has_format_matching('12345' , '/\A\d{4}\Z/'); is false
    function has_format_matching($value , $regex = '//'){
        return preg_match($regex , $value);
    }    



?>