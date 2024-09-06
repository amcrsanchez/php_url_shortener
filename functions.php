<?php
const MAP_FILE = "./files/map.txt"; 
const COUNT_FILE = "./files/count.txt";

function create_map_entry($url){
    $file = fopen(MAP_FILE, "a+");
    $hash = generate_new_uri_hash();
    $entry = "{\"uri\":\"$hash\", \"redirect\":\"$url\"}";
    fwrite($file, $entry);
    fwrite($file, "\n");
    fclose($file);
    return json_decode($entry)->uri;
}

function generate_new_uri_hash(){
    $count = get_count();
    $hash = base64_encode($count);
    increase_file_count(1);
    return $hash;
}

function increase_file_count($increment){
    $actual_count = get_count();
    $file = fopen(COUNT_FILE, "w");
    fwrite($file, $actual_count + $increment);
    fclose($file);
}

function get_count(){
    $count = 0;
    $file = fopen(COUNT_FILE, "r");
    $file_count = fread($file, filesize(COUNT_FILE));
    if($file_count != ""){
        $count = $file_count;
    }
    fclose($file);

    return $count;
}

function get_redirect_from_map($id){
    $url = null;
    $map = fopen(MAP_FILE, "r");
    while(!feof($map)){
        $line = json_decode(fgets($map));
        if($line != "" && $line->uri == $id){
            $url = $line->redirect;
            break;
        }
    }
    fclose($map);
    return $url;
}

function get_uri_from_redirect($redirect){
    $uri = null;
    $map = fopen(MAP_FILE, "r");
    while(!feof($map)){
        $line = json_decode(fgets($map));
        if($line != "" && $line->redirect == $redirect){
            $uri = $line->uri;
            break;
        }
    }
    fclose($map);
    return $uri;
}