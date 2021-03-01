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




?>