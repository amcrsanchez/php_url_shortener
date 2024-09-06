<?php
const FILE_NAME = "./files/config.json";
$config_file = fopen(FILE_NAME, "r");
$json_file_content = fread($config_file, filesize(FILE_NAME));
$config = json_decode($json_file_content);
fclose($config_file);