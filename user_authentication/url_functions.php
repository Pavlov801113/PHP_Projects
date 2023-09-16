<?php
function get_user_urls($username){
    $conn = db_connect();
    $result = $conn->query("SELECT bm_URL from bookmark WHERE username = '" . $username . "'");
    if(!$result){
        return false;
    }
    $url_array = array();
    for($count = 1; $row = $result->fetch_row(); ++$count){
        $url_array[$count] = $row[0];
    }
    return $url_array;
}