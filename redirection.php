<?php
require_once('functions.php');
$uri = $_GET["uri"] ?? "/";
$redirect_url = get_redirect_from_map($uri) ?? "/";
header("Location:$redirect_url");
?>